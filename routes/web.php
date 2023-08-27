<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('vendor.dashboard');
})->name('dashboard');

Route::middleware([])->group(function () {
    Route::group(['prefix' => 'vendor/', 'as' => 'vendor.'], function() {
        Route::get('/', [VendorController::class, 'dashboard'])->name('dashboard');
        Route::get('/products', [VendorController::class, 'products'])->name('products');
        Route::get('/orders', [VendorController::class, 'orders'])->name('orders');
        Route::get('/messages', function () {
            return view('chat.index');
        })->name('messages');
        Route::get('/customers', function () {
            return view('vendor.customers');
        })->name('customers');
        Route::get('/warehouses', function () {
            return view('vendor.warehouses');
        })->name('warehouses');
        Route::get('/suppliers', function () {
            return view('vendor.suppliers');
        })->name('suppliers');
        Route::get('/profile', function() {
            return view('vendor.profile');
        })->name('profile');
    });
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test/logout', function() {
    return view('welcome');
})->name('test.logout');

require __DIR__.'/auth.php';
