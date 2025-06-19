<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ShopController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->paginate(9);
        return view('frontend.shop', compact('products'));
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('frontend.product-details', compact('product'));
    }
}
