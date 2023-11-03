<?php

namespace App\Livewire\Buyer;

use App\Models\Invoice;
use Livewire\Component;

class OrdersList extends Component
{
    public $invoice;

    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function render()
    {
        $orders = $this->invoice->orders->load('orderItems.product.media', 'business')
                                        ->groupBy(function ($item) {
                                            return $item['business']['name'];
                                        });

        $total_amount = $this->invoice->orders->sum(fn ($order) => $order->orderItems->sum('amount'));

        return view('livewire.buyer.orders-list', compact('orders', 'total_amount'));
    }
}
