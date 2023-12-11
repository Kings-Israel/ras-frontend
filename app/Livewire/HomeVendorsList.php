<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class HomeVendorsList extends Component
{
    public $countries = [];

    #[On('update-selected-countries')]
    public function updateProductsList($id)
    {
        if(collect($this->countries)->contains($id)) {
            $key = collect($this->countries)->search($id, true);
            array_splice($this->countries, $key, 1);
        } else {
            array_push($this->countries, $id);
        }
    }

    public function render()
    {
        $user = User::with('vendors')->find(auth()->id());
        $businesses = Business::with('country', 'city', 'products')
                                ->when($this->countries && collect($this->countries)->count() > 0, function($query) {
                                    $query->whereIn('country_id', $this->countries);
                                })
                                ->when(auth()->check() && auth()->user()->hasRole('vendor'), function($query) {
                                    $query->where('user_id', '!=', auth()->id());
                                })
                                ->get()
                                ->take(8);

        return view('livewire.home-vendors-list', compact('businesses', 'user'));
    }
}
