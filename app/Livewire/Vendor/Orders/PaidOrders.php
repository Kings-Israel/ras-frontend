<?php

namespace App\Livewire\Vendor\Orders;

use App\Models\Order;
use Livewire\Component;

class PaidOrders extends Component
{
    public function render()
    {
        $paid_orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                            ->where('business_id', auth()->user()->business->id)
                            ->whereHas('invoice', function ($query) {
                                $query->where('payment_status', 'paid');
                            })
                            ->orderBy('created_at', 'DESC')
                            ->get()
                            ->take(10);

        return view('livewire.vendor.orders.paid-orders', compact('paid_orders'));
    }
}
