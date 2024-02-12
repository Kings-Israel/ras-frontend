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
        $total = 0;

        $invoices = Invoice::with('orders')
                            ->where('user_id', auth()->id())
                            ->when($this->status && $this->status != 'all', function ($query) {
                                info($this->status);
                                $query->where('payment_status', $this->status);
                            })
                            ->orderBy('created_at', 'DESC')
                            ->get();

        foreach ($invoices as $invoice) {
            foreach($invoice->orders as $order) {
                foreach($order->orderItems as $order_item) {
                    $quantity = explode(' ', $order_item->quantity)[0];
                    $total += $order_item->amount * $quantity;
                }
            }
        }

        return view('livewire.buyer.invoices-list', compact('invoices', 'total'));
    }
}
