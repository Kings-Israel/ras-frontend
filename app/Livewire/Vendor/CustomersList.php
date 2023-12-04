<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersList extends Component
{
    use WithPagination;

    public $user_ids;

    public function mount()
    {
        $this->user_ids = Order::where('business_id', auth()->user()->business->id)
                                ->get()
                                ->pluck('user_id');
    }

    public function render()
    {
        $users = User::whereIn('id', $this->user_ids)
                        ->with(['orders' => function ($query) {
                            $query->where('business_id', auth()->user()->business->id)
                                    ->whereHas('invoice', function ($query) {
                                        $query->where('payment_status', 'paid');
                                    });
                        }])
                        ->paginate(10);

        return view('livewire.vendor.customers-list', compact('users'));
    }
}
