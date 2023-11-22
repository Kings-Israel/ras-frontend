<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

Route::middleware(['auth', 'web', 'phone_verified'])->group(function () {
    Route::get('/chat/{user?}', [ChatController::class, 'index'])->name('messages');
    Route::get('/messages/chat/{id}', [ChatController::class, 'view'])->name('messages.chat');
    Route::post('/messages/send', [ChatController::class, 'store'])->name('messages.send');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'web', 'phone_verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');

    Route::get('/invoices', [OrderController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/{invoice}/orders', [OrderController::class, 'orders'])->name('invoice.orders');
    Route::get('/invoices/{invoice}/financing/request', [OrderController::class, 'requestFinancing'])->name('invoice.financing.request');
    Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/quotation/{quotation}/update/{status}', [OrderController::class, 'updateQuotation'])->name('order.quotation.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
    Route::get('/{slug}/storefront', [ProductController::class, 'storefront'])->name('storefront');
    Route::get('/{slug}/storefront/products', [ProductController::class, 'storefrontProducts'])->name('storefront.products');
    Route::get('/{slug}/storefront/compliance', [ProductController::class, 'storefrontDocuments'])->name('storefront.compliance');
});

Route::middleware(['auth', 'web', 'phone_verified', 'role:vendor', 'has_registered_business'])->group(function () {
    Route::group(['prefix' => 'vendor/', 'as' => 'vendor.'], function() {
        Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
        Route::get('/products', [VendorProductController::class, 'index'])->name('products');
        Route::post('/products/store', [VendorProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [VendorProductController::class, 'edit'])->name('products.edit');
        Route::patch('/{product}/update', [VendorProductController::class, 'update'])->name('products.update');
        Route::get('/orders', [VendorController::class, 'orders'])->name('orders');
        Route::get('/quotation-requests', [VendorController::class, 'quotationRequests'])->name('quotation.requests');
        Route::get('/orders/{order}', [VendorController::class, 'order'])->name('orders.show');
        Route::get('/orders/{order}/{status}/update', [VendorController::class, 'orderUpdate'])->name('orders.status.update');
        Route::post('/orders/{order}/quote/update', [VendorController::class, 'quoteUpdate'])->name('orders.quote.update');
        Route::get('/orders/{order}/quotes/accept', [VendorController::class, 'acceptQuotes'])->name('orders.quotes.accept');
        Route::get('/messages', [ChatController::class, 'index'])->name('messages');
        Route::get('/messages/chat', [ChatController::class, 'view'])->name('messages.chat');
        Route::get('/customers', function () {
            return view('business.customers');
        })->name('customers');
        Route::get('/payments', function () {
            return view('business.payments');
        })->name('payments');
        Route::get('/warehouses', [VendorController::class, 'warehouses'])->name('warehouses');
        Route::post('/warehouses/{warehouse}/storage/request', [VendorController::class, 'requestWarehouseStorage'])->name('warehouses.storage.request');
        Route::get('/suppliers', function () {
            return view('business.suppliers');
        })->name('suppliers');
        Route::get('/profile', [ProfileController::class, 'businessProfile'])->name('profile');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/business/update', [VendorController::class, 'update'])->name('business.update');
        Route::patch('/business/image/update', [VendorController::class, 'updatePrimaryCoverImage'])->name('business.image.update');
    });
});

if (config('app.env') == 'production') {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/rsa/livewire/update', $handle);
    });
}

require __DIR__.'/auth.php';
