<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendSMS;
use App\Models\Otp;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class VerifyPhoneController extends Controller
{
    public function showVerifyForm($type = 'buyer'): View
    {
        if (Session::get('type')) {
            $type = Session::get('type');
        }

        return view('auth.verify-phone', compact('type'));
    }

    public function resend()
    {
        $otp = Otp::generate(auth()->user()->phone_number, 10);

        SendSMS::dispatchAfterResponse(auth()->user()->phone_number, 'Your verification code is '.$otp->token);

        toastr()->success('', 'Verification Code Sent Successful');

        return back();
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'number' => ['required', 'array']
        ], [
            'number.required' => 'Please enter verification code',
        ]);

        $otp = Otp::validate(auth()->user()->phone_number, implode('', $request->number));

        if ($otp['status'] == false) {
            if ($otp['message'] == 'invalid') {
                toastr()->error('', 'Invalid Verification Code');
                return back();
            } elseif ($otp['message'] == 'expired') {
                Auth::logout();

                toastr()->error('', 'Verification Code expired');

                return redirect('/login');
            }
        }

        auth()->user()->update([
            'phone_verified_at' => now(),
            'last_login' => now(),
        ]);

        toastr()->success('', 'Verification Successful');

        if ($request->user()->hasVerifiedEmail()) {
            if ($request->user()->hasRole('vendor')) {
                // Create business if account is new
                if (!$request->user()->business) {
                    activity()->causedBy(auth()->user())->log('create a vendor account');
                    return redirect()->route('auth.business.create');
                }

                return redirect()->intended('/vendor');
            }

            return redirect()->intended('/');
        }

        // if ($request->user()->markEmailAsVerified()) {
        //     event(new Verified($request->user()));
        // }

        if ($request->user()->hasRole('vendor')) {
            // Create business if account is new
            if (!$request->user()->business) {
                activity()->causedBy(auth()->user())->log('create a vendor account');
                return redirect()->route('auth.business.create');
            }

            return redirect()->intended('/vendor');
        }

        return redirect()->intended('/');
    }
}
