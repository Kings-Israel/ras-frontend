<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\WalletController;
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
    Route::get('/conversations/{user?}', [ChatController::class, 'conversations']);
    Route::get('/conversations/order/{id}', [ChatController::class, 'orderConversations']);
    Route::get('/chat/{user?}', [ChatController::class, 'index'])->name('messages');
    Route::get('/messages/chat/{id}', [ChatController::class, 'view'])->name('messages.chat');
    Route::post('/messages/send', [ChatController::class, 'store'])->name('messages.send');
    Route::post('/messages/order/send', [ChatController::class, 'orderStore'])->name('messages.order.send');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/favorite/add/{vendor}', [FavoriteController::class, 'addFavorite'])->name('favorite.add');
        Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('favorites.index');

    Route::get('/notifications', [HomeController::class, 'notifications'])->name('notifications');
    Route::get('/notification/{notification}', [HomeController::class, 'notification'])->name('notification');
    Route::get('/notifications/read/all', [HomeController::class, 'notificationsReadAll'])->name('notifications.read.all');
});

Route::middleware(['auth', 'web', 'phone_verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');

    Route::get('/invoices', [OrderController::class, 'index'])->name('invoices.index');
    // Route::get('/invoices/{invoice}/orders', [OrderController::class, 'orders'])->name('invoice.orders');
    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::post('/orders/{order}', [OrderController::class, 'order'])->name('orders.show');
    Route::post('/orders/{order}/update', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{order}/delivery/update', [OrderController::class, 'update'])->name('orders.delivery.update');
    Route::get('/orders/{order}/delete', [OrderController::class, 'delete'])->name('orders.delete');
    Route::get('/invoices/{invoice}/financing/request', [OrderController::class, 'requestFinancing'])->name('invoice.financing.request');
    Route::post('/invoices/{invoice}/financing/request/store', [OrderController::class, 'storeFinancingRequest'])->name('invoice.financing.request.store');
    Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/quotation/{quotation}/update/{status}', [OrderController::class, 'updateQuotation'])->name('order.quotation.update');
    Route::get('/order/request/{order_request}/update/{status}', [OrderController::class, 'updateRequest'])->name('order.request.update');
    Route::get('/order/{order_item}/insurance/request', [OrderController::class, 'requestInsurance'])->name('order.insurance.request');
    Route::post('/order/{order_item}/insurance/request/store', [OrderController::class, 'storeInsuranceRequest'])->name('order.insurance.request.store');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'wallet/', 'as' => 'wallet.'], function () {
        Route::get('create', [WalletController::class, 'create'])->name('create');
        Route::post('store', [WalletController::class, 'store'])->name('store');

        Route::middleware(['has_wallet'])->group(function () {
            Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
            Route::post('/pay/confirm', [PaymentController::class, 'completeTransaction'])->name('pay.confirm');
            Route::get('/balance', [WalletController::class, 'balance'])->name('balance');
        });
    });
});

Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
    Route::get('/{slug}/storefront', [ProductController::class, 'storefront'])->name('storefront');
    Route::get('/{slug}/storefront/products', [ProductController::class, 'storefrontProducts'])->name('storefront.products');
    Route::get('/{slug}/storefront/compliance', [ProductController::class, 'storefrontDocuments'])->name('storefront.compliance');
});

Route::middleware(['auth', 'web', 'phone_verified', 'role:vendor', 'has_registered_business'])->group(function () {
    Route::group(['prefix' => 'vendor/', 'as' => 'vendor.'], function() {
        Route::get('/dashboard', [VendorController::class, 'dashboard'])->name('dashboard')->middleware('has_wallet');
        Route::get('/products', [VendorProductController::class, 'index'])->name('products');
        Route::post('/products/store', [VendorProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [VendorProductController::class, 'edit'])->name('products.edit');
        Route::get('/{product}/show', [VendorProductController::class, 'show'])->name('products.show');
        Route::post('/{product}/discount/add', [VendorProductController::class, 'addDiscount'])->name('products.discount.add');
        Route::patch('/{product}/update', [VendorProductController::class, 'update'])->name('products.update');
        Route::get('/orders', [VendorController::class, 'orders'])->name('orders');
        Route::get('/quotation-requests', [VendorController::class, 'quotationRequests'])->name('quotation.requests');
        Route::get('/orders/{order}', [VendorController::class, 'order'])->name('orders.show');
        Route::get('/orders/{order}/{status}/update', [VendorController::class, 'orderUpdate'])->name('orders.status.update');
        Route::post('/orders/{order}/quote/update', [VendorController::class, 'quoteUpdate'])->name('orders.quote.update');
        Route::get('/orders/{order}/quotes/accept', [VendorController::class, 'acceptQuotes'])->name('orders.quotes.accept');
        Route::get('/orders/{order_item}/insurance/report/create', [VendorController::class, 'createInsuranceReport'])->name('orders.insurance.report.create');
        Route::post('/orders/{order_item}/insurance/report/store', [VendorController::class, 'storeInsuranceReport'])->name('orders.insurance.report.store');
        Route::get('/messages', [ChatController::class, 'index'])->name('messages');
        Route::get('/messages/chat', [ChatController::class, 'view'])->name('messages.chat');
        Route::get('/customers', [VendorController::class, 'customers'])->name('customers');
        Route::get('/payments', [VendorController::class, 'payments'])->name('payments');
        Route::get('/warehouses', [VendorController::class, 'warehouses'])->name('warehouses');
        Route::get('/warehouses/{warehouse}', [VendorController::class, 'warehouse'])->name('warehouse.show');
        Route::post('/warehouses/{warehouse}/storage/request', [VendorController::class, 'requestWarehouseStorage'])->name('warehouses.storage.request');
        Route::get('/suppliers', [VendorController::class, 'suppliers'])->name('suppliers');
        Route::get('/profile', [ProfileController::class, 'businessProfile'])->name('profile');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/business/update', [VendorController::class, 'update'])->name('business.update');
        Route::patch('/business/image/update', [VendorController::class, 'updatePrimaryCoverImage'])->name('business.image.update');


        Route::post('/order/{order_item}/warehouse/update', [VendorController::class, 'updateOrderWarehouse'])->name('warehouse.order.update');
        Route::get('/order/{order_item}/product/release', [VendorController::class, 'requestProductRelease'])->name('warehouse.order.product.release');
    });
});

if (config('app.env') == 'production') {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
}

require __DIR__.'/auth.php';
