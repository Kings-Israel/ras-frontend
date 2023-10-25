<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'categories' => Category::all()->take(12),
            'businesses' => Business::all()->take(8),
            'products' => Product::available()->with(['media' => function($query) {
                $query->where('type', 'image')->inRandomOrder();
            }])->get()->take(10),
        ]);
    }
}
