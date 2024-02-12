<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionsList extends Component
{
    use WithPagination;

    public $balance;

    public function mount($balance)
    {
        $this->balance = $balance;
    }

    public function render()
    {
        $transactions = Payment::where('user_id', auth()->id())->where('transaction_ref', '!=', NULL)->orderBy('created_at', 'DESC')->paginate(10);

        $total_amount = $transactions->sum('amount');

        $wallet_balance = $this->balance;

        return view('livewire.transactions-list', compact('transactions', 'total_amount', 'wallet_balance'));
    }
}
