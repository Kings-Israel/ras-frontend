<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Jobs\SendSMS;
use App\Models\Otp;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function selectedType(Request $request)
    {
        $request->validate([
            'account_type' => 'required',
        ], [
            'account_type' => 'Please select an account type'
        ]);

        Session::put('type', $request->account_type);

        return redirect()->route('login', ['type' => $request->account_type]);
    }

    public function verifyPhone(): View
    {
        return view('auth.verify-phone');
    }

    /**
     * Display the login view.
     */
    public function create($type = 'vendor'): View
    {
        if (Session::get('type')) {
            $type = Session::get('type');
        }

        return view('auth.login', compact('type'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        auth()->user()->update([
            'phone_verified_at' => NULL,
        ]);

        $otp = Otp::generate(auth()->user()->phone_number, 10);

        SendSMS::dispatchAfterResponse(auth()->user()->phone_number, 'Your verification code is '.$otp->token);

        return redirect()->intended(RouteServiceProvider::VERIFY_PHONE);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        auth()->user()->update([
            'phone_verified_at' => NULL
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
