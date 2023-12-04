<?php

namespace App\Livewire\Vendor;

use App\Models\Business;
use Livewire\Component;

class SuppliersList extends Component
{
    public function render()
    {
        $suppliers = Business::with('products.category')
                            ->where('user_id', '!=', auth()->id())
                            ->inRandomOrder()
                            ->get()
                            ->take(12);

        return view('livewire.vendor.suppliers-list', compact('suppliers'));
    }
}
