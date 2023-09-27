<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Component;

class HomeCountriesView extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.home-countries-view', [
            'countries' => Country::when($this->search && $this->search != '', function($query) {
                                        return $query->where('name', 'LIKE', '%'.$this->search.'%');
                                    })
                                    ->inRandomOrder()
                                    ->get()
                                    ->take(5)
        ]);
    }
}
