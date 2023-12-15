<?php

namespace App\Livewire\Vendor\Product;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersList extends Component
{
    use WithPagination;
    
    public $product;

    public function  mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        $orders = Order::with('orderItems.orderRequests', 'invoice.financingRequest', 'invoice')
                        ->whereHas('orderItems', function ($query) {
                            $query->where('product_id', $this->product->id);
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate(8);

        return view('livewire.vendor.product.orders-list', compact('orders'));
    }
}
