<?php

namespace App\Livewire\Vendor\Orders;

use App\Models\Order;
use Livewire\Component;

class InProgressOrders extends Component
{
    public function render()
    {
        $in_progress_orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                                    ->where('business_id', auth()->user()->business->id)
                                    ->where('status', 'in progress')
                                    ->orderBy('created_at', 'DESC')
                                    ->get()
                                    ->take(10);

        return view('livewire.vendor.orders.in-progress-orders', compact('in_progress_orders'));
    }
}
