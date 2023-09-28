<?php

namespace App\Livewire\Vendor\Profile\Step;

use App\Enums\DocumentTypes;
use App\Models\Business;
use App\Models\BusinessDocument;
use App\Models\City;
use App\Models\Document;
use App\Models\RequiredDocumentPerCountry;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireWizard\Components\StepComponent;

class Documents extends StepComponent
{
    use WithFileUploads;

    public $documents = [];
    public $expiry_dates = [];
    public $document_files = [];
    public $document_names = [];

    public function mount()
    {
        $required_documents = RequiredDocumentPerCountry::with('document')->where('country_id', $this->state()->forStep('details')['country'])->orWhere('country_id', NULL)->get();

        foreach ($required_documents as $required_doc) {
            $this->documents[$required_doc->document->name] = [
                'name' => $required_doc->document->name,
                'requires_expiry_date' => $required_doc->document->requires_expiry_date
            ];
            $this->document_names[$required_doc->document->name] = $required_doc->document->name;
            $this->document_files[$required_doc->document->name] = $required_doc->document->name;
            $this->expiry_dates[$required_doc->document->name] = $required_doc->document->name;
        }
    }

    protected function rules()
    {
        $rules = [
            'document_files.*' => ['required'],
            'expiry_dates.*' => ['required']
        ];

        $required_documents = RequiredDocumentPerCountry::with('document')->where('country_id', $this->state()->forStep('details')['country'])->orWhere('country_id', NULL)->get();

        foreach ($required_documents as $required_doc) {
            $rules['document_files.'.$required_doc->document->name] = ['required', 'mimes:pdf'];
            if ($required_doc->document->requires_expiry_date) {
                $rules['expiry_dates.'.$required_doc->document->name] = ['required', 'date'];
            }
        }

        return $rules;
    }

    protected function messages()
    {
        $rules = [
            'document_files.*.required' => 'Please upload the required document',
            'expiry_dates.*.required' => 'Enter the expiry date of the document'
        ];

        $required_documents = RequiredDocumentPerCountry::with('document')->where('country_id', $this->state()->forStep('details')['country'])->orWhere('country_id', NULL)->get();

        foreach ($required_documents as $required_doc) {
            $rules['document_files.'.$required_doc->document->name.'.required'] = $required_doc->document->name.' is required';
            $rules['document_files.'.$required_doc->document->name.'.mimes'] = $required_doc->document->name.' must be of type .pdf';
            if ($required_doc->document->requires_expiry_date) {
                $rules['expiry_dates.'.$required_doc->document->name.'.required'] = $required_doc->document->name.'\'s expiry_date is required';
                $rules['expiry_dates.'.$required_doc->document->name.'.date'] = $required_doc->document->name.' must be a valid date';
            }
        }

        return $rules;
    }

    public function submit()
    {
        $this->validate();

        $required_documents = RequiredDocumentPerCountry::with('document')->where('country_id', $this->state()->forStep('details')['country'])->orWhere('country_id', NULL)->get();
        $business_details = $this->state()->forStep('details');

        foreach ($required_documents as $document) {
            BusinessDocument::create([
                'business_id' => $business_details['business']['id'],
                'name' => $document->document->name,
                'file' => pathinfo($this->document_files[$document->document->name]->store('documents', 'vendor'), PATHINFO_BASENAME),
                'expires_on' => $document->document->requires_expiry_date ? $this->expiry_dates[$document->document->name] : NULL,
            ]);
        }

        toastr()->success('', 'Profile created successfully');

        return redirect()->route('vendor.dashboard');
    }

    public function render()
    {
        return view('livewire.vendor.profile.step.documents');
    }
}
