<?php

namespace App\Livewire\Buyer;

use App\Models\CartItem;
use Livewire\Component;

class CartList extends Component
{
    public $cart;

    public function mount()
    {
        $cart = auth()->user()->cart->load('cartItems.product.business');

        if (!$cart) {
            toastr()->error('', 'No items in cart');
            return back();
        }

        $cart->load('cartItems.product.media');

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
