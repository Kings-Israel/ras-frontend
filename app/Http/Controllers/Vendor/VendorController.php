<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessDocument;
use App\Models\Category;
use App\Models\Country;
use App\Models\Document;
use App\Models\RequiredDocumentPerCountry;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    public function showCreateProfileForm()
    {
        $categories = Category::all();

        $countries = Country::with('cities', 'requiredDocuments')->orderBy('name', 'ASC')->get();

        $documents = [];

        $required_documents = RequiredDocumentPerCountry::where('country_id', NULL)->get();

        foreach ($required_documents as $key => $value) {
            array_push($documents, $value->document);
        }

        // return view('auth.business', compact('categories', 'countries'));
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
                    'expires_on' => array_key_exists($key, $request->document_expiry_date) ? $request->document_expiry_date[$key] : NULL,
                    // 'expiry_date' => $request->document_expiry_date[$key] ? $request->document_expiry_date[$key] : NULL,
                ]);
            }
        }

        return redirect()->route('vendor.dashboard');
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

    public function products()
    {
        return view('business.products');
    }

    public function orders()
    {
        return view('business.orders');
    }

    public function storefront($slug)
    {
        $business = Business::findBySlug($slug);

        return view('business.storefront.index', compact('business'));
    }

    public function storefrontProducts($slug)
    {
        $business = Business::findBySlug($slug);

        return view('business.storefront.products', [
            'business' => $business->load('products'),
        ]);
    }

    public function storefrontDocuments($slug)
    {
        $business = Business::findBySlug($slug);

        return view('business.storefront.compliance', [
            'business' => $business->load('documents'),
        ]);
    }
}
