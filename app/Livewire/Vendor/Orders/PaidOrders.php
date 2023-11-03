<?php

namespace App\Livewire\Vendor\Orders;

use Livewire\Component;

class PaidOrders extends Component
{
    public function render()
    {
        $paid_orders = auth()->user()->business->orders->load('orderItems.product', 'invoice.financingRequest')->where('payment_status', 'paid')->sortByDesc('created_at');

        return view('livewire.vendor.orders.paid-orders', compact('paid_orders'));
    }
}
