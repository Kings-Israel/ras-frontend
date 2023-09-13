<?php

namespace App\Livewire\Vendor\Product\Step;

use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class ProductMedia extends StepComponent
{
    public function stepInfo(): array
    {
        return [
            'label' => 'Media & More',
        ];
    }
    public function render()
    {
        return view('livewire.addProduct.steps.product-media');
    }
}
