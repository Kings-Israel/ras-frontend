<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class HomeCountriesView extends Component
{
    use WithPagination;

    public $search = '';

    public $per_page = 10;

    public $selected_countries = [];

    public function updatedSelectedCountries()
    {
        info($this->selected_countries);
    }

    public function updatePagination()
    {
        $this->per_page += 10;
    }

    public function render()
    {
        return view('livewire.home-countries-view', [
            'countries' => Country::when($this->search && $this->search != '', function($query) {
                                        return $query->where('name', 'LIKE', '%'.$this->search.'%');
                                    })
                                    ->inRandomOrder()
                                    ->paginate($this->per_page)
        ]);
    }
}
