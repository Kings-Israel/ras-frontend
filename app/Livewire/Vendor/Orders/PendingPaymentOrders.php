<?php

namespace App\Livewire\Vendor\Orders;

use App\Models\Order;
use Livewire\Component;

class PendingPaymentOrders extends Component
{
    public function render()
    {
        $pending_orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                                ->where('business_id', auth()->user()->business->id)
                                ->whereHas('invoice', function ($query) {
                                    $query->where('payment_status', 'pending');
                                })
                                ->orderBy('created_at', 'DESC')
                                ->get()
                                ->take(10);

        return view('livewire.vendor.orders.pending-payment-orders', compact('pending_orders'));
    }
}
