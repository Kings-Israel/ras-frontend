<?php

namespace App\Livewire\Vendor\Profile;

use App\Models\Country;
use Livewire\Component;

class SelectCountry extends Component
{
    public $countries;
    public $country;

    public function mount()
    {
        $this->countries = Country::with('cities', 'requiredDocuments')->orderBy('name', 'ASC')->get();
    }

    public function updatedCountry()
    {
        $this->dispatch('country-updated', $this->country);
    }

    public function render()
    {
        return view('livewire.vendor.profile.select-country');
    }
}
