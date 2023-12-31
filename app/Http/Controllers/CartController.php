<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;

        if ($cart) {
            return view('cart');
        }

        toastr()->error('', 'No items in cart');

        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required', 'integer'],
            'amount' => ['required', 'integer'],
        ]);

        $cart = auth()->user()->cart;
        if (!$cart) {
            $cart = auth()->user()->cart()->create();
        }

        $item_exists = CartItem::where('cart_id', $cart->id)->where('product_id', $request->product_id)->first();

        if ($item_exists) {
            toastr()->error('', 'Item already exists in cart');
            return back();
        }

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'quantity' => $request->has('quantity') && $request->quantity > 0 ? $request->quantity : NULL,
            'amount' => $request->amount,
        ]);

        toastr()->success('', 'Item added to cart successfully');

        if (request()->wantsJson()) {
            return response()->json(['cart' => $cart->load('cartItems.product.media')], 200);
        }

        return redirect()->route('cart')->with(['cart' => $cart->load('cartItems.product.media')]);
    }

    public function show()
    {
        $cart = auth()->user()->cart->load('cartItems');

        return view('cart', compact('cart'));
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return $cart;
    }

    public function deleteCartItem($cart_id, $cart_item_id)
    {
        $cart_item = CartItem::where('cart_id', $cart_id)->where('cart_item_id', $cart_item_id)->delete();

        return $cart_item;
    }
}
