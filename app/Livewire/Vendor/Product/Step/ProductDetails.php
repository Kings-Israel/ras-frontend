<?php

namespace App\Livewire\Vendor\Product\Step;

use App\Models\Category;
use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class ProductDetails extends StepComponent
{
    public $name;
    public $category;
    public $material;
    public $price;
    public $place_of_origin;
    public $brand;
    public $shape;
    public $min_quantity_order;
    public $max_quantity_order;
    public $color;
    public $usage;

    public $categories = [];
    public $shapes = [];
    public $colors = [];
    public $usages = [];

    protected $rules = [
        'name' => ['required'],
        'category' => ['required'],
        'price' => ['required'],
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->shapes = ['Rectangle', 'Circle', 'Square', 'Rhombus', 'Sphere'];
        $this->colors = ['Red', 'Green', 'Blue', 'Purple', 'Yellow', 'Maroon', 'Orange', 'Gray', 'Magenta', 'Teal', 'Gold', 'White', 'Black'];
        $this->usages = ['Home Decor', 'Office Decor'];
    }

    public function stepInfo(): array
    {
        return [
            'label' => 'Product Details',
        ];
    }

    public function submit()
    {
        $this->validate();

        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.addProduct.steps.product-details');
    }
}
