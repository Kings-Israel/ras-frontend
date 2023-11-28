<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\FinancingInstitution;
use App\Models\InspectingInstitution;
use App\Models\InspectionRequest;
use App\Models\InsuranceCompany;
use App\Models\InsuranceRequest;
use App\Models\Invoice;
use App\Models\LogisticsCompany;
use App\Models\Order;
use App\Models\OrderConversation;
use App\Models\OrderDeliveryRequest;
use App\Models\OrderItem;
use App\Models\OrderStorageRequest;
use App\Models\Product;
use App\Models\QuotationRequestResponse;
use App\Models\Warehouse;
use App\Models\WarehouseOrder;
use App\Models\WarehouseProduct;
use App\Notifications\FinancingRequested;
use App\Notifications\NewOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Chat;

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

    // public function orders(Invoice $invoice)
    // {
    //     if (!$invoice) {
    //         return redirect()->route('welcome');
    //     }
    //     return view('orders', compact('invoice'));
    // }

    public function orders()
    {
        return view('orders');
    }

    public function order(Order $order)
    {
        $order->load('orderItems.product.media', 'orderItems.product.business');

        $order_total = 0;
        foreach ($order->orderItems as $order_item) {
            $order_total += $order_item->amount * explode(' ', $order_item->quantity)[0];

            if ($order_item->insuranceRequest()->exists() && $order_item->insuranceRequest->cost != null) {
                $order_total += (int) $order_item->insuranceRequest->cost;
            }

            if ($order_item->inspectionRequest()->exists() && $order_item->inspectionRequest->cost != null) {
                $order_total += (int) $order_item->inspectionRequest->cost;
            }

            if ($order_item->storageRequest()->exists() && $order_item->storageRequest->cost != null) {
                $order_total += (int) $order_item->storageRequest->cost;
            }

            if ($order_item->deliveryRequest()->exists() && $order_item->deliveryRequest->cost != null) {
                $order_total += (int) $order_item->deliveryRequest->cost;
            }
        }

        return view('order', compact('order', 'order_total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items_ids' => ['required', 'array'],
            'items_ids.*' => ['integer'],
            'items_quantities' => ['required', 'array'],
            'items_quantities.*' => ['integer'],
            'items_prices' => ['required', 'array'],
            'items_prices.*' => ['integer'],
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
            // Create order for each business
            $order = auth()->user()->orders()->create([
                'invoice_id' => $invoice->id,
                'business_id' => $key,
                'status' => 'quotation request'
            ]);

            $business_user = $order->business->user;

            $conversation = Chat::conversations()->between(auth()->user(), $business_user);

            if (!$conversation) {
                $participants = [auth()->user(), $business_user];
                $conversation = Chat::createConversation($participants);
                $conversation->update([
                    'direct_message' => true,
                ]);
            }

            OrderConversation::create([
                'order_id' => $order->id,
                'conversation_id' => $conversation->id,
            ]);

            foreach($product as $item) {
                // Get Entered Item Quantity from request
                $item_quantity = collect($request->items_quantities)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_quantity_measurement_unit = collect($request->items_quantities_measurement_units)->filter(function ($value, $key) use ($item) { return $key == $item->id; });
                $item_price = collect($request->items_prices)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $warehousing_requests = collect($request->warehousing_requests)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $order_item = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => collect($item_quantity)->first().' '.collect($item_quantity_measurement_unit)->first(),
                    'amount' => collect($item_price)->first(),
                    'delivery_date' => Carbon::parse($request->delivery_date)->format('Y-m-d'),
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

                $inspection_requests = collect($request->request_inspection)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $inspectors = InspectingInstitution::all();

                // Create Inspection Request
                if (count($inspection_requests) > 0 && $inspectors->count() > 0 && $request->has('inspector')) {
                    InspectionRequest::create([
                        'order_item_id' => $order_item->id,
                        'inspector_id' => $request->inspector,
                    ]);
                    $inspector = InspectingInstitution::find($request->inspector);

                    $conversation = Chat::conversations()->between(auth()->user(), $inspector);

                    if (!$conversation) {
                        $participants = [auth()->user(), $inspector];
                        $conversation = Chat::createConversation($participants);
                        $conversation->update([
                            'direct_message' => true,
                        ]);
                    }

                    OrderConversation::create([
                        'order_id' => $order->id,
                        'conversation_id' => $conversation->id,
                    ]);
                    // $inspectors->each(function ($inspector) use ($order_item) {
                    // });
                }

                $shipping_requests = collect($request->request_shipping)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $logistics = LogisticsCompany::all();

                // Create Delivery Request
                if (count($shipping_requests) > 0 && $logistics->count() > 0 && $request->has('logistics_provider')) {
                    OrderDeliveryRequest::create([
                        'order_item_id' => $order_item->id,
                        'logistics_company_id' => $request->logistics_provider,
                    ]);

                    $logistics_company = LogisticsCompany::find($request->logistics_provider);

                    $conversation = Chat::conversations()->between(auth()->user(), $logistics_company);

                    if (!$conversation) {
                        $participants = [auth()->user(), $logistics_company];
                        $conversation = Chat::createConversation($participants);
                        $conversation->update([
                            'direct_message' => true,
                        ]);
                    }

                    OrderConversation::create([
                        'order_id' => $order->id,
                        'conversation_id' => $conversation->id,
                    ]);
                    // $logistics->each(function ($logistics) use ($order_item) {
                    // });
                }

                $warehousing_requests = collect($request->request_warehousing)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $warehouses = Warehouse::all();

                // Create storage request
                if (count($warehousing_requests) > 0 && $warehouses->count() > 0 && $request->has('warehouse')) {
                    OrderStorageRequest::create([
                        'order_item_id' => $order_item->id,
                        'warehouse_id' => $request->warehouse,
                    ]);

                    $warehouse = Warehouse::find($request->warehouse);

                    $conversation = Chat::conversations()->between(auth()->user(), $warehouse);

                    if (!$conversation) {
                        $participants = [auth()->user(), $warehouse];
                        $conversation = Chat::createConversation($participants);
                        $conversation->update([
                            'direct_message' => true,
                        ]);
                    }

                    OrderConversation::create([
                        'order_id' => $order->id,
                        'conversation_id' => $conversation->id,
                    ]);
                    // $warehouses->each(function ($warehouse) use ($order_item) {
                    // });
                }

                $insurance_requests = collect($request->request_insurance)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $insurance_companies = InsuranceCompany::all();

                // Create insurance request
                if (count($insurance_requests) > 0 && $insurance_companies->count() > 0 && $request->has('insurer')) {
                    InsuranceRequest::create([
                        'order_item_id' => $order_item->id,
                        'insurance_company_id' => $request->insurer,
                    ]);

                    $insurance_company = InsuranceCompany::find($request->insurer);

                    $conversation = Chat::conversations()->between(auth()->user(), $insurance_company);

                    if (!$conversation) {
                        $participants = [auth()->user(), $insurance_company];
                        $conversation = Chat::createConversation($participants);
                        $conversation->update([
                            'direct_message' => true,
                        ]);
                    }

                    OrderConversation::create([
                        'order_id' => $order->id,
                        'conversation_id' => $conversation->id,
                    ]);
                    // $insurance_companies->each(function ($insurance_company) use ($order_item) {
                    // });
                }
            }

            $business = Business::find($key);
            // $business->notify(new NewOrder($order));
            $business->user->notify(new NewOrder($order));
        }

        // if ($request->has('request_financing')) {
        //     $invoice->financingRequest()->create();
        // }

        // Delete Cart
        auth()->user()->cart->delete();

        toastr()->success('', 'Order(s) created successfully and vendor(s) have been notified');

        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function updateQuotation(QuotationRequestResponse $quotation, $status)
    {
        $order_item = OrderItem::find($quotation->order_item_id);

        if (!$order_item) {
            toastr()->error('', 'The Order Item does not exist');
            return back();
        }

        $order_item->update([
            'quantity' => $quotation->quantity.' '.explode(' ', $order_item->product->min_order_quantity)[1],
            'amount' => $quotation->amount,
            'delivery_date' => $quotation->delivery_date,
            'status' => 'accepted'
        ]);

        // $quotation->update([
        //     'status' => $status
        // ]);

        // Delete Other quotation requests
        QuotationRequestResponse::where('order_item_id', $order_item->id)->delete();

        // Check for other items and quotation requests for the order
        // If all quotation requests are accepted, then update the order to pending
        $order_items = OrderItem::where('order_id', $order_item->order_id)
                                    ->where(function ($query) {{
                                        $query->where('status', 'pending')
                                                ->orWhere('status', 'rejected');
                                    }})
                                    ->count();

        if ($order_items <= 0) {
            Order::where('id', $order_item->order_id)
                ->first()
                ->update([
                    'status' => 'pending',
                ]);
            }

        activity()->causedBy(auth()->user())->performedOn($quotation)->log('accepted quotation for order item '.$order_item->product->name.' for order '.$order_item->order->order_id);

        toastr()->success('', 'Quotation updated successfully');

        return back();
    }

    public function requestFinancing(Invoice $invoice)
    {
        $financiers = FinancingInstitution::with('users')->get();

        foreach($financiers as $financier) {
            $invoice->financingRequest()->create([
                'financing_institution_id' => $financier->id
            ]);

            foreach ($financier->users as $user) {
                $user->notify(new FinancingRequested($invoice));
            }
        }

        toastr()->success('', 'Financing Request sent successfully');

        return back();
    }

    public function updateRequest(Request $request, $quote, $status)
    {
        $type = $request->query('type');

        $quote = $type::find($quote);

        $quote->update([
            'status' => $status,
        ]);

        toastr()->success('', 'Request updated successfully');

        return back();
    }
}
