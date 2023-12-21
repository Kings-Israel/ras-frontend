<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use App\Models\Business;
use App\Models\Country;
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
use App\Models\OrderRequest;
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
use App\Models\FinancingRequestDocument;
use App\Models\FinancingRequestCompany;
use App\Models\FinancingRequestBanker;
use App\Models\FinancingRequestCapitalStructure;
use App\Models\FinancingRequestShareholder;
use App\Models\FinancingRequestCompanyManagement;
use App\Models\FinancingRequestBankDebt;
use App\Models\FinancingRequestOperatingDebt;
use App\Models\FinancingRequestAnchorHistory;
use Illuminate\Support\Facades\DB;
use App\Models\UserMetaData;
use App\Models\UserIdentificationDoc;
use App\Models\InsReqBuyerCompanyDetails;
use App\Models\InsReqBuyerDetails;
use App\Models\InsReqBuyerProposalDetails;
use App\Models\InsReqBuyerInsuranceLossHistory;
use App\Models\InsReqBuyerProposalVehicleDetails;

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
        $order->load('orderItems.product.media',
            'orderItems.product.business',
            'orderItems.orderRequests.insuranceRequestBuyerDetails',
            'orderItems.orderRequests.insuranceRequestBuyerCompanyDetails',
            'orderItems.orderRequests.insuranceRequestBuyerInuranceLossHistories',
            'orderItems.orderRequests.insuranceRequestProposalDetails',
            'orderItems.orderRequests.insuranceRequestProposalVehicleDetails',
            'orderItems.quotationResponses',
            'orderItems.orderRequests.businessSubsidiaries',
            'orderItems.orderRequests.businessInformation',
            'orderItems.orderRequests.businessSalesInformation',
            'orderItems.orderRequests.businessSales',
            'orderItems.orderRequests.businessSalesBadDebts',
            'orderItems.orderRequests.businessSalesLargeBadDebts',
            'orderItems.orderRequests.businessSecurity',
            'orderItems.orderRequests.businessCreditManagement',
            'orderItems.orderRequests.businessCreditLimits',
            'orderItems.orderRequests.importInstruction',
            'orderItems.orderRequests.exportInstruction',
            'invoice'
        );

        $order_total = 0;
        $order_requests = null;
        foreach ($order->orderItems as $order_item) {
            dd($order_item);
            $order_total += $order_item->amount * explode(' ', $order_item->quantity)[0];
            $order_total += $order_item->orderRequests->where('status', 'accepted')->sum('cost');

            $order_requests = $order_item->orderRequests->groupBy('requesteable_type');
        }

        $available_facilities = [
            'letter_of_invoice_discouting' => 'Letter of Invoice Discouting',
            'lpo_financing' => 'LPO Financing',
            'contract_financing' => 'Contract Financing',
            'reverse_factoring' => 'Reverse Factoring',
            'cheque_discouting' => 'Cheque Discouting',
        ];

        $durations = [
            '30 Days',
            '60 Days',
            '90 Days',
        ];

        return view('order', compact('order', 'order_total', 'order_requests', 'available_facilities', 'durations'));
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

        if (auth()->user()->hasRole('vendor')) {
            foreach ($products as $key => $product) {
                if ($key == auth()->user()->business->id) {
                    toastr()->error('', 'You cannot make an order on your product');
                    return redirect()->route('welcome');
                }
            }
        }

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
                if (count($inspection_requests) > 0 && $inspectors->count() > 0 && count($request->inspector) > 0) {
                    foreach ($request->inspector as $inspector) {
                        // InspectionRequest::create([
                        //     'order_item_id' => $order_item->id,
                        //     'inspector_id' => $inspector,
                        // ]);

                        $inspector = InspectingInstitution::find($inspector);

                        OrderRequest::create([
                            'order_item_id' => $order_item->id,
                            'requesteable_type' => InspectingInstitution::class,
                            'requesteable_id' => $inspector->id,
                        ]);

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
                    }
                }

                // if (count($inspection_requests) > 0 && $inspectors->count() > 0 && $request->has('inspector')) {
                //     InspectionRequest::create([
                //         'order_item_id' => $order_item->id,
                //         'inspector_id' => $request->inspector,
                //     ]);
                //     $inspector = InspectingInstitution::find($request->inspector);

                //     $conversation = Chat::conversations()->between(auth()->user(), $inspector);

                //     if (!$conversation) {
                //         $participants = [auth()->user(), $inspector];
                //         $conversation = Chat::createConversation($participants);
                //         $conversation->update([
                //             'direct_message' => true,
                //         ]);
                //     }

                //     OrderConversation::create([
                //         'order_id' => $order->id,
                //         'conversation_id' => $conversation->id,
                //     ]);
                //     // $inspectors->each(function ($inspector) use ($order_item) {
                //     // });
                // }

                $shipping_requests = collect($request->request_shipping)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $logistics = LogisticsCompany::all();

                // Create Delivery Request
                if (count($shipping_requests) > 0 && $logistics->count() > 0 && count($request->logistics_provider) > 0) {
                    foreach ($request->logistics_provider as $logistics_provider) {
                        $logistics_company = LogisticsCompany::find($logistics_provider);

                        OrderRequest::create([
                            'order_item_id' => $order_item->id,
                            'requesteable_id' => $logistics_company->id,
                            'requesteable_type' => LogisticsCompany::class,
                            'transportation_method' => $request->has('transport_method') ? $request->transport_method : NULL,
                        ]);

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
                    }
                    // $logistics->each(function ($logistics) use ($order_item) {
                    // });
                }
                // if (count($shipping_requests) > 0 && $logistics->count() > 0 && $request->has('logistics_provider')) {
                //     OrderDeliveryRequest::create([
                //         'order_item_id' => $order_item->id,
                //         'logistics_company_id' => $request->logistics_provider,
                //     ]);

                //     $logistics_company = LogisticsCompany::find($request->logistics_provider);

                //     $conversation = Chat::conversations()->between(auth()->user(), $logistics_company);

                //     if (!$conversation) {
                //         $participants = [auth()->user(), $logistics_company];
                //         $conversation = Chat::createConversation($participants);
                //         $conversation->update([
                //             'direct_message' => true,
                //         ]);
                //     }

                //     OrderConversation::create([
                //         'order_id' => $order->id,
                //         'conversation_id' => $conversation->id,
                //     ]);
                //     // $logistics->each(function ($logistics) use ($order_item) {
                //     // });
                // }

                $warehousing_requests = collect($request->request_warehousing)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $warehouses = Warehouse::all();

                // Create storage request
                if (count($warehousing_requests) > 0 && $warehouses->count() > 0 && count($request->warehouse) > 0) {
                    foreach ($request->warehouse as $warehouse) {
                        $warehouse = Warehouse::find($warehouse);

                        OrderRequest::create([
                            'order_item_id' => $order_item->id,
                            'requesteable_id' => $warehouse->id,
                            'requesteable_type' => Warehouse::class,
                        ]);

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
                    }
                    // $warehouses->each(function ($warehouse) use ($order_item) {
                    // });
                }
                // if (count($warehousing_requests) > 0 && $warehouses->count() > 0 && $request->has('warehouse')) {
                //     OrderStorageRequest::create([
                //         'order_item_id' => $order_item->id,
                //         'warehouse_id' => $request->warehouse,
                //     ]);

                //     $warehouse = Warehouse::find($request->warehouse);

                //     $conversation = Chat::conversations()->between(auth()->user(), $warehouse);

                //     if (!$conversation) {
                //         $participants = [auth()->user(), $warehouse];
                //         $conversation = Chat::createConversation($participants);
                //         $conversation->update([
                //             'direct_message' => true,
                //         ]);
                //     }

                //     OrderConversation::create([
                //         'order_id' => $order->id,
                //         'conversation_id' => $conversation->id,
                //     ]);
                //     // $warehouses->each(function ($warehouse) use ($order_item) {
                //     // });
                // }

                $insurance_requests = collect($request->request_insurance)->filter(function ($value, $key) use ($item) { return $key == $item->id; });

                $insurance_companies = InsuranceCompany::all();

                // Create insurance request
                if (count($insurance_requests) > 0 && $insurance_companies->count() > 0 && count($request->insurer) > 0) {
                    foreach ($request->insurer as $insurer) {
                        $insurance_company = InsuranceCompany::find($insurer);

                        OrderRequest::create([
                            'order_item_id' => $order_item->id,
                            'requesteable_id' => $insurance_company->id,
                            'requesteable_type' => InsuranceCompany::class,
                        ]);

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
                    }
                    // $insurance_companies->each(function ($insurance_company) use ($order_item) {
                    // });
                }
                // if (count($insurance_requests) > 0 && $insurance_companies->count() > 0 && $request->has('insurer')) {
                //     InsuranceRequest::create([
                //         'order_item_id' => $order_item->id,
                //         'insurance_company_id' => $request->insurer,
                //     ]);

                //     $insurance_company = InsuranceCompany::find($request->insurer);

                //     $conversation = Chat::conversations()->between(auth()->user(), $insurance_company);

                //     if (!$conversation) {
                //         $participants = [auth()->user(), $insurance_company];
                //         $conversation = Chat::createConversation($participants);
                //         $conversation->update([
                //             'direct_message' => true,
                //         ]);
                //     }

                //     OrderConversation::create([
                //         'order_id' => $order->id,
                //         'conversation_id' => $conversation->id,
                //     ]);
                //     // $insurance_companies->each(function ($insurance_company) use ($order_item) {
                //     // });
                // }
            }

            $business = Business::find($key);
            // $business->notify(new NewOrder($order));
            $business->user->notify(new NewOrder($order));
            event(new NewNotification($business->user->email));
        }

        // Delete Cart
        auth()->user()->cart->delete();

        toastr()->success('', 'Order(s) created successfully and vendor(s) have been notified');

        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'status' => $request->status
        ]);

        toastr()->success('', 'Order updated successfully');

        return back();
    }

    public function delete(Order $order)
    {
        if (($order->status == 'quotation request' || $order->status == 'pending' || $order->status == 'accepted') && $order->invoice->payment_status != 'paid') {
            $order->delete();

            toastr()->success('', 'Order deleted successfully');

            return redirect()->route('orders');
        }

        toastr()->error('', 'Cannot delete ongoing order');

        return back();
    }

    public function updateQuotation(QuotationRequestResponse $quotation, $status)
    {
        $order_item = OrderItem::find($quotation->order_item_id);

        if (!$order_item) {
            toastr()->error('', 'The Order Item does not exist');
            return back();
        }

        if ($status == 'accepted') {
            QuotationRequestResponse::where('order_item_id', $order_item->id)->update(['status' => 'rejected']);

            $order_item->update([
                'quantity' => $quotation->quantity.' '.explode(' ', $order_item->product->min_order_quantity)[1],
                'amount' => $quotation->amount,
                // 'delivery_date' => $quotation->delivery_date,
                'status' => 'accepted'
            ]);
        }

        $quotation->update([
            'status' => $status
        ]);

        // // Check for other items and quotation requests for the order
        // // If all quotation requests are accepted, then update the order to pending
        // $order_items = OrderItem::where('order_id', $order_item->order_id)
        //                             ->where(function ($query) {{
        //                                 $query->where('status', 'pending')
        //                                         ->orWhere('status', 'rejected');
        //                             }})
        //                             ->count();

        // if ($order_items <= 0) {
        //     Order::where('id', $order_item->order_id)
        //         ->first()
        //         ->update([
        //             'status' => 'pending',
        //         ]);
        // }

        activity()->causedBy(auth()->user())->performedOn($quotation)->log('accepted quotation for order item '.$order_item->product->name.' for order '.$order_item->order->order_id);

        toastr()->success('', 'Quotation updated successfully');

        return back();
    }

    public function requestInsurance(OrderItem $order_item)
    {
        $order_item->load('orderRequests');

        $genders = ['Male', 'Female'];
        $marital_statuses = ['Married', 'Single'];
        $identification_docs = [
            'identity_card' => [
                'name' => 'Identity Card',
                'requires_expiry_date' => false
            ],
            'passport' => [
                'name' => 'Passport',
                'requires_expiry_date' => true
            ],
            'asylum' => [
                'name' => 'Asylum',
                'requires_expiry_date' => true
            ]
        ];
        $sources_of_income = ['Salary', 'Business Proceeds', 'Pension', 'Rent', 'None Income Generating (dependant)'];
        $sources_of_wealth = ['Legal Settlement', 'Royalties', 'Inheritance', 'Donations', 'Wnnings', 'Savings', 'Sale of Investment', 'Sale of Property', 'Rent', 'Employment', 'Pension', 'Business Proceeds'];
        $business_sources_of_income = ['Business Proceeds', 'Rent', 'Donations', 'Government Funding'];
        $business_sources_of_wealth = ['Court Order', 'Sale of Property', 'Sale of Investment', 'Government Funding', 'Shareholder Contribution'];
        $vehicle_devices = ['Tracking Devices', 'Radio Communication', 'Engine Immobilizer'];

        return view('buyer.insurance-report', compact('order_item', 'genders', 'marital_statuses', 'identification_docs', 'sources_of_income', 'sources_of_wealth', 'business_sources_of_income', 'business_sources_of_wealth', 'vehicle_devices'));
    }

    public function storeInsuranceRequest(Request $request, OrderItem $order_item)
    {
        try {
            DB::beginTransaction();

            // Fill user metadata
            $user_data = UserMetaData::where('user_id', auth()->id())->first();
            if (!$user_data) {
                $user_data = UserMetaData::create([
                    'user_id' => auth()->id(),
                    'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
                    'gender' => $request->gender,
                    'marital_status' => $request->marital_status,
                    'nationality' => $request->nationality,
                    'citizenship' => $request->citizenship,
                    'postal_address' => $request->postal_address,
                    'postal_code' => $request->postal_code,
                    'city' => $request->city,
                    'residential_address' => $request->residential_address,
                    'next_of_kin_name' => $request->next_of_kin_name,
                    'next_of_kin_email' => $request->next_of_kin_email,
                    'next_of_kin_phone_number' => $request->next_of_kin_phone_number,
                    'next_of_kin_relationship' => $request->next_of_kin_relationship,
                ]);
            }

            if (count($request->identification_document) > 0) {
                UserIdentificationDoc::where('user_id', auth()->id())->delete();
                foreach ($request->identification_document as $key => $identification_document) {
                    UserIdentificationDoc::create([
                        'user_id' => auth()->id(),
                        'document_name' => $key,
                        'document_number' => array_key_exists($key, $request->identification_number) ? $request->identification_number[$key] : NULL,
                        'document_file' => pathinfo($identification_document->store('id', 'user'), PATHINFO_BASENAME),
                        'expiry_date' => array_key_exists($key, $request->identification_document_expiry) ? Carbon::parse($request->identification_document_expiry[$key])->format('Y-m-d') : NULL,
                    ]);
                }
            }

            $order_requests = OrderRequest::where('requesteable_type', 'App\Models\InsuranceCompany')->where('order_item_id', $order_item->id)->get();

            if ($order_requests->count() > 0) {
                foreach ($order_requests as $order_request) {
                    InsReqBuyerDetails::create([
                        'order_request_id' => $order_request->id,
                        'marital_status' => $request->marital_status,
                        'nationality' => $request->nationality,
                        'citizenship' => $request->citizenship,
                        'postal_address' => $request->postal_address,
                        'postal_code' => $request->postal_code,
                        'city' => $request->city,
                        'residential_address' => $request->residential_address,
                        'income_tax_pin_number' => $request->income_tax_pin,
                        'income_tax_pin_file' => $request->hasFile('income_tax_pin_certificate') ? pathinfo($request->income_tax_pin_certificate->store('doc', 'insurance'), PATHINFO_BASENAME) : NULL,
                        'is_employed' => $request->is_employed == 'No' ? false : true,
                        'is_self_employed' => $request->is_self_employed == 'No' ? false : true,
                        'occupation' => $request->occupation,
                        'occupation_sector' => $request->occupation_sector,
                        'income_sources' => json_encode($request->source_of_income),
                        'wealth_sources' => json_encode($request->source_of_wealth),
                    ]);

                    InsReqBuyerCompanyDetails::create([
                        'order_request_id' => $order_request->id,
                        'trade_name' => $request->business_trade_name,
                        'registered_name' => $request->business_legal_name,
                        'registration_number' => $request->business_registration_number,
                        'country_of_incorporation' => $request->business_country_of_incorporation,
                        'country_of_parent_company' => $request->business_country_of_parent_company,
                        'email' => $request->business_email,
                        'phone_number' => $request->business_phone_number,
                        'postal_address' => $request->business_postal_address,
                        'postal_code' => $request->business_postal_code,
                        'city' => $request->business_city,
                        'physical_location' => $request->business_residential_address,
                        'nature_of_business' => $request->business_nature,
                        'sector' => $request->business_sector,
                        'income_tax_pin' => $request->business_income_tax_pin,
                        'income_tax_document' => $request->hasFile('business_income_tax_pin_certificate') ? pathinfo($request->business_income_tax_pin_certificate->store('doc', 'insurance'), PATHINFO_BASENAME) : NULL,
                        'sources_of_income' => json_encode($request->business_source_of_income),
                        'sources_of_wealth' => json_encode($request->business_source_of_wealth),
                    ]);

                    $transported_products = [];
                    if ($request->wines_and_spirits == 'Yes') {
                        array_push($transported_products, 'Wines and Spirits');
                    }
                    if ($request->fragile_goods == 'Yes') {
                        array_push($transported_products, 'Fragile Goods');
                    }
                    if ($request->explosive_goods == 'Yes') {
                        array_push($transported_products, 'Explosive and Hazardous Goods');
                    }

                    $vehicle_features = [];
                    if (count($request->vehicle_devices) > 0) {
                        foreach ($request->vehicle_devices as $vehicle_device) {
                            array_push($vehicle_features, $vehicle_device);
                        }
                    }

                    if ($request->has('other_vehicle_devices')) {
                        array_push($vehicle_features, $request->other_vehicle_devices);
                    }

                    $prev_insurance_data = [];
                    if ($request->has('had_cancelled_policy') && $request->had_cancelled_policy == 'Yes') {
                        array_push($prev_insurance_data, 'Cancelled Policy');
                    }
                    if ($request->has('had_insurance_declined') && $request->had_insurance_declined == 'Yes') {
                        array_push($prev_insurance_data, 'Insurance Declined');
                    }
                    if ($request->has('had_declined_policy_renewal') && $request->had_declined_policy_renewal == 'Yes') {
                        array_push($prev_insurance_data, 'Declined Policy Renewal');
                    }
                    if ($request->has('had_special_terms_imposed') && $request->had_special_terms_imposed == 'Yes') {
                        array_push($prev_insurance_data, 'Special Terms Imposed');
                    }
                    if ($request->has('had_claim_denied') && $request->had_claim_denied == 'Yes') {
                        array_push($prev_insurance_data, 'Denied Claim');
                    }

                    InsReqBuyerProposalDetails::create([
                        'order_request_id' => $order_request->id,
                        'period_from' => Carbon::parse($request->period_of_insurance_start)->format('Y-m-d'),
                        'period_to' => Carbon::parse($request->period_of_insurance_end)->format('Y-m-d'),
                        'mode_of_conveyance' => $request->conveyance_mode,
                        'territorial_limits' => $request->territory_limits,
                        'packaging' => $request->product_packaging,
                        'transported_products' => count($transported_products) > 0 ? json_encode($transported_products) : NULL,
                        'use_hired_vehicles' => $request->will_use_hired_vehicles == 'Yes' ? true : false,
                        'hired_vehicles_details' => $request->hired_vehicles_details,
                        'goods_safety_details' => $request->goods_safety,
                        'vehicle_features' => count ($vehicle_features) > 0 ? json_encode($vehicle_features) : NULL,
                        'liability_limit_one_consignment' => $request->limit_of_liability_one_consignment,
                        'liability_limit_period_of_insurance' => $request->limit_of_liability_period_of_insurance,
                        'liability_limit_estimated_annual_carry' => $request->limit_of_liability_one_consignment,
                        'had_previous_insurance' => $request->have_been_insured == 'Yes' ? true : false,
                        'current_precautions' => $request->precautions_engaged,
                        'previous_insurer' => json_encode(['Insurer' => $request->prev_insurer, 'Policy Number' => $request->prev_insurance_policy_number]),
                        'previous_insurance_data' => json_encode($prev_insurance_data),
                        'previous_insurance_details' => $request->prev_insurance_details,
                    ]);

                    if (count($request->vehicle_description) > 0) {
                        foreach ($request->vehicle_description as $key => $vehicle) {
                            InsReqBuyerProposalVehicleDetails::create([
                                'order_request_id' => $order_request->id,
                                'type' => 'Vehicle',
                                'description' => $vehicle,
                                'registration_number' => array_key_exists($key, $request->vehicle_reg_number) ? $request->vehicle_reg_number[$key] : NULL,
                                'carrying_capacity' => array_key_exists($key, $request->vehicle_carrying_capacity) ? $request->vehicle_carrying_capacity[$key] : NULL,
                                'sum_insured' => array_key_exists($key, $request->vehicle_sum_insured) ? $request->vehicle_sum_insured[$key] : NULL,
                            ]);
                        }
                    }

                    if (count($request->trailer_description) > 0) {
                        foreach ($request->trailer_description as $key => $trailer) {
                            InsReqBuyerProposalVehicleDetails::create([
                                'order_request_id' => $order_request->id,
                                'type' => 'Trailer',
                                'description' => $trailer,
                                'registration_number' => array_key_exists($key, $request->trailer_reg_number) ? $request->trailer_reg_number[$key] : NULL,
                                'carrying_capacity' => array_key_exists($key, $request->trailer_carrying_capacity) ? $request->trailer_carrying_capacity[$key] : NULL,
                                'sum_insured' => array_key_exists($key, $request->trailer_sum_insured) ? $request->trailer_sum_insured[$key] : NULL,
                            ]);
                        }
                    }

                    if (count($request->prev_loss_description) > 0) {
                        foreach ($request->prev_loss_description as $key => $prev_loss) {
                            InsReqBuyerInsuranceLossHistory::create([
                                'order_request_id' => $order_request->id,
                                'year' => array_key_exists($key, $request->prev_loss_year) ? $request->prev_loss_year[$key] : NULL,
                                'cause_of_loss' => array_key_exists($key, $request->prev_loss_cause) ? $request->prev_loss_cause[$key] : NULL,
                                'description' => $prev_loss,
                                'amount' => array_key_exists($key, $request->prev_loss_amount) ? $request->prev_loss_amount[$key] : NULL,
                            ]);
                        }
                    }
                }
            }

            DB::commit();

            toastr()->success('', 'Insurance Report submitted successfully');

            return redirect()->route('orders.show', ['order' => $order_item->order]);
        } catch (\Exception $e) {
            info($e);
            DB::rollBack();
            toastr()->error('', 'Error while adding insurance details');
            return back();
        }
    }

    public function requestFinancing(Invoice $invoice)
    {
        if($invoice->financingRequest()->exists()) {
            toastr()->error('', 'Financing request already exists');

            return redirect()->route('orders.show', ['order' => $invoice->orders->first()]);
        }

        $order_total = 0;
        foreach ($invoice->orders as $order) {
            foreach ($order->orderItems as $order_item) {
                $order_total += $order_item->amount * explode(' ', $order_item->quantity)[0];
                $order_total += $order_item->orderRequests->where('status', 'accepted')->sum('cost');
            }
        }

        $available_facilities = [
            'letter_of_invoice_discouting' => 'Letter of Invoice Discouting',
            'lpo_financing' => 'LPO Financing',
            'contract_financing' => 'Contract Financing',
            'reverse_factoring' => 'Reverse Factoring',
            'cheque_discouting' => 'Cheque Discouting',
        ];

        $durations = [
            '30 Days',
            '60 Days',
            '90 Days',
        ];

        $documents = [
            'details_of_facilities_required' => 'Application giving details of facilities required, purpose, justification and proposed repayment term',
            'business_license' => 'Valid Trading/Business License',
            'Business Registration Documents' => [
                'certificate_of_incorporation' => 'Certificate of Incorporation',
                'cr_12' => 'CR 12',
                'memorandum_of_association' => 'Memorandum of Association',
                'article_of_association' => 'Article of Association',
                'kra_pin' => 'KRA PIN'
            ],
            'annuals_returns' => 'Annual Returns',
            'filing_receipts' => 'Filing Receipt',
            'business_profile' => 'Business/Company Profile',
            'directors_ids' => 'Directors IDs',
            'directors_pins' => 'Directors PINs',
            'certified_bank_statment' => 'Certified Bank Statment for past 12 Months',
            'projected_pl_account' => 'Projected P&L Account',
            'cash_flow_statement' => 'Cash Flow Statement',
            'balance_sheet' => 'Balance Sheet covering period of facility',
            'list_of_debtors_and_creditors' => 'Aged list of Dedbtors and Creditors at the most recent date',
            'board_resolution' => 'Borrower\'s Board Resolution authorizing the borrowing',
        ];

        $countries = Country::all();

        return view('partials.order.financing-request', compact('invoice', 'available_facilities', 'durations', 'order_total', 'documents', 'countries'));
    }

    public function storeFinancingRequest(Request $request, Invoice $invoice)
    {
        $financier = FinancingInstitution::with('users')->first();

        if (!$request->has('agree_to_terms_and_conditions')) {
            toastr()->error('', 'You must agree to terms and conditions.');
            return back();
        }

        try {
            DB::beginTransaction();

            $financing_request = $invoice->financingRequest()->create([
                'financing_institution_id' => $financier->id,
                'requested_facility' => $request->has('requested_facility') ? $request->requested_facility : NULL,
                'facility_duration' => $request->has('facility_duration') ? $request->facility_duration : NULL,
                'facility_purpose' => $request->has('facility_purpose') ? $request->facility_purpose : NULL,
            ]);

            if ($request->has('company_documents') && count($request->company_documents) > 0) {
                foreach ($request->company_documents as $key => $company_doc) {
                    FinancingRequestDocument::create([
                        'financing_request_id' => $financing_request->id,
                        'document_name' => $key,
                        'document_url' => pathinfo($request->company_documents[$key]->store('documents', 'financing_request'), PATHINFO_BASENAME),
                    ]);
                }
            }

            if ($request->has('company_name') && $request->has('company_registration_number') && $request->has('country')) {
                FinancingRequestCompany::create([
                    'financing_request_id' => $financing_request->id,
                    'name' => $request->company_name,
                    'registration_number' => $request->company_registration_number,
                    'country' => $request->country,
                    'country_of_incorporation' => $request->has('country_of_incorporation') ? $request->country_of_incorporation : NULL,
                    'pin_no' => $request->has('company_pin_number') ? $request->company_pin_number : NULL,
                    'date_trade_started' => $request->has('date_trade_started') ? Carbon::parse($request->date_trade_started) : NULL,
                    'postal_address' => $request->has('company_postal_address') ? $request->company_postal_address : NULL,
                    'postal_code' => $request->has('company_postal_code') ? $request->company_postal_code : NULL,
                    'city' => $request->has('company_city') ? $request->company_city : NULL,
                    'physical_address' => $request->has('company_physical_address') ? $request->company_physical_address : NULL,
                    'phone_number' => $request->has('company_phone_number') ? $request->company_phone_number : NULL,
                    'email' => $request->has('company_email') ? $request->company_email : NULL,
                    'business_nature' => $request->has('company_business_nature') ? $request->company_business_nature : NULL,
                    'clients_information' => $request->has('company_clients_information') ? $request->company_clients_information : NULL,
                ]);
            }

            if ($request->has('bank_names') && count($request->bank_names) > 0) {
                foreach ($request->bank_names as $key => $bank_name) {
                    FinancingRequestBanker::create([
                        'financing_request_id' => $financing_request->id,
                        'bank_name' => $bank_name,
                        'bank_branch' => $request->bank_branches[$key] ? $request->bank_branches[$key] : NULL,
                        'account_number' => $request->bank_account_numbers[$key] ? $request->bank_account_numbers[$key] : NULL,
                        'period_with_bank' => $request->period_with_banks[$key] ? $request->period_with_banks[$key] : NULL,
                    ]);
                }
            }

            if ($request->has('authorized_capital_amount') && $request->has('paid_up_capital_amount')) {
                FinancingRequestCapitalStructure::create([
                    'financing_request_id' => $financing_request->id,
                    'authorized_capital_amount' => $request->authorized_capital_amount,
                    'authorized_capital_shares' => $request->has('authorized_capital_shares_count') ? $request->authorized_capital_shares_count : NULL,
                    'authorized_capital_share_value' => $request->has('authorized_capital_share_value') ? $request->authorized_capital_share_value : NULL,
                    'paid_up_capital_amount' => $request->paid_up_capital_amount,
                    'paid_up_capital_shares' => $request->has('paid_up_capital_shares_count') ? $request->paid_up_capital_shares_count : NULL,
                    'paid_up_capital_share_value' => $request->has('paid_up_capital_share_value') ? $request->paid_up_capital_share_value : NULL,
                ]);
            }

            if ($request->has('shareholders') && count($request->shareholders) > 0) {
                foreach ($request->shareholders as $shareholder) {
                    FinancingRequestShareholder::create([
                        'financing_request_id' => $financing_request->id,
                        'name' => $shareholder
                    ]);
                }
            }

            if ($request->has('manager_name') && count($request->manager_name) > 0) {
                foreach ($request->manager_name as $key => $manager_name) {
                    FinancingRequestCompanyManagement::create([
                        'financing_request_id' => $financing_request->id,
                        'name' => $manager_name,
                        'position' => $request->manager_position[$key] ? $request->manager_position[$key] : NULL,
                        'duration' => $request->manager_position_duration[$key] ? $request->manager_position_duration[$key] : NULL,
                    ]);
                }
            }

            if ($request->has('debt_bank_name') && count($request->debt_bank_name) > 0) {
                foreach ($request->debt_bank_name as $key => $debt_bank_name) {
                    FinancingRequestBankDebt::create([
                        'financing_request_id' => $financing_request->id,
                        'bank_name' => $debt_bank_name,
                        'facility_limits' => array_key_exists($key, $request->debt_facility_limits) ? $request->debt_facility_limits[$key] : NULL,
                        'debt_reason' => array_key_exists($key, $request->debt_reason) ? $request->debt_reason[$key] : NULL,
                        'outstanding_amounts' => array_key_exists($key, $request->debt_outstanding_amounts) ? $request->debt_outstanding_amounts[$key] : NULL,
                    ]);
                }
            }

            if ($request->has('creditor_name') && count($request->creditor_name) > 0) {
                foreach ($request->creditor_name as $key => $creditor_name) {
                    FinancingRequestOperatingDebt::create([
                        'financing_request_id' => $financing_request->id,
                        'creditor_name' => $creditor_name,
                        'facility_limit' => array_key_exists($key, $request->credit_facility_limits) ? $request->credit_facility_limits[$key] : NULL,
                        'debt_reason' => array_key_exists($key, $request->credit_reason) ? $request->credit_reason[$key] : NULL,
                        'outstanding_amount' => array_key_exists($key, $request->credit_outstanding_amounts) ? $request->credit_outstanding_amounts[$key] : NULL,
                    ]);
                }
            }

            if ($request->has('anchor_transaction_history') || $request->has('anchor_terms_of_transaction')) {
                FinancingRequestAnchorHistory::create([
                    'financing_request_id' => $financing_request->id,
                    'transaction_description' => $request->has('anchor_transaction_history') ? $request->anchor_transaction_history : NULL,
                    'transaction_terms' => $request->has('anchor_terms_of_transaction') ? $request->anchor_terms_of_transaction : NULL,
                ]);
            }

            foreach ($financier->users as $user) {
                $user->notify(new FinancingRequested($invoice));
            }

            DB::commit();

            toastr()->success('', 'Financing Request Sent Successfully');

            return redirect()->route('orders.show', ['order' => $invoice->orders->first()]);
        } catch (\Exception $e) {
            info($e->getMessage());
            DB::rollback();
            toastr()->error('', 'An error occurred. Please check data and try again.');
            return back();
        }

        // foreach($financiers as $financier) {
        // }

        toastr()->success('', 'Financing Request sent successfully');
    }

    public function updateRequest(OrderRequest $order_request, $status)
    {
        if ($status == 'accepted') {
            OrderRequest::where('order_item_id', $order_request->order_item_id)->where('requesteable_type', $order_request->requesteable_type)->update(['status' => 'rejected']);
        }

        $order_request->update([
            'status' => $status,
        ]);

        toastr()->success('', 'Request updated successfully');

        return back();
    }

    public function confirmDelivery(Order $order)
    {
        $order->update([
            'status' => 'delivered'
        ]);

        toastr()->success('', 'Order updated successfully');

        return back();
    }
}
