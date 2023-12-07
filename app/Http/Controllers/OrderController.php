<?php

namespace App\Http\Controllers;

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
        $order->load('orderItems.product.media', 'orderItems.product.business', 'orderItems.orderRequests', 'orderItems.quotationResponses', 'invoice');

        $order_total = 0;
        $order_requests = null;
        foreach ($order->orderItems as $order_item) {
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
        }

        // if ($request->has('request_financing')) {
        //     $invoice->financingRequest()->create();
        // }

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
}
