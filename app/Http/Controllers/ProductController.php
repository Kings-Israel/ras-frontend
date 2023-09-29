<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewProduct($slug)
    {
        $product = Product::findBySlug($slug);

        return view('product', [
            'product' => $product->load('category', 'media', 'business.user'),
            'vendor_products' => Product::where('business_id', $product->business->id)->get()->take(5),
            'similar_products' => Product::where('category_id', $product->category->id)->get()->take(5),
            'categories' => Category::all()->take(6),
        ]);
    }
}
