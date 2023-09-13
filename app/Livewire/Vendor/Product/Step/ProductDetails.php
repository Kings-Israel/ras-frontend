<?php

namespace App\Livewire\Vendor\Product\Step;

use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class ProductDetails extends StepComponent
{
    public function stepInfo(): array
    {
        return [
            'label' => 'Product Details',
        ];
    }

    public function submit()
    {
        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.addProduct.steps.product-details');
    }
}
