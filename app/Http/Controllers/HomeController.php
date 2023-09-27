<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'categories' => Category::all()->take(12),
        ]);
    }
}
