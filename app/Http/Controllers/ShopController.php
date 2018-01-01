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
        $flag=true;
        if(Session::get('cart')){
            $cart = Session::get('cart');
        }else{
            $cart[] = $product->id;
            $quantity[] = (int)$request->quantity;
            Session::put('cart',$cart);
            Session::put('quantity',$quantity);
            $flag=false;
        }

        if(Session::get('quantity')){
            $quantity = Session::get('quantity');
        }
        if($flag==true){
            $key = array_search($product->id, $cart);
            if($key!=false||$key===0){
                $quantity[$key] += (int)$request->quantity;
                Session::put('quantity',$quantity);
            }else{
                $cart[] = $product->id;
                $quantity[] = (int)$request->quantity;
                Session::put('cart',$cart);
                Session::put('quantity',$quantity);
            }
        }
        
        
        $max = count($cart);
        $totalQuantity = 0;
        for($i=0;$i<$max;$i++){
            $totalQuantity += $quantity[$i];
        }
        Session::put('totalQuantity',$totalQuantity);
        

        return redirect('shop_item_page/'.$product->id);

    }

    public function shop_cart_look(){
        $cart = Session::get('cart');
        $quantity = Session::get('quantity');
        if(isset($cart)){
            foreach($cart as $key => $val){
                $product[] = Product::find($val); 
            }
            return view('shop/shop_cart_look',[
                'cart' => $cart,
                'quantity' => $quantity, 
                'product'=> $product,
            ]);
        }

        return view('shop/shop_cart_look',[
            'cart' => $cart,
            'quantity' => $quantity
        ]);
    }

    public function shop_cart_delete(Product $product){
        $cart = Session::get('cart');
        $quantity = Session::get('quantity');
        $key = array_search($product->id, $cart);
        array_splice($cart,$key,1);
        array_splice($quantity,$key,1);

        Session::put('cart',$cart);
        Session::put('quantity',$quantity);



        $max = count($cart);
        $totalQuantity = 0;
        for($i=0;$i<$max;$i++){
            $totalQuantity += $quantity[$i];
        }
        Session::put('totalQuantity',$totalQuantity);

        if(count($cart)===0){
            Session::forget('cart');
            Session::forget('quantity');

        }

        return redirect('/shop_cart_look');
        
    }

    public function delete(){
        Session::flush();
        return redirect('/booquet');
    }
}
