<?php

namespace App\Livewire\Vendor;

use App\Models\EscrowPayment;
use App\Models\Invoice;
use App\Models\Order;
use Livewire\Component;

class PaymentsList extends Component
{
    public $business;
    public $orders;

    public function mount()
    {
        $this->business = auth()->user()->business;
        $this->orders = Order::with('invoice')
                        ->where('business_id', $this->business->id)
                        ->whereHas('invoice', function ($query) {
                            $query->where('payment_status', 'paid');
                        })
                        ->get()
                        ->pluck('invoice_id');
    }

    public function render()
    {
        $escrow_payments = EscrowPayment::with('payment', 'invoice.orders')
                                    ->whereIn('invoice_id', $this->orders)
                                    ->whereHas('payment')
                                    ->where('status', 'approved')
                                    ->paginate(10);

        return view('livewire.vendor.payments-list', compact('escrow_payments'));
    }
}
