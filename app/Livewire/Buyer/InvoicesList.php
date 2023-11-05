<?php

namespace App\Livewire\Buyer;

use App\Models\Invoice;
use Livewire\Component;

class InvoicesList extends Component
{
    public $status = 'all';

    public function updateStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $total = auth()->user()->orders->sum(fn ($order) => $order->orderItems->sum('amount'));

        $invoices = Invoice::with('orders')
                            ->where('user_id', auth()->id())
                            ->when($this->status && $this->status != 'all', function ($query) {
                                info($this->status);
                                $query->where('payment_status', $this->status);
                            })
                            ->orderBy('created_at', 'DESC')
                            ->get();


        return view('livewire.buyer.invoices-list', compact('invoices', 'total'));
    }
}
