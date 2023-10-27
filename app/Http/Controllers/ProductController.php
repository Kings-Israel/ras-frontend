<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use VisitLog;

class ProductController extends Controller
{
    public function viewProduct($slug)
    {
        VisitLog::save();

        $product = Product::findBySlug($slug);

        return view('product', [
            'product' => $product->load('category', 'media', 'business.user'),
            'vendor_products' => Product::where('business_id', $product->business->id)->get()->take(5),
            'similar_products' => Product::where('category_id', $product->category->id)->get()->take(5),
            'categories' => Category::all()->take(6),
        ]);
    }

    public function storefront($slug)
    {
        $business = Business::findBySlug($slug);

        if (auth()->id() != $business->user->id) {
            VisitLog::save();
        }

        return view('business.storefront.index', compact('business'));
    }

    public function storefrontProducts($slug)
    {
        $business = Business::findBySlug($slug);

        $categories = $business->products->map(fn ($product) => $product->category)->unique()->take(8);

        $products = $business->products->groupBy('category.name');

        if (auth()->id() != $business->user->id) {
            VisitLog::save();
        }

        return view('business.storefront.products', [
            'business' => $business->loadCount('products')->load('products'),
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function storefrontDocuments($slug)
    {
        $business = Business::findBySlug($slug);

        if (auth()->id() != $business->user->id) {
            VisitLog::save();
        }

        return view('business.storefront.compliance', [
            'business' => $business->load('documents'),
        ]);
    }
}
