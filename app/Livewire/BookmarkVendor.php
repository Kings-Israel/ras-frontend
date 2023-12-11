<?php

namespace App\Livewire;

use App\Models\Business;
use Livewire\Component;

class BookmarkVendor extends Component
{
    public $business;
    public $isBookmarked;

    public function mount(Business $business)
    {
        $this->business = $business;
        $this->isBookmarked = $business->isBookmarked(auth()->user());
    }

    public function bookmark()
    {
        if ($this->isBookmarked) {
            $this->business->removeFromBookmarks(auth()->user());

            $this->isBookmarked = false;
        } else {
            $this->business->addToBookmarks(auth()->user());

            $this->isBookmarked = true;
        }
    }

    public function render()
    {
        return view('livewire.bookmark-vendor');
    }
}
