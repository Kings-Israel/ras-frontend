<?php

namespace App\Http\Controllers;

use App\Helpers\JambopayToken;
use App\Helpers\NumberGenerator;
use App\Models\EscrowPayment;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function token()
    {
        $token = JambopayToken::walletAccessToken();

        return $token;
    }

    public function pay(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|integer',
        ]);

        $invoice = Invoice::with('orders.orderItems.orderRequests')->find($request->invoice_id);

        if (!$invoice) {
            toastr()->error('', 'Invoice not found');
            return back();
        }

        if (auth()->id() != $invoice->user->id) {
            toastr()->error('You cannot perform this action');
            return back();
        }

        $token = JambopayToken::walletAccessToken();

        if (!auth()->user()->hasWallet($token)) {
            return $this->respondError('You do not have a wallet. Create one to perform this action.');
        }

        if (!$invoice->orders->first()->business->user->hasWallet($token)) {
            toastr()->error('', 'Vendor has not created a wallet account');
            return back();
        }

        $phone_number = strlen(auth()->user()->phone_number) == 9 ? '0'.auth()->user()->phone_number : '0'.substr(auth()->user()->phone_number, -9);

        $user_wallet_account = Wallet::where('walleteable_id', auth()->id())->where('walleteable_type', User::class)->first();
        if (!$user_wallet_account) {
            // Get User Wallet Account
            $wallet_account = Http::withHeaders([
                                            'Authorization' => $token->token_type.' '.$token->access_token,
                                            'Content-Type' => 'application/json',
                                        ])->get(config('services.jambopay.wallet_url').'/wallet/account', [
                                            'accountNo' => config('services.jambopay.wallet_account_number'),
                                            'phoneNumber' => $phone_number
                                        ]);

            $user_wallet_account = Wallet::create([
                'walleteable_type' => User::class,
                'walleteable_id' => auth()->id(),
                'account_number' => $wallet_account['data'][0]['accountNo'],
            ]);
        }

        // Check wallet balance
        $account_response = Http::withHeaders([
                                    'Authorization' => $token->token_type.' '.$token->access_token
                                ])->get(config('services.jambopay.wallet_url').'/wallet/account', [
                                    'accountNo' => $user_wallet_account->account_number,
                                    'phoneNumber' => $phone_number
                                ]);

        if ($account_response->failed() || $account_response->requestTimeout() || $account_response->serverError()) {
            toastr()->error('', 'An error occurred while retrieving wallet information');
            return back();
        }

        if (collect(json_decode($account_response))->has('statusCode')) {
            if (json_decode($account_response)->message[0] === 'Wrong credentials') {
                toastr()->error('', 'An error occurred while retrieving wallet information');
                return back();
            }
            toastr()->error('', 'An error occurred while retrieving wallet information');

            return back();
        }

        $response = Http::withHeaders([
                'Authorization' => $token->token_type.' '.$token->access_token,
            ])->post(config('services.jambopay.wallet_url').'/wallet/balance', [
                'accountNo' => (string) $account_response['data'][0]['accountNo'],
            ]);

        $order_total = 0;
        foreach ($invoice->orders as $order) {
            foreach ($order->orderItems as $order_item) {
                $order_total += $order_item->amount * explode(' ', $order_item->quantity)[0];
                $order_total += $order_item->orderRequests->where('status', 'accepted')->sum('cost');
            }
        }

        $escrow = auth()->user()->escrowPayments()->create([
            'amount' => $order_total,
            'invoice_id' => $invoice->id,
        ]);

        $phone_number = strlen(auth()->user()->phone_number) == 9 ? '0'.auth()->user()->phone_number : '0'.substr(auth()->user()->phone_number, -9);

        $order_id = NumberGenerator::generateUniqueNumber(Payment::class, 'jambopay_checkout_id', 10000000, 99999999);

        $response = Http::withHeaders([
            'Authorization' => $token->token_type.' '.$token->access_token
        ])->post(config('services.jambopay.wallet_url').'/wallet/transaction/transfer', [
            'amount' => $order_total,
            'accountTo' => (string) config('services.jambopay.wallet_commission_account_number'),
            'accountFrom' => (string) $user_wallet_account->account_number,
            'orderId' => $order_id,
            'phoneNumber' => $phone_number,
            'callbackUrl' => route('jambopay.payment.callback'),
            'partnerCode' => '100',
        ]);

        if (collect(json_decode($response))->has('statusCode')) {
            toastr()->error('', 'An error occurred while processing payment');
            return back();
        }

        $ref = json_decode($response)->ref;

        Payment::create([
            'user_id' => auth()->id(),
            'jambopay_checkout_id' => $ref,
            'amount' => $order_total,
            'payable_type' => EscrowPayment::class,
            'payable_id' => $escrow->id
        ]);

        if ($request->wantsJson()) {
            return response()->json(['ref' => $ref]);
        }

        return back()->with(['ref' => $ref]);
    }

    public function paymentCallback(Request $request)
    {
        info($request);
    }

    public function completeTransaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => ['required'],
            'ref' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $token = $this->token();

        $response = Http::withHeaders([
            'Authorization' => $token->token_type.' '.$token->access_token
        ])->post(config('services.jambopay.wallet_url').'/wallet/transaction/authorize', [
            'otp' => $request->otp,
            'ref' => $request->ref
        ]);


        if (collect(json_decode($response))->has('statusCode')) {
            toastr()->error('', 'An error occurred while processing the payment');
            return back();
        }

        $ref = json_decode($response)->ref;

        $payment = Payment::where('jambopay_checkout_id', $ref)->first();

        if ($payment) {
            $payment->update([
                'transaction_ref' => $ref,
            ]);

            switch ($payment->payable_type) {
                case 'App\Models\EscrowPayment':
                    $escrow_payment = EscrowPayment::with('user', 'invoice')->find($payment->payable_id);
                    $escrow_payment->update([
                        'status' => 'pending',
                    ]);

                    $invoice = $escrow_payment->invoice;

                    $invoice->update([
                        'payment_status' => 'paid'
                    ]);

                    foreach ($invoice->orders as $order) {
                        $order->update([
                            'status' => 'in progress'
                        ]);
                    }

                    activity()->causedBy($escrow_payment->user)->performedOn($payment->payable)->log('paid for invoice');

                    break;
                default:
                    return;
                    break;
            }

            toastr()->success('', 'Transaction was successful');

            return back();
        }
    }
}
