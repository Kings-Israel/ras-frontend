<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessDocument;
use App\Models\Category;
use App\Models\Country;
use App\Models\CountryOfOperation;
use App\Models\Document;
use App\Models\FinancingInstitution;
use App\Models\MeasurementUnit;
use App\Models\Order;
use App\Models\OrderConversation;
use App\Models\OrderItem;
use App\Models\RequiredDocumentPerCountry;
use App\Models\StorageRequest;
use App\Models\Wallet;
use App\Models\Warehouse;
use App\Notifications\FinancingRequested;
use App\Notifications\QuotationAdded;
use App\Notifications\UpdatedOrder;
use App\Rules\PhoneNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Chat;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'phone_verified']);
    }

    public function showCreateProfileForm()
    {
        $categories = Category::all();

        $countries = Country::with('cities', 'requiredDocuments')->orderBy('name', 'ASC')->get();

        $documents = [];

        $required_documents = RequiredDocumentPerCountry::where('country_id', NULL)->get();

        foreach ($required_documents as $key => $value) {
            array_push($documents, $value->document);
        }

        return view('business.profile.create', compact('categories', 'countries', 'documents'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string',
            'country' => 'required',
            'primary_cover_image' => ['required', 'mimes:png,jpg,jpeg', 'max:5192'],
            'business_profile' => ['nullable', 'mimes:pdf', 'max:5192'],
        ]);

        $business = Business::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'country_id' => $request->country,
            'city_id' => $request->has('city') ? $request->city : NULL,
            'primary_cover_image' => $request->hasFile('primary_cover_image') ? pathinfo($request->primary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME) : NULL,
            'secondary_cover_image' => $request->hasFile('secondary_cover_image') ? pathinfo($request->secondary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME) : NULL,
            'business_profile' => $request->hasFile('business_profile') ? pathinfo($request->business_profile->store('profile', 'vendor'), PATHINFO_BASENAME) : NULL,
        ]);

        if ($request->has('document_files') && collect($request->document_files)->count() > 0) {
            foreach ($request->document_files as $key => $document) {
                BusinessDocument::create([
                    'business_id' => $business->id,
                    'name' => $key,
                    'file' => pathinfo($document->store('document', 'vendor'), PATHINFO_BASENAME),
                    'expires_on' => $request->document_expiry_date && array_key_exists($key, $request->document_expiry_date) ? $request->document_expiry_date[$key] : NULL,
                    // 'expiry_date' => $request->document_expiry_date[$key] ? $request->document_expiry_date[$key] : NULL,
                ]);
            }
        }

        if ($request->has('countries_of_operation')) {
            foreach ($request->countries_of_operation as $country) {
                CountryOfOperation::create([
                    'operateable_id' => $business->id,
                    'operateable_type' => Business::class,
                    'country_id' => $country
                ]);
            }
        }

        return redirect()->route('vendor.dashboard');
    }

    public function update(Request $request)
    {
        $request->validate([
            'business_name' => ['required'],
            'secondary_cover_image' => ['nullable', 'mimes:png,jpg,jpeg', 'max:4096'],
            'contact_email' => ['nullable', 'email'],
            'contact_phone_number' => ['nullable', new PhoneNumber],
            'about' => ['nullable', 'max:200'],
            'vision' => ['nullable', 'max:100'],
            'mission' => ['nullable', 'max:100'],
            'tag_line' => ['nullable', 'max:100'],
        ]);

        auth()->user()->business()->update([
            'name' => $request->business_name,
            'about' => $request->has('about') && $request->about != null ? $request->about : auth()->user()->business->about,
            'tag_line' => $request->has('tag_line') && $request->tag_line != null ? $request->tag_line : auth()->user()->business->tag_line,
            'mission' => $request->has('mission') && $request->mission != null ? $request->mission : auth()->user()->business->mission,
            'vision' => $request->has('vision') && $request->vision != null ? $request->vision : auth()->user()->business->vision,
            'contact_email' => $request->has('contact_email') && $request->contact_email != null ? $request->contact_email : auth()->user()->business->contact_email,
            'contact_phone_number' => $request->has('contact_phone_number') && $request->contact_phone_number != null ? $request->contact_phone_number : auth()->user()->business->contact_phone_number,
            'global_currency' => $request->has('currency') && $request->currency != NULL ? $request->currency : NULL,
        ]);

        if ($request->hasFile('secondary_cover_image')) {
            auth()->user()->business()->update([
                'secondary_cover_image' => pathinfo($request->secondary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME)
            ]);
        }

        if ($request->has('countries_of_operation')) {
            auth()->user()->business->countriesOfOperation()->delete();
            foreach ($request->countries_of_operation as $country) {
                CountryOfOperation::create([
                    'operateable_id' => auth()->user()->business->id,
                    'operateable_type' => Business::class,
                    'country_id' => $country
                ]);
            }
        }

        toastr()->success('', 'Business details updated successfully');

        return back();
    }

    public function updatePrimaryCoverImage(Request $request)
    {
        $request->validate([
            'primary_cover_image' => ['required', 'mimes:png,jpg,jpeg', 'max:4096'],
        ]);

        auth()->user()->business()->update([
            'primary_cover_image' => pathinfo($request->primary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME)
        ]);

        toastr()->success('', 'Business details updated successfully');

        return back();
    }

    public function addProduct()
    {
        $categories = Category::all();

        $countries = Country::with('cities')->get();

        return view('auth.add-product', ['categories' => $categories, 'countries' => $countries]);
    }

    public function dashboard()
    {
        $colors = [
            '#ffe700', '#2D4356',
            '#00d4bd', '#FCAEAE',
            '#826bf8', '#4C4B16',
            '#2b9bf4', '#FF90BB',
            '#FFA1A1', '#FF2171',
            '#3F2E3E', '#001C30',
            '#A78295', '#176B87',
            '#8CC0DE', '#3AA6B9',
            '#FFD9C0', '#0A6EBD',
            '#1D5B79', '#F86F03',
            '#468B97', '#525FE1',
            '#EF6262', '#A0C49D',
            '#78C1F3', '#213363',
            '#9BE8D8', '#17594A',
            '#1A5D1A', '#D3D04F',
            '#F1C93B', '#22A699',
            '#4E4FEB', '#E966A0',
            '#068FFF', '#6554AF',
            '#AAC8A7', '#9BCDD2',
            '#862B0D', '#FF8551',
            '#4A55A2', '#1F6E8C',
            '#7895CB', '#84A7A1',
            '#6527BE', '#F2BE22',
            '#45CFDD', '#40128B',
        ];

        $days = [now()->subDays(6), now()->subDays(5), now()->subDays(4), now()->subDays(3), now()->subDays(2), now()->subDay(), now()];
        $hours = [
                // Carbon::now(-24),
                Carbon::now(-23),
                Carbon::now(-22),
                Carbon::now(-21),
                Carbon::now(-20),
                Carbon::now(-19),
                Carbon::now(-18),
                Carbon::now(-17),
                Carbon::now(-16),
                Carbon::now(-15),
                Carbon::now(-14),
                Carbon::now(-13),
                Carbon::now(-12),
                Carbon::now(-11),
                Carbon::now(-10),
                now()->subHours(9),
                now()->subHours(8),
                now()->subHours(7),
                now()->subHours(6),
                now()->subHours(5),
                now()->subHours(4),
                now()->subHours(3),
                now()->subHours(2),
                now()->subHour()
            ];

        $yesterday_hours = [
                // Carbon::yesterday()->setHour(24),
                Carbon::yesterday()->setHour(23),
                Carbon::yesterday()->setHour(22),
                Carbon::yesterday()->setHour(21),
                Carbon::yesterday()->setHour(20),
                Carbon::yesterday()->setHour(19),
                Carbon::yesterday()->setHour(18),
                Carbon::yesterday()->setHour(17),
                Carbon::yesterday()->setHour(16),
                Carbon::yesterday()->setHour(15),
                Carbon::yesterday()->setHour(14),
                Carbon::yesterday()->setHour(13),
                Carbon::yesterday()->setHour(12),
                Carbon::yesterday()->setHour(11),
                Carbon::yesterday()->setHour(10),
                Carbon::yesterday()->setHour(9),
                Carbon::yesterday()->setHour(8),
                Carbon::yesterday()->setHour(7),
                Carbon::yesterday()->setHour(6),
                Carbon::yesterday()->setHour(5),
                Carbon::yesterday()->setHour(4),
                Carbon::yesterday()->setHour(3),
                Carbon::yesterday()->setHour(2),
                Carbon::yesterday()->setHour(1)
            ];
        // Past 3 Months
        $past_three_months = [];
        for ($i = 2; $i >= 0; $i--) {
            $month = Carbon::today()->startOfMonth()->subMonth($i);
            array_push($past_three_months, $month);
        }

        // Past 6 Months
        $past_six_months = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::today()->startOfMonth()->subMonth($i);
            array_push($past_six_months, $month);
        }

        $formatted_days = [];
        foreach($days as $day) {
            array_push($formatted_days, $day->format('M d'));
        }

        $formatted_past_three_months = [];
        foreach($past_three_months as $month) {
            array_push($formatted_past_three_months, $month->format('M'));
        }

        $formatted_past_six_months = [];
        foreach($past_six_months as $month) {
            array_push($formatted_past_six_months, $month->format('M'));
        }

        $formatted_hours = [];
        foreach($hours as $hour) {
            array_push($formatted_hours, $hour->format('h a'));
        }

        $formatted_yesterday_hours = [];
        foreach($yesterday_hours as $hour) {
            array_push($formatted_yesterday_hours, $hour->format('d h a'));
        }

        $vendor = auth()->user()->business;

        // Get Payments for the last 7 days
        $payments_in_last_seven_days = [];
        // Payments Today
        $payments_today = [];
        // Payments Yesterday
        $payments_yesterday = [];
        // Get Payments for the last 3 months
        $payments_in_last_three_months = [];
        // Get Payments for the last 6 months
        $payments_in_last_six_months = [];

        foreach ($days as $day) {
            $orders = Order::with('orderItems', 'invoice')
                                ->where('business_id', $vendor->id)
                                ->whereHas('invoice', function ($query) use ($day) {
                                    $query->where('payment_status', 'paid')->whereDate('updated_at', $day);
                                })
                                ->get();

            $amount = 0;
            foreach ($orders as $order) {
                $amount += $order->invoice->total_amount;
            }

            array_push($payments_in_last_seven_days, $amount);
        }

        foreach ($past_three_months as $month) {
            $three_months_orders = Order::with('orderItems', 'invoice')
                                    ->where('business_id', $vendor->id)
                                    ->whereHas('invoice', function ($query) use ($month) {
                                        $query->where('payment_status', 'paid')->whereBetween('updated_at', [Carbon::parse($month)->startOfMonth(), Carbon::parse($month)->endOfMonth()]);
                                    })
                                    ->get();

            $three_months_orders_amount = 0;
            foreach ($three_months_orders as $order) {
                $three_months_orders_amount += $order->invoice->total_amount;
            }

            array_push($payments_in_last_three_months, $three_months_orders_amount);
        }

        foreach ($past_six_months as $month) {
            $six_months_orders = Order::with('orderItems', 'invoice')
                                    ->where('business_id', $vendor->id)
                                    ->whereHas('invoice', function ($query) use ($month) {
                                        $query->where('payment_status', 'paid')->whereBetween('updated_at', [Carbon::parse($month)->startOfMonth(), Carbon::parse($month)->endOfMonth()]);
                                    })
                                    ->get();

            $six_months_orders_amount = 0;
            foreach ($six_months_orders as $order) {
                $six_months_orders_amount += $order->invoice->total_amount;
            }

            array_push($payments_in_last_six_months, $six_months_orders_amount);
        }

        foreach ($hours as $hour) {
            $todays_orders = Order::with('orderItems', 'invoice')
                                    ->where('business_id', $vendor->id)
                                    ->whereHas('invoice', function ($query) use ($hour) {
                                        $query->where('payment_status', 'paid')->whereBetween('updated_at', [Carbon::parse($hour)->startOfHour(), Carbon::parse($hour)->endOfHour()]);
                                    })
                                    ->get();

            $todays_amount = 0;
            foreach ($todays_orders as $order) {
                $todays_amount += $order->invoice->total_amount;
            }

            array_push($payments_today, $todays_amount);
        }

        foreach ($yesterday_hours as $hour) {
            $yesterdays_orders = Order::with('orderItems', 'invoice')
                                    ->where('business_id', $vendor->id)
                                    ->whereHas('invoice', function ($query) use ($hour) {
                                        $query->where('payment_status', 'paid')
                                                ->whereDate('updated_at', Carbon::yesterday())
                                                ->whereBetween('updated_at', [Carbon::parse($hour)->startOfHour(), Carbon::parse($hour)->endOfHour()]);
                                    })
                                    ->get();

            $yesterdays_amount = 0;
            foreach ($yesterdays_orders as $order) {
                $yesterdays_amount += $order->invoice->total_amount;
            }

            array_push($payments_yesterday, $yesterdays_amount);
        }

        // dd($formatted_past_six_months);

        $wallet_balance = 0;
        // Get wallet balance
        $wallet = Wallet::where('walleteable_id', auth()->id())->where('walleteable_type', User::class)->first();
        if ($wallet) {
            $wallet_balance = $wallet->balance;
        }

        $top_categories = [];
        $top_categories_names = [];
        $top_categories_percentages = [];
        $top_categories_colors = [];

        $orders = Order::with('orderItems', 'invoice')
                                ->where('business_id', $vendor->id)
                                ->whereHas('invoice', function ($query) {
                                    $query->where('payment_status', 'paid');
                                })
                                ->get();

        if ($orders->count() > 0) {
            foreach ($orders as $order) {
                $category = $order->orderItems->first()->product->category->name;
                if (array_key_exists($category, $top_categories)) {
                    $top_categories[Str::title($category)] += 1;
                } else {
                    $top_categories[Str::title($category)] = 1;
                }
            }

            $top_categories = collect($top_categories)->sortDesc()->take(5)->toArray();
            foreach ($top_categories as $category => $count) {
                $percentage = round(($count / $orders->count()) * 100);
                $top_categories[$category] = $percentage;
                array_push($top_categories_names, $category);
                array_push($top_categories_percentages, $percentage);
                array_push($top_categories_colors, $colors[rand(0, count($colors) - 1)]);
            }
        }

        return view('business.dashboard', [
            'days' => $formatted_days,
            'hours' => $formatted_hours,
            'payments_today' => $payments_today,
            'payments_in_last_seven_days' => $payments_in_last_seven_days,
            'wallet_balance' => $wallet_balance,
            'top_categories' => $top_categories,
            'top_categories_names' => $top_categories_names,
            'top_categories_percentages' => $top_categories_percentages,
            'top_categories_colors' => $top_categories_colors,
            'formatted_past_six_months' => $formatted_past_six_months,
            'payments_in_last_six_months' => $payments_in_last_six_months,
            'formatted_past_three_months' => $formatted_past_three_months,
            'payments_in_last_three_months' => $payments_in_last_three_months,
            'formatted_yesterday_hours' => $formatted_yesterday_hours,
            'payments_yesterday' => $payments_yesterday,
        ]);
    }

    public function orders()
    {
        return view('business.orders');
    }

    public function quotationRequests()
    {
        return view('business.quotation-requests');
    }

    public function order(Order $order)
    {
        $order->load('orderItems.product', 'orderItems.warehouseOrder', 'user', 'orderItems.quotationResponses');

        $total_amount = 0;

        foreach($order->orderItems as $order_item) {
            $quantity = explode(' ', $order_item->quantity)[0];
            $total_amount += $order_item->amount * $quantity;
        }

        $conversation = Chat::conversations()->between(auth()->user(), $order->user);

        if (!$conversation) {
            $participants = [auth()->user(), $order->user];
            $conversation = Chat::createConversation($participants);
            $conversation->update([
                'direct_message' => true,
            ]);
        }

        $order_conversation = OrderConversation::firstOrCreate([
            'order_id' => $order->id,
            'conversation_id' => $conversation->id,
        ]);

        return view('business.order', compact('order', 'total_amount', 'order_conversation'));
    }

    public function orderUpdate(Order $order, $status)
    {
        $order->update(['status' => $status]);

        // Send Notification to user of updated order status
        $order->user->notify(new UpdatedOrder($order));

        if($status === 'accepted') {
            // Check if order financing was requested
            if ($order->invoice->financingRequest) {
                // Send notification to financier to view order
                $financing_institutions = FinancingInstitution::all();
                foreach($financing_institutions as $financing_instruction) {
                    $financing_instruction->notify(new FinancingRequested($order->invoice));
                }
                // FinancingInstitution::find(1)->notify(new FinancingRequested($order->invoice));
            }
        }

        toastr()->success('', 'Order updated successfully');

        return back();
    }

    public function warehouses()
    {
        $warehouses = Warehouse::with(['country', 'city', 'products' => function ($query) {
                                    $products_ids = auth()->user()->business->products->pluck('id');
                                    $query->whereIn('products.id', $products_ids);
                                }])
                                ->get();

        $units = MeasurementUnit::all();

        return view('business.warehouses', compact('warehouses', 'units'));
    }

    public function requestWarehouseStorage(Request $request, Warehouse $warehouse)
    {
        StorageRequest::create([
            'request_code' => explode('-', Str::uuid())[0],
            'customer_id' => auth()->id(),
            'warehouse_id' => $warehouse->id,
            'quantity' => $request->quantity.' '.$request->storage_quantity_unit,
            'requested_on' => now()
        ]);

        toastr()->success('', 'Request sent successfully');

        return back();
    }

    public function quoteUpdate(Request $request)
    {
        $request->validate([
            'items_ids' => ['required', 'array'],
            'items_ids.*' => ['integer'],
            'items_quantities' => ['required', 'array'],
            'items_quantities.*' => ['integer'],
            'items_prices' => ['required', 'array'],
            'items_prices.*' => ['integer'],
        ]);

        foreach($request->items_ids as $item) {
            $item_price = collect($request->items_prices)->filter(function ($value, $key) use ($item) { return $key == $item; });
            $item_quantity = collect($request->items_quantities)->filter(function ($value, $key) use ($item) { return $key == $item; });

            auth()->user()->quotationResponses()->create([
                'order_item_id' => $item,
                'quantity' => collect($item_quantity)->first(),
                'amount' => collect($item_price)->first(),
                'delivery_date' => $request->delivery_date,
            ]);

            $order_item = OrderItem::find($item);

            $order_item->order->user->notify(new QuotationAdded($order_item->load('order.user', 'order.invoice')));
        }

        toastr()->success('Quotation sent successfully');

        return back();
    }

    public function acceptQuotes(Order $order)
    {
        foreach ($order->orderItems as $item) {
            $item->update([
                'status' => 'accepted',
            ]);
        }

        $order->update([
            'status' => 'accepted',
        ]);

        $order->user->notify(new UpdatedOrder($order, 'pending'));

        toastr()->success('', 'Order updated successfully');

        return back();
    }

    public function customers()
    {
        return view('business.customers');
    }

    public function suppliers()
    {
        return view('business.suppliers');
    }

    public function payments()
    {
        $wallet_balance = 0;
        // Get wallet balance
        $wallet = Wallet::where('walleteable_id', auth()->id())->where('walleteable_type', User::class)->first();
        if ($wallet) {
            $wallet_balance = $wallet->balance;
        }

        return view('business.payments', compact('wallet_balance'));
    }
}
