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

        $inspection_cost = 0;

        $total_amount = 0;

        foreach ($this->invoice->orders as $order) {
            foreach($order->orderItems as $order_item) {
                $quantity = explode(' ', $order_item->quantity)[0];
                $total_amount += $order_item->amount * $quantity;
                if ($order_item->inspectionRequest()->where('cost', '!=', NULL)->exists()) {
                    $inspection_cost += $order_item->inspectionRequest->cost;
                    $total_amount += $order_item->inspectionRequest->cost;
                }
            }
        }

        return view('livewire.buyer.orders-list', compact('orders', 'total_amount', 'inspection_cost'));
    }
}
