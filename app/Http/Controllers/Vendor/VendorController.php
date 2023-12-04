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
use App\Models\Warehouse;
use App\Notifications\FinancingRequested;
use App\Notifications\QuotationAdded;
use App\Notifications\UpdatedOrder;
use App\Rules\PhoneNumber;
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
        $vendor = auth()->user()->business;

        // Get Payments for the last 7 days
        $payments_in_last_seven_days = [];
        $days = [now()->subDays(6), now()->subDays(5), now()->subDays(4), now()->subDays(3), now()->subDays(2), now()];
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

        $formatted_days = [];
        foreach($days as $day) {
            array_push($formatted_days, $day->format('M d'));
        }

        return view('business.dashboard', [
            'days' => $formatted_days,
            'payments_in_last_seven_days' => $payments_in_last_seven_days
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
}
