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
            $inpector = InspectingInstitution::where('country_id', $country->id)->inRandomOrder()->first();
            array_push($this->inspectors, $inpector);
        }

        dd($this->inspectors);

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

    public function store()
    {
        $products = Product::whereIn('id', $this->items_ids)->get()->groupBy('business_id');

        // Create invoice
        $invoice = auth()->user()->invoices()->create([
            'delivery_location_address' => $this->delivery_location,
            'delivery_location_lat' => $this->delivery_location_lat,
            'delivery_location_lng' => $this->delivery_location_lng,
            'additional_notes' => $this->has('additional_notes') ? $this->additional_notes : NULL,
            'total_amount' => $this->total_cart_amount,
        ]);

        foreach($products as $key => $product) {
            $order = auth()->user()->orders()->create([
                'invoice_id' => $invoice->id,
                'business_id' => $key,
            ]);

            foreach($product as $item) {
                // Get Entered Item Quantity from request
                $item_quantity = collect($this->items_quantities)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_quantity_measurement_unit = collect($this->items_quantities_measurement_units)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_price = collect($this->items_prices)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $order->orderItems()->create([
                    'product_id' => $item->id,
                    'quantity' => collect($item_quantity)->first().' '.collect($item_quantity_measurement_unit)->first(),
                    'amount' => collect($item_price)->first(),
                ]);
            }

            $business = Business::find($key);
            $business->notify(new NewOrder($order));
        }

        if ($this->request_financing) {
            $invoice->financingRequest()->create();
        }

        // Delete Cart
        auth()->user()->cart->delete();

        toastr()->success('', 'Order(s) created successfully and vendor(s) have been notified');

        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.buyer.cart-list', [
            'cart' => $this->cart,
        ]);
    }
}
