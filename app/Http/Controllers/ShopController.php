<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Datsalesproduct;
use App\Datsale;
<<<<<<< HEAD
use App\Product_review;
=======
use App\Customer;
>>>>>>> f20e8ccb2b566d50f45e3a5d5f44cb158d167fa2
use Validator;
use Session;
use DB;
use Auth;

class ShopController extends Controller
{
    public function top_view(){
        $products = Product::orderBy('created_at', 'desc')->get()->take(12);;
        return view('shop/shop_top', ['products' => $products]);
    }

    // ショップ個別ページの表示
    public function shop_item_page_view(Product $product){
        $otherworks = Product::where('pro_author',$product->pro_author)->get()->take(4);
        $other_works_of_this_genres = Product::where('pro_genre',$product->pro_genre)->get()->take(6);
        //谷口追記、レビュー平均点算出表示
        $revs = Product_review::orderBy('created_at', 'asc')->where('p_id',$product->id)->get();
        $ave=0;
        $count=0;
        foreach ($revs as $rev){
            $ave+=$rev->point;
            $count++;
        }

        return view('shop/shop_item_page', [
                'product' => $product,
                'otherworks' => $otherworks,
                'other_works_of_this_genres' => $other_works_of_this_genres,
                'revs'=>$revs,
                'ave'=>$ave/$count,
                'count'=>$count
            ]);
    }

    public function review_add (Request $request) {
        //バリデーション
        $validator = Validator::make($request->all(), [
                'review' => 'required|max:255',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
                return redirect('/booquet')
                ->withInput()
                ->withErrors($validator);
        }
        $product = Product::where('id',(int)$request->pro_id)->first();
        $revs = new Product_review;
        $revs->p_id = $product->id;
        $revs->contributor =0;
        $revs->review = $request->review;
        $revs->point = $request->point;
        $revs->save(); 
        return redirect()->back();
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

    public function shop_cart_quantity_edit(Product $product, Request $request){
        $cart = Session::get('cart');
        $quantity = Session::get('quantity');
        $key = array_search($product->id, $cart);
        $quantity[$key] = $request->quantity;
        Session::put('quantity',$quantity);

        $max = count($cart);
        $totalQuantity = 0;
        for($i=0;$i<$max;$i++){
            $totalQuantity += $quantity[$i];
        }
        Session::put('totalQuantity',$totalQuantity);

        return redirect('/shop_cart_look');

    }

    public function delete(){
        Session::flush();
        return redirect('/booquet');
    }

    public function shop_checkout_view(){
        return view('shop/shop_checkout');
    }

    public function shop_confirmation_view(Request $request){
        $cart = Session::get('cart');
        $quantity = Session::get('quantity');
        // バリデーション
        $validator = Validator::make($request->all(),[
            'c_name' => 'required |min:1 |max:255',
            'c_email' => 'required |min:1 |max:255',
            'c_country' => 'required |min:1 |max:255',
            'c_postal1' => 'required |min:1 |max:3',
            'c_postal2' => 'required |min:1 |max:4',
            'c_address' => 'required |min:1 |max:255',
            'c_tel' => 'required |min:1 |max:255',
            'c_card_number' => 'required |min:1 |max:255',
            'c_card_security_code' => 'required |min:1 |max:255',
        ]);

        if ($validator->fails()){
            return redirect('/shop_checkout')
                ->withInput()
                ->withErrors($validator);
        }

        foreach($cart as $key => $val){
            $product[] = Product::find($val); 
        }

        return view('shop/shop_confirm', [
                'product' => $product,
                'request' => $request,
                'cart' => $cart,
                'quantity' => $quantity
             ]
        );
    }
    
    public function shop_order_complete_view(Request $request){
        $cart = Session::get('cart');
        $quantity = Session::get('quantity');

        foreach($cart as $key => $val){
            $product[] = Product::find($val);
        }

       
        $datsales = new Datsale;
        if(empty(Session::get('c_id'))){
            $datsales->c_id = 0;
        }else{
            $datsales->c_id = Session::get('c_id');
        }
        $datsales->c_name = $request->c_name;
        $datsales->c_email = $request->c_email;
        $datsales->c_country = $request->c_country;
        $datsales->c_postal1 = $request->c_postal1;
        $datsales->c_postal2 = $request->c_postal2;
        $datsales->c_address = $request->c_address;
        $datsales->c_tel = $request->c_tel;
        $datsales->save();

        $lastid = DB::getPdo()->lastInsertId();

        for($i=0; $i<count($cart); $i++){
            $datsalesproducts = new Datsalesproduct;
            $datsalesproducts->s_id = $lastid;
            $datsalesproducts->pro_id = $cart[$i];
            $datsalesproducts->pro_price = $product[$i]->pro_price;
            $datsalesproducts->pro_quantity = $quantity[$i];
            $datsalesproducts->save();

            $product[$i]->pro_stock -= $quantity[$i];
            $product[$i]->save();
        }
        

        Session::forget('cart');
        Session::forget('quantity');
        Session::put('totalQuantity',0);
<<<<<<< HEAD
        // ↓実験中
        $results = DB::select('
        select
        datsalesproducts.pro_id as p,sum(datsalesproducts.pro_price * datsalesproducts.pro_quantity) as goukei 
        from
        datsales,datsalesproducts
        where datsales.id=datsalesproducts.s_id 
        group by datsalesproducts.pro_id order by goukei DESC');
        return view('shop/shop_order_complete',['r' => $results]);
=======

        return view('shop/shop_order_complete', [
            'product' => $product,
            'request' => $request,
            'cart' => $cart,
            'quantity' => $quantity
        ]);
>>>>>>> f20e8ccb2b566d50f45e3a5d5f44cb158d167fa2
    }

    public function shop_category_page_view($genre){
        $products = Product::where('pro_genre',$genre)->get();
        $rankings = DB::select("
        select 
        datsalesproducts.pro_id as p,
        products.pro_name as name,
        products.pro_genre as genre,
        sum(datsalesproducts.pro_price * datsalesproducts.pro_quantity) as goukei
        from 
        datsales,datsalesproducts,products
        where 
        datsales.id=datsalesproducts.s_id
        and datsalesproducts.pro_id = products.id
        and products.pro_genre = '$genre'
        group by datsalesproducts.pro_id order by goukei DESC");
        return view('shop/shop_category',['products' => $products, 'genre' => $genre, 'rankings' => $rankings]);
    }
<<<<<<< HEAD
    
=======

    public function shop_artist_page_view($author){
        $products = Product::where('pro_author',$author)->get();
        $rankings = DB::select("
        select
        datsalesproducts.pro_id as pro_id,
        products.pro_name as pro_name,
        products.pro_author as pro_author,
        products.pro_thumbnail as pro_thumbnail,
        products.pro_price as pro_price,
        products.pro_release_date as pro_release_date,
        sum(datsalesproducts.pro_quantity) as goukei
        from 
        datsales,datsalesproducts,products
        where 
        datsales.id=datsalesproducts.s_id
        and datsalesproducts.pro_id = products.id
        and products.pro_author = '$author'
        group by datsalesproducts.pro_id order by goukei DESC LIMIT 5");
        return view('shop/shop_artist',['products' => $products, 'author' => $author, 'rankings' => $rankings]);
    }

    public function shop_user_register_view(){
        return view('shop/shop_user_register');
    }

    public function shop_user_register_done(Request $request){
        // バリデーション
        $validator = Validator::make($request->all(),[
            'c_name' => 'required |min:1 |max:255',
            'c_email' => 'required |min:1 |max:255|email',
            'c_password1' => 'required |min:8 |max:255|',
            'c_password2' => 'required |min:8 |max:255|same:c_password1',
            
        ]);

        if ($validator->fails()){
            return redirect('/shop_user_register')
                ->withInput()
                ->withErrors($validator);
        }

        $customer = new Customer;
        $customer->c_name = $request->c_name;
        $customer->c_email = $request->c_email;
        $customer->c_password = password_hash($request->c_password1, PASSWORD_DEFAULT);
        $customer->save();
        return redirect('/booquet');
    }

    public function customer_login_done(Request $request){
        $customer = Customer::where('c_email',$request->c_email)->first();
        if(isset($customer)){
            if(password_verify($request->c_password, $customer->c_password)){
                Session::put('chk_ssid',Session::getId());
                Session::put('name',$customer->c_name);
                Session::put('c_id',$customer->id);
                return redirect('/booquet');
            }else{
                return 'ログインNG';
            }
        }else{
            return 'そんなんねーよ';
        }
        
    }

    public function cudtomer_logout_done(){
        Session::forget('chk_ssid');
        Session::forget('c_name');
        Session::forget('c_id');
        return redirect('/booquet');
    }

    public function customer_page_view(Customer $customer){
        $c_id = Session::get('c_id');
        $purchases = DB::select("
        select
        datsalesproducts.pro_id as pro_id,
        products.pro_name as pro_name,
        products.pro_author as pro_author,
        products.pro_thumbnail as pro_thumbnail,
        products.pro_price as pro_price,
        products.pro_release_date as pro_release_date
        from 
        datsales,datsalesproducts,products
        where 
        datsales.id=datsalesproducts.s_id
        and datsalesproducts.pro_id = products.id
        and datsales.c_id = $c_id");


        return view('shop/shop_customer_page',['customer'=>$customer, 'purchases'=>$purchases]);

    }
>>>>>>> f20e8ccb2b566d50f45e3a5d5f44cb158d167fa2
}
