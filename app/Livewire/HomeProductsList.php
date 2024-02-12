<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class HomeProductsList extends Component
{
    public $countries = [];

    #[On('update-selected-countries')]
    public function updateProductsList($id)
    {
        if(collect($this->countries)->contains($id)) {
            $key = collect($this->countries)->search($id, true);
            array_splice($this->countries, $key, 1);
        } else {
            array_push($this->countries, $id);
        }
    }

    public function render()
    {
        $products = Product::available()
                    ->with(['media' => function($query) {
                        $query->where('type', 'image')
                                ->inRandomOrder();
                    }])
                    ->when($this->countries && collect($this->countries)->count() > 0, function($query) {
                        $query->whereHas('business', function($query) {
                            $query->whereIn('country_id', $this->countries);
                        });
                    })
                    ->get()
                    ->take(10);

        return view('livewire.home-products-list', compact('products'));
    }
}
