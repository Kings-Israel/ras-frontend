<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;

class DashboardCancelledOrdersList extends Component
{
    public function render()
    {
        $cancelled_orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                                ->where('business_id', auth()->user()->business->id)
                                ->where('status', 'cancelled')
                                ->orderBy('created_at', 'DESC')
                                ->get()
                                ->take(5);

        return view('livewire.vendor.dashboard-cancelled-orders-list', compact('cancelled_orders'));
    }
}
