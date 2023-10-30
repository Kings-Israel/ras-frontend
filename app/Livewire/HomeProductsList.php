<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class HomeProductsList extends Component
{
    public $country_search = '';

    #[On('update-home-search')]
    public function updateSearch($search)
    {
        // dd($search);
        info($search);
        // $this->country_search = $search;
    }

    public function render()
    {
        $products = Product::available()
                    ->with(['media' => function($query) {
                        $query->where('type', 'image')
                                ->inRandomOrder();
                    }])
                    ->when($this->country_search && $this->country_search != '', function($query) {
                        $query->whereHas('business', function($query) {
                            $query->where('country_id', $this->country_search);
                        });
                    })
                    ->get()
                    ->take(10);

        return view('livewire.home-products-list', compact('products'));
    }
}
