<?php

namespace App\Livewire\Buyer;

use Livewire\Component;

class InvoicesList extends Component
{
    public function render()
    {
        $total = auth()->user()->orders->sum(fn ($order) => $order->orderItems->sum('amount'));

        $invoices = auth()->user()->invoices->load('orders');

        return view('livewire.buyer.invoices-list', compact('invoices', 'total'));
    }
}
