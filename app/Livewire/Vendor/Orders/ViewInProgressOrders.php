<?php

namespace App\Livewire\Vendor\Orders;

use App\Models\Order;
use Livewire\Component;

class ViewInProgressOrders extends Component
{
    public function render()
    {
        $orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                        ->where('business_id', auth()->user()->business->id)
                        ->where('status', 'in progress')
                        ->orderBy('created_at', 'DESC')
                        ->get()
                        ->take(5);

        return view('livewire.vendor.orders.view-in-progress-orders', compact('orders'));
    }
}
