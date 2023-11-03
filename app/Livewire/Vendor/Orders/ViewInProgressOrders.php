<?php

namespace App\Livewire\Vendor\Orders;

use Livewire\Component;

class ViewInProgressOrders extends Component
{
    public function render()
    {
        $orders = auth()->user()->business->orders->load('orderItems.product', 'invoice.financingRequest')->sortByDesc('created_at');

        return view('livewire.vendor.orders.view-in-progress-orders', compact('orders'));
    }
}
