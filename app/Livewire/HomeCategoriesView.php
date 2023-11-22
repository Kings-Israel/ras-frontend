<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class HomeCategoriesView extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home-categories-view', [
            'categories' => Category::paginate(9),
        ]);
    }
}
