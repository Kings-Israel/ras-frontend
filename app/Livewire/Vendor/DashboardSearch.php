<?php

namespace App\Livewire\Vendor;

use App\Models\Business;
use App\Models\Order;
use App\Models\Product;
use App\Models\Warehouse;
use Livewire\Component;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;

class DashboardSearch extends Component
{
    public $search = '';
    public $business;

    public function mount(Business $business)
    {
        $this->business = $business;
    }

    public function render()
    {
        $results = [];
        if (strlen($this->search) >= 2) {
            $results = (new Search())
                ->registerModel(Product::class, function(ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('name')
                        ->addSearchableAttribute('description')
                        ->addSearchableAttribute('price')
                        ->addSearchableAttribute('brand')
                        ->addSearchableAttribute('shape')
                        ->addSearchableAttribute('color')
                        ->where('business_id', $this->business->id);
                })
                ->registerModel(Order::class, function(ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('order_id')
                        ->where('business_id', $this->business->id)
                        ->with('orderItems.product');
                })
                ->registerModel(Warehouse::class, function(ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('name')
                        ->with('country');
                })
                ->search($this->search);
        }

        return view('livewire.vendor.dashboard-search', compact('results'));
    }
}
