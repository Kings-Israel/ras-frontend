<?php

namespace App\Providers;

use App\Livewire\Vendor\Product\AddProductComponent;
use App\Livewire\Vendor\Product\Step\ProductDetails;
use App\Livewire\Vendor\Product\Step\ProductMedia;
use App\Livewire\Vendor\Profile\CreateProfileComponent;
use App\Livewire\Vendor\Profile\Step\Details;
use App\Livewire\Vendor\Profile\Step\Documents;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register Business Profile
        Livewire::component('create-profile', CreateProfileComponent::class);
        Livewire::component('details', Details::class);
        Livewire::component('documents', Documents::class);

        // Add Product
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
