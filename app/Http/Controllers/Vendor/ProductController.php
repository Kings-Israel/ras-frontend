<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\HelperFunctions;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MeasurementUnit;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\Warehouse;
use App\Models\WarehouseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('business.products', [
            'categories' => Category::all(),
            // 'warehouses' => Warehouse::where('country_id', auth()->user()->business->country->id)->get(),
            'warehouses' => Warehouse::all(),
            'units' => MeasurementUnit::all(),
            'shapes' => collect(['Rectangle', 'Circle', 'Square', 'Rhombus', 'Sphere']),
            'colors' => collect(['Red', 'Green', 'Blue', 'Purple', 'Yellow', 'Maroon', 'Orange', 'Gray', 'Magenta', 'Teal', 'Gold', 'White', 'Black']),
            'usages' => collect(['Home Decor', 'Office Decor']),
            'regions' => collect(['Africa', 'USA', 'Europe', 'Middle East', 'Asia', 'Other']),
            'currencies' => collect(['USD', 'EUR', 'GBP', 'KSH', 'JPY']),
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
            'currency' => ['required_with:price', 'required_with:min_price', 'required_with:max_price'],
            'quantity_order_unit' => ['required_with:max_quantity_order', 'required_with:min_quantity_order'],
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
            'price' => $request->price,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'currency' => $request->has('currency') && $request->currency != NULL && $request->currency != '' && $request->currency ? $request->currency : 'USD',
            'max_order_quantity' => $request->has('max_order_quantity') && $request->max_order_quantity != NULL ? $request->max_order_quantity.' '.$request->order_quantity_unit : NULL,
            'min_order_quantity' => $request->has('min_order_quantity') && $request->min_order_quantity != NULL ? $request->min_order_quantity.' '.$request->order_quantity_unit : NULL,
            'color' => $request->color,
            'shape' => $request->shape,
            'usage' => $request->usage,
            'brand' => $request->brand,
            'material' => $request->material,
            'place_of_origin' => $request->place_of_origin,
            'description' => $request->description,
            'warehouse_id' => $request->warehouse,
            'model_number' => $request->model_number,
            'is_available' => $request->has('product_availability') ? true : false,
            'regional_featre' => $request->regional_feature,
            'capacity_in_warehouse' => $request->product_capacity,
            'certificate_of_origin' => $request->hasFile('certificate_of_origin') ? pathinfo($request->certificate_of_origin->store('certificate', 'product'), PATHINFO_BASENAME) : NULL,
        ]);

        $product->update([
            'slug' => $product->name.'_'.$product->id,
        ]);

        if ($request->warehouses != null && count(explode(',', $request->warehouses)) > 0) {
            foreach(explode(',', $request->warehouses) as $warehouse) {
                WarehouseProduct::create([
                    'warehouse_id' => $warehouse,
                    'product_id' => $product->id
                ]);
            };
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

    public function edit(Product $product)
    {
        return view('business.product.edit', [
            'product' => $product->load('warehouses'),
            'categories' => Category::all(),
            'units' => MeasurementUnit::all(),
            'warehouses' => Warehouse::all(),
            'shapes' => collect(['Rectangle', 'Circle', 'Square', 'Rhombus', 'Sphere']),
            'colors' => collect(['Red', 'Green', 'Blue', 'Purple', 'Yellow', 'Maroon', 'Orange', 'Gray', 'Magenta', 'Teal', 'Gold', 'White', 'Black']),
            'usages' => collect(['Home Decor', 'Office Decor']),
            'regions' => collect(['Africa', 'USA', 'Europe', 'Middle East', 'Asia', 'Other']),
            'currencies' => collect(['USD', 'EUR', 'GBP', 'KSH', 'JPY']),
        ]);
    }

    public function show(Product $product)
    {
        $product->load('orderItems.order', 'warehouses', 'category', 'media', 'discount');

        return view('business.product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required'],
            'category' => ['required'],
            'price' => ['required_without:min_price', 'required_without:max_price'],
            'min_price' => ['required_without:price'],
            'max_price' => ['required_without:price'],
            'currency' => ['required_with:price', 'required_with:min_price', 'required_with:max_price'],
            'quantity_order_unit' => ['required_with:max_quantity_order', 'required_with:min_quantity_order'],
            'description' => ['required'],
            'model_number' => ['required'],
            'images' => ['nullable', 'array'],
            'images.*' => ['mimes:png,jpg,jpeg', 'max:4096'],
            'video' => ['nullable', 'mimes:mp4', 'max:10000'],
            'capacity_in_warehouse' => ['nullable', 'integer'],
            'certificate_of_origin' => ['nullable', 'mimes:pdf'],
        ]);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'max_order_quantity' => $request->has('max_order_quantity') && $request->max_order_quantity != NULL ? $request->max_order_quantity.' '.$request->order_quantity_unit : NULL,
            'min_order_quantity' => $request->has('min_order_quantity') && $request->min_order_quantity != NULL ? $request->min_order_quantity.' '.$request->order_quantity_unit : NULL,
            'color' => $request->color,
            'shape' => $request->shape,
            'usage' => $request->usage,
            'brand' => $request->brand,
            'currency' => $request->has('currency') && $request->currency != NULL && $request->currency != '' && $request->currency ? $request->currency : 'USD',
            'material' => $request->material,
            'place_of_origin' => $request->place_of_origin,
            'description' => $request->description,
            'warehouse_id' => $request->warehouse,
            'model_number' => $request->model_number,
            'is_available' => $request->has('product_availability') ? true : false,
            'regional_featre' => $request->regional_feature,
            'capacity_in_warehouse' => $request->product_capacity,
        ]);

        if ($request->hasFile('certificate_of_origin')) {
            if ($product->certificate_of_origin) {
                $current_cert = explode('/', $product->certificate_of_origin);
                Storage::disk('product')->delete(end($current_cert));
            }

            $product->update([
                'certificate_of_origin' => $request->hasFile('certificate_of_origin') ? pathinfo($request->certificate_of_origin->store('certificate', 'product'), PATHINFO_BASENAME) : NULL,
            ]);
        }

        if ($request->warehouses != null && count(explode(',', $request->warehouses)) > 0) {
            WarehouseProduct::where('product_id', $product->id)->delete();

            foreach(explode(',', $request->warehouses) as $warehouse) {
                WarehouseProduct::create([
                    'warehouse_id' => $warehouse,
                    'product_id' => $product->id
                ]);
            };
        }

        if ($request->has('images') && count($request->images) > 0) {
            // Delete current images files
            $current_media = $product->media->where('type', 'image');
            collect($current_media)->each(function ($image) {
                HelperFunctions::deleteFile('vendor', 'product', $image);
                $image->delete();
            });

            foreach ($request->images as $image) {
                ProductMedia::create([
                    'product_id' => $product->id,
                    'file' => pathinfo($image->store('product', 'vendor'), PATHINFO_BASENAME),
                    'type' => 'image',
                ]);
            }
        }

        if ($request->hasFile('video')) {
            // Delete current images files
            $current_media = $product->media->where('type', 'video');
            if ($current_media->count() > 0) {
                $current_media->each(function ($video) {
                    HelperFunctions::deleteFile('vendor', 'product', $video);
                    $video->delete();
                });
            }

            ProductMedia::create([
                'product_id' => $product->id,
                'file' => pathinfo($request->video->store('product', 'vendor'), PATHINFO_BASENAME),
                'type' => 'video',
            ]);
        }

        activity()->causedBy(auth()->user())->performedOn($product)->log('updated the product');

        toastr()->success('', 'Product updated successfully');

        return redirect()->route('vendor.products');
    }

    public function addDiscount(Request $request, Product $product)
    {
        $request->validate([
            'value' => ['required']
        ]);
        
        $product_discount = $product->discount;

        if (!$product_discount) {
            $product->discount()->create([
                'value' => $request->value,
            ]);

            toastr()->success('', 'Discount successfully created.');

            return back();
        }

        $product_discount->update([
            'value' => $request->value,
        ]);

        toastr()->success('', 'Discount successfully updated.');

        return back();
    }
}
