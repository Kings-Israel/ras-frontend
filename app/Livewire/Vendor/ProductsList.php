<?php

namespace App\Livewire\Vendor;

use App\Models\Product;
use App\Models\Warehouse;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public $warehouses = [];

    public function mount()
    {
        $this->warehouses = Warehouse::all();
    }

    public function render()
    {
        $products = Product::with('warehouses')
                            ->where('business_id', '=', auth()->user()->business->id)
                            ->paginate(10);
        return view('livewire.vendor.products-list', [
            'products' => $products,
        ]);
    }
}
