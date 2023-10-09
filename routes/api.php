<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\OtpController;
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

Route::post('/messages/send', [ChatController::class, 'store'])->name('messages.send');

Route::post('sms/test', function(Request $request) {
   SendSMS::dispatch($request->phone_number, $request->message);
});
