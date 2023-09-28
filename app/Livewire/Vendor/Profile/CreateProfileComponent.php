<?php

namespace App\Livewire\Vendor\Profile;

use App\Livewire\Vendor\Profile\Step\Details;
use App\Livewire\Vendor\Profile\Step\Documents;
use Livewire\Component;
use Spatie\LivewireWizard\Components\WizardComponent;

class CreateProfileComponent extends WizardComponent
{
    // public function render()
    // {
    //     return view('livewire.vendor.profile.create-profile-component');
    // }
    public function steps(): array
    {
        return [
            Details::class,
            Documents::class,
        ];
    }
}
