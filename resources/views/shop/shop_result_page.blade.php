@extends('layouts.shop_common')
@inject('func','App\Http\Controllers\ShopController')

@section('content1')
<div class="result_page_wrapper">
    <div class="pro-item-area_left">
        <div>
            <p>Category</p>
        </div>
        <a href="{{url('shop_category/Tokyo')}}">Tokyo</a>
        <a href="{{url('shop_category/Kyoto')}}">Kyoto</a>
        <a href="{{url('shop_category/Gokudo')}}">Gokudo</a>
        <a href="{{url('shop_category/Temple')}}">Temple</a>
        <a href="{{url('shop_category/Art')}}">Art</a>
        <a href="{{url('shop_category/Fashion')}}">Fashion</a>
        <a href="{{url('shop_category/Music')}}">Music</a>
        <a href="{{url('shop_category/Other')}}">Other</a>
    </div>
    
    <div class="result_main_section">
        <div class="result_main_title">
          <span>Result ::</span><h1 class="question">{{$question}}</h1>
        </div>
        <div class="container result-wrap">
              @if(count($products)>0)
                @foreach($products as $product)
                <div class="result-items">
                  <a class="result-item" href="{{url('shop_item_page/'.$product->id)}}">
                        <img src="./pro_img/{{$product->pro_thumbnail}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                        <p>｢{{$product->pro_name}}｣</p>
                        <p>{{$product->pro_author}}</p>
                        <p>$
                          <?php
                        $number =$product->pro_price;
                        // 3桁ごとにカンマ区切りで出力
                        echo number_format($number,2);
                        ?>
                      </p>
                      <p>{!!$func->takestar($func->takeave($product->id))!!}{{$func->takeave($product->id)}}</p>
                      @if($product->pro_stock>0)
                      <p><span class="fa fa-check-circle-o"></span>In Stock</p>
                      @else
                      <p><span class="fa fa-times-circle-o"></span>Out of Stock</p>
                      @endif
                    </a>
                </div>
                @endforeach
              @endif
        </div>
    </div>
  
    
  </div>
@endsection