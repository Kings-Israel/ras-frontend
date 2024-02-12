<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;

class DashboardPendingOrdersList extends Component
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
                                        ->take(5);

        return view('livewire.vendor.dashboard-pending-orders-list', compact('pending_orders'));
    }
}
