<?php

namespace App\Livewire;

use App\Models\Business;
use Livewire\Component;

class HomeVendorsList extends Component
{
    public function render()
    {
        $businesses = Business::with('country', 'city', 'products')->get()->take(8);

        return view('livewire.home-vendors-list', compact('businesses'));
    }
}
