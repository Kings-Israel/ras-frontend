<?php

namespace App\Livewire\Vendor\Profile\Step;

use App\Models\Business;
use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireWizard\Components\StepComponent;

class Details extends StepComponent
{
    use WithFileUploads;

    public $countries;
    public $cities = [];

    public $name;
    public $country;
    public $city;
    public $primary_cover_image;
    public $secondary_cover_image;
    public $business;

    protected $rules = [
        'name' => 'required|string',
        'country' => 'required',
        'primary_cover_image' => 'required|mimes:png,jpg|max:5000',
        'secondary_cover_image' => 'nullable|mimes:png,jpg|max:5000',
    ];

    protected $messages = [
        'name.required' => 'Enter Business/Store Name',
        'country.required' => 'Select country',
        'primary_cover_image.required' => 'Upload a primary cover image',
        'primary_cover_image.mimes' => 'Image must be a valid MIME type(png or jpg)',
        'primary_cover_image.max' => 'Image cannot be larger than 5MB',
        'secondary_cover_image.mimes' => 'Image must be a valid MIME type(png or jpg)',
        'secondary_cover_image.max' => 'Image cannot be larger than 5MB',
    ];

    public function mount()
    {
        $this->countries = Country::orderBy('name', 'ASC')->get();
        $this->cities = City::orderBy('name', 'ASC')->get();
    }

    public function updatedCountry()
    {
        $this->cities = [];
        $this->cities = City::where('country_id', $this->country)->orderBy('name', 'ASC')->get();
    }

    public function submit()
    {
        $this->validate();

        $this->business = Business::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'country_id' => $this->country,
            'city_id' => $this->city ? $this->city : NULL,
            'primary_cover_image' => pathinfo($this->primary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME),
            'secondary_cover_image' => $this->secondary_cover_image ? pathinfo($this->secondary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME) : NULL,
        ]);

        $this->nextStep();
    }

    public function render()
    {
        return view('livewire.vendor.profile.step.details');
    }
}
