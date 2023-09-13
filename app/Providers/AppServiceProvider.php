<?php

namespace App\Providers;

use App\Livewire\Vendor\Product\AddProductComponent;
use App\Livewire\Vendor\Product\Step\ProductDetails;
use App\Livewire\Vendor\Product\Step\ProductMedia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (config('app.env') === 'production') {
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/ras/livewire/update', $handle);
            });
        }
        Livewire::component('add-product', AddProductComponent::class);
        Livewire::component('product-details', ProductDetails::class);
        Livewire::component('product-media', ProductMedia::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
