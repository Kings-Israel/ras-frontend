<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\BusinessDocument;
use App\Models\Category;
use App\Models\Country;
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

        $countries = Country::with('cities')->get();

        return view('auth.business', compact('categories', 'countries'));
    }

    public function create(Request $request)
    {
        $request->validate(['name' => 'required', 'string']);

        $business = Business::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'primary_cover_image' => $request->hasFile('primary_cover_image') ? pathinfo($request->primary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME) : NULL,
            'secondary_cover_image' => $request->hasFile('secondary_cover_image') ? pathinfo($request->secondary_cover_image->store('cover_image', 'vendor'), PATHINFO_BASENAME) : NULL,
        ]);

        if ($request->has('documents') && collect($request->documents)->count() > 0) {
            foreach ($request->documents as $key => $document) {
                BusinessDocument::create([
                    'business_id' => $business->id,
                    'name' => $request->document_name[$key],
                    'file' => pathinfo($document->store('document', 'vendor'), PATHINFO_BASENAME),
                    'expiry_date' => $request->document_expiry_date[$key] ? $request->document_expiry_date[$key] : NULL,
                ]);
            }
        }

        return redirect()->route('auth.product.add');
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
}
