<?php

namespace App\Livewire\Buyer;

use App\Models\Invoice;
use App\Models\Order;
use Livewire\Component;

class OrdersList extends Component
{
    public $status = 'all';

    public function updateStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $orders = Order::with('orderItems.product.media', 'business', 'invoice')
                            ->where('user_id', auth()->id())
                            ->when($this->status && $this->status != 'all', function ($query) {
                                $query->where('status', $this->status);
                            })
                            ->orderBy('created_at', 'DESC')
                            ->paginate(15);

        $inspection_cost = 0;

        $logistics_cost = 0;

        $insurance_cost = 0;

        $delivery_cost = 0;

        $warehousing_cost = 0;

        $total_amount = 0;

        $all_orders = Order::with('orderItems')->where('user_id', auth()->id())->get();

        foreach ($all_orders as $order) {
            foreach($order->orderItems as $order_item) {
                $quantity = explode(' ', $order_item->quantity)[0];
                $total_amount += $order_item->amount * $quantity;
                if ($order_item->inspectionRequest()->where('cost', '!=', NULL)->exists()) {
                    $inspection_cost += $order_item->inspectionRequest->cost;
                    $total_amount += $order_item->inspectionRequest->cost;
                }
                if ($order_item->deliveryRequest()->where('cost', '!=', NULL)->exists()) {
                    $delivery_cost += $order_item->deliveryRequest->cost;
                    $total_amount += $order_item->inspectionRequest->cost;
                }
                if ($order_item->insuranceRequest()->where('cost', '!=', NULL)->exists()) {
                    $insurance_cost += $order_item->insuranceRequest->cost;
                    $total_amount += $order_item->insuranceRequest->cost;
                }
            }
        }

        return view('livewire.buyer.orders-list', compact('orders', 'total_amount', 'inspection_cost', 'delivery_cost', 'insurance_cost', 'warehousing_cost'));
    }
}
