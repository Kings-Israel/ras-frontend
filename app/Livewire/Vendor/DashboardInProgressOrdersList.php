<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;

class DashboardInProgressOrdersList extends Component
{
    public function render()
    {
        $in_progress_orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                                    ->where('business_id', auth()->user()->business->id)
                                    ->where('status', 'in progress')
                                    ->orderBy('created_at', 'DESC')
                                    ->get()
                                    ->take(5);

        return view('livewire.vendor.dashboard-in-progress-orders-list', compact('in_progress_orders'));
    }
}
