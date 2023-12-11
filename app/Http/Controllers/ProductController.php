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
            'vendor_products' => Product::available()->where('business_id', $product->business->id)->where('id', '!=', $product->id)->get()->take(5),
            'similar_products' => Product::available()->where('category_id', $product->category->id)->where('id', '!=', $product->id)->get()->take(5),
            'categories' => Category::all()->take(6),
        ]);
    }

    public function storefront($slug)
    {
        $business = Business::findBySlug($slug);

        $product_categories = $business
                                ->products
                                ->map(fn ($product) => $product->category)
                                ->unique()
                                ->take(8);

        $best_sellers = $business->products->where('is_available', true)->take(4);

        $new_products = Product::where('business_id', $business->id)->available()->whereBetween('created_at', [now()->subMonths(2), now()])->get()->take(6);

        if (auth()->id() != $business->user->id) {
            VisitLog::save();
        }

        return view('business.storefront.index', compact('business', 'product_categories', 'best_sellers', 'new_products'));
    }

    public function storefrontProducts($slug)
    {
        $business = Business::findBySlug($slug);

        $categories = $business->products->where('is_available', true)->map(fn ($product) => $product->category)->unique()->take(8);

        $products = Product::with('category', 'media')
                            ->available()
                            ->where('business_id', $business->id)
                            ->get()
                            ->take(4)
                            ->groupBy('category.name');

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
        $categories = $business->products->where('is_available', true)->map(fn ($product) => $product->category)->unique()->take(8);

        if (auth()->id() != $business->user->id) {
            VisitLog::save();
        }

        return view('business.storefront.compliance', [
            'business' => $business->load('documents'),
            'categories' => $categories,
        ]);
    }
}
