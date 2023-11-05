<?php

namespace App\Livewire\Buyer;

use App\Models\Invoice;
use App\Models\Order;
use Livewire\Component;

class OrdersList extends Component
{
    public $invoice;

    public $status = 'all';

    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice->load('financingRequest');
    }

    public function updateStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $orders = Order::with('orderItems.product.media', 'business')
                            ->where('invoice_id', $this->invoice->id)
                            ->when($this->status && $this->status != 'all', function ($query) {
                                $query->where('status', $this->status);
                            })
                            ->get()
                            ->groupBy(function ($item) {
                                return $item['business']['name'];
                            });

        $total_amount = $this->invoice->orders->sum(fn ($order) => $order->orderItems->sum('amount'));

        return view('livewire.buyer.orders-list', compact('orders', 'total_amount'));
    }
}
