<?php

namespace App\Livewire\Vendor\Orders;

use Livewire\Component;

class CancelledOrders extends Component
{
    public function render()
    {
        $cancelled_orders = auth()->user()->business->orders->load('orderItems.product', 'invoice.financingRequest')->where('status', 'cancelled')->sortByDesc('created_at');

        return view('livewire.vendor.orders.cancelled-orders', compact('cancelled_orders'));
    }
}
