<?php

namespace App\Livewire\Vendor\Profile;

use App\Models\RequiredDocumentPerCountry;
use Livewire\Attributes\On;
use Livewire\Component;

class UploadDocuments extends Component
{
    public $documents = [];
    public $countries;
    public $country;

    public function mount()
    {
        $required_documents = RequiredDocumentPerCountry::where('country_id', NULL)->get();

        foreach ($required_documents as $key => $value) {
            array_push($this->documents, $value->document);
        }
    }

    #[On('country-updated')]
    public function updatedCountry($country)
    {
        $required_documents = RequiredDocumentPerCountry::with('document')->where('country_id', $country)->orWhere('country_id', NULL)->get();
        $this->documents = [];

        foreach ($required_documents as $key => $value) {
            array_push($this->documents, $value->document);
        }
    }

    public function render()
    {
        return view('livewire.vendor.profile.upload-documents');
    }
}
