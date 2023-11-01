<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Product;
use App\Notifications\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'items_ids' => ['required', 'array'],
            'items_ids.*' => ['integer'],
            'items_quantities' => ['required', 'array'],
            'items_quantities.*' => ['integer'],
            'items_quantities_measurement_units' => ['required', 'array'],
            'items_quantities_measurement_units.*' => ['string'],
            'delivery_location' => ['required'],
            'delivery_location_lat' => ['required'],
            'delivery_location_lng' => ['required'],
            'total_cart_amount' => ['required', 'integer'],
        ], [
            'delivery_location.required' => 'Please select delivery location'
        ]);

        $products = Product::whereIn('id', $request->items_ids)->get()->groupBy('business_id');

        // Create invoice
        $invoice = auth()->user()->invoices()->create();

        foreach($products as $key => $product) {
            $order = auth()->user()->orders()->create([
                'invoice_id' => $invoice->id,
                'business_id' => $key,
                'delivery_location_address' => $request->delivery_location,
                'delivery_location_lat' => $request->delivery_location_lat,
                'delivery_location_lng' => $request->delivery_location_lng,
                'additional_notes' => $request->has('additional_notes') ? $request->additional_notes : NULL,
                'total_amount' => $request->total_cart_amount,
            ]);

            foreach($product as $item) {
                // Get Entered Item Quantity from request
                $item_quantity = collect($request->items_quantities)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_quantity_measurement_unit = collect($request->items_quantities_measurement_units)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_price = collect($request->items_prices)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $order->orderItems()->create([
                    'product_id' => $item->id,
                    'quantity' => collect($item_quantity)->first().' '.collect($item_quantity_measurement_unit)->first(),
                    'amount' => collect($item_price)->first(),
                ]);
            }

            $business = Business::find($key);
            $business->notify(new NewOrder($order));
        }

        if ($request->has('request_financing')) {
            $invoice->financingRequest()->create();
        }

        // Delete Cart
        auth()->user()->cart->delete();

        toastr()->success('', 'Order(s) created successfully and vendor(s) have been notified');

        return redirect()->route('welcome');
    }
}
