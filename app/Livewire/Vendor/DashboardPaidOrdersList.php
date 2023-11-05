<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;

class DashboardPaidOrdersList extends Component
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
                            ->take(5);

        return view('livewire.vendor.dashboard-paid-orders-list', compact('paid_orders'));
    }
}
