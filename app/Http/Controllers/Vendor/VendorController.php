<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessDocument;
use App\Models\Category;
use App\Models\Country;
use App\Models\Document;
use App\Models\MeasurementUnit;
use App\Models\RequiredDocumentPerCountry;
use App\Models\Warehouse;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

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
        ]);

        $business = Business::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'country_id' => $request->country,
            'primary_cover_image' => $request->hasFile('primary_cover_image') ? pathinfo($request->primary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME) : NULL,
            'secondary_cover_image' => $request->hasFile('secondary_cover_image') ? pathinfo($request->secondary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME) : NULL,
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

        return redirect()->route('vendor.dashboard');
    }

    public function update(Request $request)
    {
        $request->validate([
            'business_name' => ['required'],
            'secondary_cover_image' => ['nullable', 'mimes:png,jpg,jpeg', 'max:4096'],
            'contact_email' => ['nullable', 'email'],
            'contact_phone_number' => ['nullable', new PhoneNumber]
        ]);

        auth()->user()->business()->update([
            'name' => $request->business_name,
            'about' => $request->has('about') && $request->about != null ? $request->about : auth()->user()->business->about,
            'tag_line' => $request->has('tag_line') && $request->about != null ? $request->tag_line : auth()->user()->business->tag_line,
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
        return view('business.dashboard');
    }

    public function orders()
    {
        return view('business.orders');
    }
}
