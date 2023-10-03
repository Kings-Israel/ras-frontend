<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/product/{slug}', [ProductController::class, 'viewProduct'])->name('product');

Route::middleware(['auth', 'phone_verified', 'role:buyer'])->group(function () {
    Route::get('/cart', function() {
        return view('cart');
    })->name('cart');
});

Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
    Route::get('/{slug}/storefront', [ProductController::class, 'storefront'])->name('storefront');
    Route::get('/{slug}/storefront/products', [ProductController::class, 'storefrontProducts'])->name('storefront.products');
    Route::get('/{slug}/storefront/compliance', [ProductController::class, 'storefrontDocuments'])->name('storefront.compliance');
});

Route::middleware(['auth', 'phone_verified', 'role:vendor', 'has_registered_business'])->group(function () {
    Route::group(['prefix' => 'vendor/', 'as' => 'vendor.'], function() {
        Route::get('/', [VendorController::class, 'dashboard'])->name('dashboard');
        Route::get('/products', [VendorProductController::class, 'index'])->name('products');
        Route::post('/products/store', [VendorProductController::class, 'store'])->name('products.store');
        Route::get('/orders', [VendorController::class, 'orders'])->name('orders');
        Route::get('/messages', function () {
            return view('chat.index', [
                'test' => file_get_contents('../chat.json')
            ]);
        })->name('messages');
        Route::get('/messages/chat', function () {
            if(request()->wantsJson()) {
                return response()->json([
                    'conversations' => file_get_contents('../chat-log.json')
                ], 200);
            } else {
                return view('chat.index', [
                    'conversations' => file_get_contents('../chat-log.json')
                ]);
            }
        })->name('messages.chat');
        Route::get('/customers', function () {
            return view('business.customers');
        })->name('customers');
        Route::get('/payments', function () {
            return view('business.payments');
        })->name('payments');
        Route::get('/warehouses', function () {
            return view('business.warehouses');
        })->name('warehouses');
        Route::get('/suppliers', function () {
            return view('business.suppliers');
        })->name('suppliers');
        Route::get('/profile', [ProfileController::class, 'businessProfile'])->name('profile');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('/business/update', [VendorController::class, 'update'])->name('business.update');
        Route::patch('/business/image/update', [VendorController::class, 'updatePrimaryCoverImage'])->name('business.image.update');
    });
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

if (config('app.env') == 'production') {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/ras/livewire/update', $handle);
    });
}

require __DIR__.'/auth.php';
