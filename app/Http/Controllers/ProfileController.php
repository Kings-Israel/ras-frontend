<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Jobs\SendSMS;
use App\Models\Otp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->has('new_password') && $request->new_password !== null) {
            if(!Hash::check($request->old_password, auth()->user()->password)) {
                return back()->withErrors(['old_password' => 'Current password is incorrect']);
            }
        }

        $request->user()->first_name = $request->first_name;
        $request->user()->last_name = $request->last_name;
        $request->user()->phone_number = $request->phone_number;
        $request->user()->email = $request->email;
        $request->user()->password = $request->has('new_password') ? Hash::make($request->new_password) : $request->user()->password;

        if ($request->hasFile('avatar')) {
            $request->user()->avatar = pathinfo($request->avatar->store('avatars', 'user'), PATHINFO_BASENAME);
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            $request->user()->sendEmailVerificationNotification();
        }

        if ($request->user()->isDirty('phone_number')) {
            $request->user()->phone_verified_at = null;
            $otp = Otp::generate(auth()->user()->phone_number, 10);
            SendSMS::dispatchAfterResponse(auth()->user()->phone_number, 'Your verification code is '.$otp->token);
        }

        $request->user()->save();

        toastr()->success('', 'Profile updated successfully');

        return Redirect::back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function businessProfile()
    {
        return view('business.profile', [
            'business' => auth()->user()->hasRole('vendor') ? auth()->user()->business : NULL,
            'currencies' => collect(['USD', 'EUR', 'GBP', 'KSH', 'JPY']),
        ]);
    }
}
