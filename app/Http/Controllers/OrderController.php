<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Invoice;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\WarehouseOrder;
use App\Models\WarehouseProduct;
use App\Notifications\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $invoices = auth()->user()->invoices->count();
        if ($invoices <= 0) {
            toastr()->error('', 'No orders found');

            return redirect()->route('welcome');
        }
        return view('invoices');
    }

    public function orders(Invoice $invoice)
    {
        if (!$invoice) {
            return redirect()->route('welcome');
        }

        return view('orders', compact('invoice'));
    }

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
        $invoice = auth()->user()->invoices()->create([
            'delivery_location_address' => $request->delivery_location,
            'delivery_location_lat' => $request->delivery_location_lat,
            'delivery_location_lng' => $request->delivery_location_lng,
            'additional_notes' => $request->has('additional_notes') ? $request->additional_notes : NULL,
            'total_amount' => $request->total_cart_amount,
        ]);

        foreach($products as $key => $product) {
            $order = auth()->user()->orders()->create([
                'invoice_id' => $invoice->id,
                'business_id' => $key,
            ]);

            foreach($product as $item) {
                // Get Entered Item Quantity from request
                $item_quantity = collect($request->items_quantities)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_quantity_measurement_unit = collect($request->items_quantities_measurement_units)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_price = collect($request->items_prices)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $order_item = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => collect($item_quantity)->first().' '.collect($item_quantity_measurement_unit)->first(),
                    'amount' => collect($item_price)->first(),
                ]);

                $warehouse_products = WarehouseProduct::where('product_id', $item->id)->get()->pluck('warehouse_id');

                if ($warehouse_products->count() > 0) {
                    // Find nearest warehouse to the user
                    $warehouse = Warehouse::whereIn('id', $warehouse_products)
                                            ->get()
                                            // Filter by distance between warehouse and customer
                                            ->each(function ($warehouse) use ($request) {
                                                $warehouse_location = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$warehouse->latitude.','.$warehouse->longitude.'&destinations='.$request->delivery_location_lat.','.$request->delivery_location_lng.'&key='.config('services.maps.partial_key'));

                                                if (json_decode($warehouse_location)->rows[0]->elements[0]->status != "NOT_FOUND") {
                                                    $distance = json_decode($warehouse_location)->rows[0]->elements[0]->distance->text;
                                                    $warehouse['distance'] = $distance;
                                                }
                                            })
                                            // Order by distance
                                            ->sortBy([
                                                fn($a, $b) => (double) explode(' ', $a['distance'])[0] < (double) explode(' ',$b['distance'])[0],
                                             ])
                                            //  Get first warehouse
                                            ->first();

                    WarehouseOrder::create([
                        'order_id' => $order->id,
                        'order_item_id' => $order_item->id,
                        'warehouse_id' => $warehouse->id
                    ]);
                }

            }

            if ($request->has('request_inspection')) {
                if ($request->has('inspector_id')) {
                    $order->inspectionRequests()->create([
                        'inspector_id' => $request->get('inspector_id'),
                    ]);
                }
            }

            $business = Business::find($key);
            // $business->notify(new NewOrder($order));
            $business->user->notify(new NewOrder($order));
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
