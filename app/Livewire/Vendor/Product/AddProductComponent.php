<?php

namespace App\Livewire\Vendor\Product;

use App\Livewire\Vendor\Product\Step\ProductDetails;
use App\Livewire\Vendor\Product\Step\ProductMedia;
use Livewire\Component;
use Spatie\LivewireWizard\Components\WizardComponent;

class AddProductComponent extends WizardComponent
{
    public function steps(): array
    {
        return [
            ProductDetails::class,
            ProductMedia::class,
        ];
    }
}
