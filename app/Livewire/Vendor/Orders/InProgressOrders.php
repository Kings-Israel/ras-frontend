<?php

namespace App\Livewire\Vendor\Orders;

use Livewire\Component;

class InProgressOrders extends Component
{
    public function render()
    {
        $in_progress_orders = auth()->user()->business->orders->load('orderItems.product', 'invoice.financingRequest')->where('status', 'in progress')->sortByDesc('created_at');

        return view('livewire.vendor.orders.in-progress-orders', compact('in_progress_orders'));
    }
}
