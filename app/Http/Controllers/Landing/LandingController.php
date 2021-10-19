<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('landing.yield.index', [
            'products' => $products,
        ]);
    }

    public function detailproduct($slug)
    {
        $title = "Detail Product";
        $products = Product::where('slug', $slug)->first();
        return view('landing.yield.detail', [
        'products' => $products,
        'title' => $title,
        
    ]);
    }
}
