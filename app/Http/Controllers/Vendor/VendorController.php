<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    public function dashboard()
    {
        return view('vendor.dashboard');
    }

    public function products()
    {
        return view('vendor.products');
    }

    public function orders()
    {
        return view('vendor.orders');
    }
}
