<?php

namespace App\Http\Controllers;

use App\Helpers\JambopayToken;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class WalletController extends Controller
{
    public function token()
    {
        $token = JambopayToken::walletAccessToken();

        return $token;
    }

    public function create()
    {
        return view('wallet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_of_birth' => ['required', 'date'],
            'id_number' => ['required'],
            'identity_type' => ['required', Rule::in(['NationalId', 'Passport'])],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'county' => ['required', 'string'],
            'physical_address' => ['required'],
        ]);

        if (Carbon::parse($request->date_of_birth)->diffInYears(now()) < 18 || Carbon::parse($request->date_of_birth) > now()) {
            toastr()->error('', 'Invalid date of birth');
            return back();
        }

        $phone_number = strlen(auth()->user()->phone_number) == 9 ? '0'.auth()->user()->phone_number : '0'.substr(auth()->user()->phone_number, -9);

        $token = $this->token();

        $response = Http::withHeaders([
            'Authorization' => $token->token_type.' '.$token->access_token,
            'Content-Type' => 'application/json'
        ])->post(config('services.jambopay.wallet_url').'/wallet/profile', [
            'firstName' => $request->has('first_name') && $request->first_name != '' ? (string) $request->first_name : (string) auth()->user()->first_name,
            'lastName' => $request->has('last_name') && $request->last_name != '' ? (string) $request->last_name : (string) auth()->user()->last_name,
            'email' => $request->has('email') && $request->email != '' ? (string) $request->email : (string) auth()->user()->email,
            'phoneNumber' => (string) $phone_number,
            'identityNumber' => (string) $request->id_number,
            'identityType' => (string) $request->identity_type,
            'dateOfBirth' => (string) $request->date_of_birth,
            'gender' => (string) $request->gender,
            'county' => (string) $request->county,
            'physicalAddress' => (string) $request->physical_address,
        ]);

        if (!collect(json_decode($response))->has('statusCode')) {
            $wallet = Http::withHeaders([
                            'Authorization' => $token->token_type.' '.$token->access_token,
                            'Content-Type' => 'application/json'
                        ])->post(config('services.jambopay.wallet_url').'/wallet/profile', [
                            'currency' => 'KES, USD',
                            'phoneNumber' => auth()->user()->phone_number,
                            'accountNo' => config('services.jambopay.wallet_account_number')
                        ]);

            Wallet::create([
                'account_number' => $wallet['accountNo'],
                'walleteable_id' => auth()->id(),
                'walleteable_type' => User::class,
            ]);

            toastr()->success('', 'Wallet Created Successfully');

            if (auth()->user()->hasRole('buyer')) {
                return redirect()->route('orders');
            }

            return redirect()->route('vendor.dashboard');
        }

        toastr()->error('', 'Error while creating wallet profile');

        return back();
    }

    public function balance()
    {
        $wallet = Wallet::where('walleteable_id', auth()->id())->where('walleteable_type', User::class)->first();

        $token = $this->token();

        if (!$wallet) {
            $phone_number = strlen(auth()->user()->phone_number) == 9 ? '0'.auth()->user()->phone_number : '0'.substr(auth()->user()->phone_number, -9);

            $wallet_account = Http::withHeaders([
                                    'Authorization' => $token->token_type.' '.$token->access_token,
                                    'Content-Type' => 'application/json',
                                ])->get(config('services.jambopay.wallet_url').'/wallet/account', [
                                    'accountNo' => config('services.jambopay.wallet_account_number'),
                                    'phoneNumber' => $phone_number
                                ]);

            $wallet = Wallet::create([
                                'walleteable_type' => User::class,
                                'walleteable_id' => auth()->id(),
                                'account_number' => $wallet_account['data'][0]['accountNo'],
                            ]);
        }

        if ($wallet) {
            $response = Http::withHeaders([
                                'Authorization' => $token->token_type.' '.$token->access_token,
                                'Content-Type' => 'application/json'
                            ])
                            ->post(config('services.jambopay.wallet_url').'/wallet/balance', [
                                "accountNo" => $wallet->account_number
                            ]);

            if (!collect(json_decode($response))->has('statusCode')) {
                $wallet->update([
                    'balance' => $response['balance'],
                ]);
            }

            if(request()->wantsJson()) {
                return response()->json(['balance' => $response['balance']], 200);
            }

            toastr()->success('', 'Wallet balance was successfully updated.');

            return back();
        }

        if(request()->wantsJson()) {
            return response()->json(['error' => 'Error fetching wallet.'], 200);
        }

        toastr()->error('', 'Error fetching wallet');

        return back();
    }
}
