<?php

namespace App\Livewire\Vendor\Orders;

use App\Models\Order;
use Livewire\Component;

class CancelledOrders extends Component
{
    public function render()
    {
        $cancelled_orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                                ->where('business_id', auth()->user()->business->id)
                                ->where('status', 'cancelled')
                                ->orderBy('created_at', 'DESC')
                                ->get()
                                ->take(5);

        return view('livewire.vendor.orders.cancelled-orders', compact('cancelled_orders'));
    }
}
