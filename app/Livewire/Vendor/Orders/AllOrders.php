<?php

namespace App\Livewire\Vendor\Orders;

use App\Models\Order;
use Livewire\Component;

class AllOrders extends Component
{
    public function render()
    {
        $orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                        ->where('business_id', auth()->user()->business->id)
                        ->orderBy('created_at', 'DESC')
                        ->get()
                        ->take(5);

        return view('livewire.vendor.orders.all-orders', compact('orders'));
    }
}
