<?php

namespace App\Livewire\Vendor\Orders;

use Livewire\Component;

class PendingPaymentOrders extends Component
{
    public function render()
    {
        $pending_orders = auth()->user()->business->orders->load('orderItems.product', 'invoice.financingRequest')->where('payment_status', 'pending')->sortByDesc('created_at');

        return view('livewire.vendor.orders.pending-payment-orders', compact('pending_orders'));
    }
}
