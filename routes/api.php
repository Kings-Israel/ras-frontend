<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WalletController;
use App\Jobs\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/payment/callback', [PaymentController::class, 'paymentCallback'])->name('jambopay.payment.callback');
Route::post('/topup/callback', [WalletController::class, 'topUpCallback'])->name('jambopay.topup.callback');

Route::post('/messages/send', [ChatController::class, 'store'])->name('messages.send');

Route::post('sms/test', function(Request $request) {
   SendSMS::dispatch($request->phone_number, $request->message);
});
