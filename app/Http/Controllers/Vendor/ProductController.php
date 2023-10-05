<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MeasurementUnit;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('business.products', [
            'categories' => Category::all(),
            // 'warehouses' => Warehouse::where('country_id', auth()->user()->business->country->id)->get(),
            'warehouses' => Warehouse::all(),
            'units' => MeasurementUnit::all(),
            'shapes' => ['Rectangle', 'Circle', 'Square', 'Rhombus', 'Sphere'],
            'colors' => ['Red', 'Green', 'Blue', 'Purple', 'Yellow', 'Maroon', 'Orange', 'Gray', 'Magenta', 'Teal', 'Gold', 'White', 'Black'],
            'usages' => ['Home Decor', 'Office Decor'],
            'regions' => ['Africa', 'USA', 'Europe', 'Middle East', 'Asia', 'Other'],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'category' => ['required'],
            'price' => ['required_without:min_price', 'required_without:max_price'],
            'min_price' => ['required_without:price'],
            'max_price' => ['required_without:price'],
            'min_quantity_order_unit' => ['required_with:min_quantity_order'],
            'max_quantity_order_unit' => ['required_with:max_quantity_order'],
            'description' => ['required'],
            'model_number' => ['required'],
            'images' => ['required', 'array'],
            'images.*' => ['mimes:png,jpg,jpeg', 'max:4096'],
            'video' => ['nullable', 'mimes:mp4', 'max:10000'],
            'capacity_in_warehouse' => ['nullable', 'integer'],
        ]);

        $product = Product::create([
            'business_id' => auth()->user()->business->id,
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->category,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'max_order_quantity' => $request->has('max_order_quantity') && $request->max_order_quantity != NULL ? $request->max_order_quantity.' '.$request->max_quantity_order_unit : NULL,
            'min_order_quantity' => $request->has('min_order_quantity') && $request->min_order_quantity != NULL ? $request->min_quantity_order.' '.$request->min_quantity_order_unit : NULL,
            'color' => $request->color,
            'shape' => $request->shape,
            // 'usage' => $this->state()->forStep('product-details')['usage'],
            'brand' => $request->brand,
            'material' => $request->material,
            'place_of_origin' => $request->place_of_origin,
            'description' => $request->description,
            'warehouse_id' => $request->warehouse,
            'model_number' => $request->model_number,
            'is_available' => $request->has('product_availability') ? true : false,
            'regional_featre' => $request->regional_feature,
            'capacity_in_warehouse' => $request->product_capacity,
        ]);

        if ($product->warehouse) {
            $product->warehouse()->update([
                'occupied_capacity' => $request->product_capacity,
            ]);
        }

        foreach ($request->images as $image) {
            ProductMedia::create([
                'product_id' => $product->id,
                'file' => pathinfo($image->store('product', 'vendor'), PATHINFO_BASENAME),
                'type' => 'image',
            ]);
        }

        if ($request->hasFile('video')) {
            ProductMedia::create([
                'product_id' => $product->id,
                'file' => pathinfo($request->video->store('product', 'vendor'), PATHINFO_BASENAME),
                'type' => 'video',
            ]);
        }

        activity()->causedBy(auth()->user())->performedOn($product)->log('added a new product');

        toastr()->success('', 'Product added successfully');

        return redirect()->route('vendor.products');
    }
}
