<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\VerifyPhoneController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('select-type', [RegisteredUserController::class, 'selectType'])
                ->name('select-type');

    Route::post('selected-type', [AuthenticatedSessionController::class, 'selectedType'])
                ->name('selected-type');

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login/{type?}', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');

            });

Route::middleware('auth')->group(function () {
    Route::get('/verify-phone', [VerifyPhoneController::class, 'showVerifyForm'])->name('verify-phone');

    Route::get('/resend-code', [VerifyPhoneController::class, 'resend'])->name('resend-phone-code');

    Route::post('/verify-phone', [VerifyPhoneController::class, 'verify'])->name('verification-phone');

    Route::get('verify-email', EmailVerificationPromptController::class)
            ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('/business/create', [VendorController::class, 'create'])->name('auth.business.create');
    Route::get('/business/create', [VendorController::class, 'showCreateProfileForm'])->name('auth.business.create.show');

    // Route::get('/product/add', [VendorController::class, 'addProduct'])->name('auth.product.add');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});
