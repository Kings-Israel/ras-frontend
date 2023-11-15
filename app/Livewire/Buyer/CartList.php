<?php

namespace App\Livewire\Buyer;

use App\Models\Business;
use App\Models\CartItem;
use App\Models\Country;
use App\Models\Product;
use App\Models\InspectingInstitution;
use App\Notifications\NewOrder;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CartList extends Component
{
    public $cart;

    public $products_locations = [];

    public $inspectors = [];

    public function mount()
    {
        $cart = auth()->user()->cart->load('cartItems.product.business', 'cartItems.product.media');

        if (!$cart) {
            toastr()->error('', 'No items in cart');
            return back();
        }

        foreach ($cart->cartItems as $cart_item) {
            if ($cart_item->product->warehouse) {
                array_push($this->products_locations, $cart_item->product->warehouse->country->name);
            } else {
                array_push($this->products_locations, $cart_item->product->business->country->name);
            }
        }

        $this->products_locations = collect($this->products_locations)->unique();

        foreach ($this->products_locations as $product_location) {
            $country = Country::where('name', $product_location)->first();
            $inspector = InspectingInstitution::where('country_id', $country->id)->inRandomOrder()->first();
            if ($inspector) {
                array_push($this->inspectors, $inspector);
            }
        }

        $this->cart = $cart;
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();

        toastr()->success('', 'Item removed successfully');

        if ($this->cart->cartItems->isEmpty()) {
            auth()->user()->cart()->delete();

            toastr()->success('', 'No items in cart');

            return redirect()->route('welcome');
        }
    }

    public function deleteAll()
    {
        auth()->user()->cart()->delete();

        toastr()->success('', 'All items deleted successfully');

        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.buyer.cart-list', [
            'cart' => $this->cart,
        ]);
    }
}
