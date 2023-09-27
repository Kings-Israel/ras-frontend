<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\NumberGenerator;
use App\Http\Controllers\Controller;
use App\Jobs\SendSMS;
use App\Models\Otp;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function selectType(): View
    {
        return view('auth.select-type');
    }

    /**
     * Display the registration view.
     */
    public function create($type = 'vendor'): View
    {
        if (Session::get('type')) {
            $type = Session::get('type');
        }

        return view('auth.register', compact('type'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'role' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'last_login' => now(),
        ]);

        $user->assignRole($request->role);

        event(new Registered($user));

        $otp = Otp::generate($user->phone_number, 10);
        SendSMS::dispatchAfterResponse($user->phone_number, 'Your verification code is '.$otp->token);

        Auth::login($user);

        return redirect()->route('verify-phone');
    }
}
