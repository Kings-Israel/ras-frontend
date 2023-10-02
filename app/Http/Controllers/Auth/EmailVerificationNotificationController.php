<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            if ($request->user()->hasRole('vendor')) {
                return redirect()->intended('/vendor');
            }
            return redirect()->intended('/');
        }

        $request->user()->sendEmailVerificationNotification();

        toastr()->success('', 'Verification Email sent successfully');

        return back();
    }
}
