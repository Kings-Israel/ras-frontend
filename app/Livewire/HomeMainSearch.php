<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\Product;
use Livewire\Component;
use Spatie\Searchable\Search;

class HomeMainSearch extends Component
{
    public $search = '';

    public function render()
    {
        $results = [];
        if (strlen($this->search) >= 2) {
            $results = (new Search())
                ->registerModel(Product::class, ['name', 'description', 'price', 'brand', 'shape', 'color'])
                ->registerModel(Business::class, ['name', 'tag_line', 'about'])
                ->search($this->search);
        }

        return view('livewire.home-main-search', ['results' => $results]);
    }
}
