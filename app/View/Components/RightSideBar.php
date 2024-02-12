<?php

namespace App\View\Components;

use App\Models\Country;
use App\Models\User;
use App\Models\Wallet;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RightSideBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $orders = auth()->user()->business->orders->where('status', '!=', 'quotation request');
        $orders_count = $orders->count();
        $top_countries = [];
        $wallet_balance = 0;
        $revenue = 0;

        $paid_orders_count = 0;
        foreach ($orders as $order) {
            if ($order->invoice->payment_status == 'paid') {
                // Get Revenue
                $revenue += $order->getTotalAmount(false);
                // Get Countries
                $country = $order->invoice->getDeliveryCountry();
                if (array_key_exists($country, $top_countries)) {
                    $top_countries[$country] += 1;
                } else {
                    $top_countries[$country] = 1;
                }

                $paid_orders_count += 1;
            }
        }

        // Get Country Percentage of all orders
        $top_countries = collect($top_countries)->sortDesc()->take(4)->toArray();
        foreach ($top_countries as $key => $country) {
            $percentage = round(($country / $paid_orders_count) * 100);
            $country_details = Country::where('name', $key)->first();
            $top_countries[$key] = [
                'percentage' => $percentage,
                'country_details' => $country_details ? $country_details : NULL
            ];
        }

        // Get wallet balance
        $wallet = Wallet::where('walleteable_id', auth()->id())->where('walleteable_type', User::class)->first();
        if ($wallet) {
            $wallet_balance = $wallet->balance;
        }

        return view('components.right-side-bar', compact('orders_count', 'revenue', 'wallet_balance', 'top_countries'));
    }
}
