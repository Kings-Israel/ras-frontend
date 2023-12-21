<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;

class DashboardOrdersList extends Component
{
    public function render()
    {
        $orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                        ->where('business_id', auth()->user()->business->id)
                        ->orderBy('created_at', 'DESC')
                        ->get()
                        ->take(5);

        return view('livewire.vendor.dashboard-orders-list', compact('orders'));
    }
}
