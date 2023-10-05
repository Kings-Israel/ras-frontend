<?php

namespace App\Livewire\Vendor;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::where('business_id', '=', auth()->user()->business->id)
                            ->paginate(10);
        return view('livewire.vendor.products-list', [
            'products' => $products,
        ]);
    }
}
