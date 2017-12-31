<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use Session;

class ShopController extends Controller
{
    public function top_view(){
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('shop/shop_top', ['products' => $products]);
    }

    // ショップ個別ページの表示
    public function shop_item_page_view(Product $product){
        $otherworks = Product::where('pro_author',$product->pro_author)->get()->take(4);
        $other_works_of_this_genres = Product::where('pro_genre',$product->pro_genre)->get()->take(6);

        return view('shop/shop_item_page', [
                'product' => $product,
                'otherworks' => $otherworks,
                'other_works_of_this_genres' => $other_works_of_this_genres
            ]);
    }

    public function shop_result_page_view(Request $request){
        $products = Product::where('pro_name','like',"%{$request->question}%")
        ->orWhere('pro_name_en','like',"%{$request->question}%")
        ->orWhere('pro_genre','like',"%{$request->question}%")
        ->orWhere('pro_author','like',"%{$request->question}%")
        ->orWhere('pro_author_en','like',"%{$request->question}%")
        ->orWhere('pro_original_author','like',"%{$request->question}%")
        ->orWhere('pro_original_author_en','like',"%{$request->question}%")
        ->orWhere('pro_publisher','like',"%{$request->question}%")
        ->orWhere('pro_label','like',"%{$request->question}%")
        ->orWhere('pro_description','like',"%{$request->question}%")
        ->orWhere('pro_isbn','like',"%{$request->question}%")
        ->get();
        return view('shop/shop_result_page',['products' => $products, 'question' => $request->question]);

    }

    public function shop_cart_in(Product $product,Request $request){
        if(Session::get('cart')){
            $cart = Session::get('cart');
        }
        if(Session::get('quantity')){
            $quantity = Session::get('quantity');
        }
        $cart[] = $product->id;
        $quantity[] = (int)$request->quantity;
        Session::put('cart',$cart);
        Session::put('quantity',$quantity);

        return redirect('shop_item_page/'.$product->id);

    }

    public function shop_cart_look(){
        $cart = Session::get('cart');
        $quantity = Session::get('quantity');
        foreach($cart as $key => $val){
            $product[] = Product::find($val);
            
        }

        return view('shop/shop_cart_look',[
                'cart' => $cart,
                'quantity' => $quantity, 
                'product'=> $product
            ]);
    }
}
