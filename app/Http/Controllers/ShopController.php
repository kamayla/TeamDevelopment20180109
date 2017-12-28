<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;

class ShopController extends Controller
{
    public function top_view(){
        $products = Product::orderBy('created_at', 'asc')->get();
        return view('shop/shop_top', ['products' => $products]);
    }
}
