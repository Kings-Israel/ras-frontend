<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;

class QuotationRequests extends Component
{
    public function render()
    {
        $orders = Order::with('orderItems.product', 'invoice.financingRequest', 'invoice')
                        ->where('business_id', auth()->user()->business->id)
                        ->where('status', 'quotation request')
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return view('livewire.vendor.quotation-requests', compact('orders'));
    }
}
