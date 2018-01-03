@extends('layouts.shop_common')

@section('content1')
<!-- 本の一覧表示 -->
<img src="{{asset('shop_img/main_visual.png')}}" alt="" style="width: 100%;">
@endsection

@section('content2')
<div class="right-top">
  <i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i>
  <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
  <i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
</div>
<div class="right-under">
  <ul>
    <li>Info</li>
    <li>Shipping</li>
    <li>About Us</li>
    <li>Help</li>
  </ul>
</div>

@endsection



@section('content3')
<h1>New Arrival</h1>
<div class="new-arrival">
  @if (count($products) > 0)
    @foreach($products as $product)
      <div class="new-arrival-item">
        <div>
          <a href="{{url('shop_item_page/'.$product->id)}}">
            <img src="./pro_img/{{$product->pro_thumbnail}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
          </a>
        </div>
        <div>
          {{$product->pro_name}}
        </div>
        <div>
          {{$product->pro_author}}
        </div>
        <div>
          <!-- {{$product->pro_price.'円'}} -->
          <?php
         $number =$product->pro_price;
        // 3桁ごとにカンマ区切りで出力
        echo number_format($number);
        ?>円
        </div>
      </div>
    @endforeach
  @endif

</div>
@endsection

@section('content4')
<h1>Category</h1>
<div class="categoryWrap">
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Kyoto</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Art</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Fashion</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Music</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Temple</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Gokudo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
    <p>Other</p>
  </div>
</div>

@endsection

@section('content5')
<h1>Artist</h1>
<div class="container">
  <div class="artist-wrap">
    <div class="artist-item">
      <img src="{{asset('shop_img/26.jpg')}}" alt="" style="width: 100%;">
    </div>
    <div class="artist-item">
      <img src="{{asset('shop_img/26.jpg')}}" alt="" style="width: 100%;">
    </div>
    <div class="artist-item">
      <img src="{{asset('shop_img/26.jpg')}}" alt="" style="width: 100%;">
    </div>
    <div class="artist-item">
      <img src="{{asset('shop_img/26.jpg')}}" alt="" style="width: 100%;">
    </div>
  
  </div>

</div>

@endsection

@section('content6')
<h1>Shopping Guide</h1>
<div class="shopping-guide-wrap">
  <div class="shopping-guide-item">
    <h3>Shipping</h3>
    <div>
    wordwordwordwordwordwordwordwordwordword
    
    </div>
    <div class="wrap">
      <div class="text-area">
        <p>wordwordwordwordword</p>
      </div>
      <div class="icon-area">
      <i class="fa fa-car fa-3x" aria-hidden="true"></i>
      </div>
    </div>
  </div>

  <div class="shopping-guide-item">
    <h3>Payment method</h3>
    <div>
    wordwordwordwordwordwordwordwordwordword
    </div>
    <div class="wrap">
      <div class="text-area">
        <p>wordwordwordwordword</p>
      </div>
      <div class="icon-area">
        <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
        <i class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
        <i class="fa fa-cc-paypal fa-2x" aria-hidden="true"></i>
        <i class="fa fa-cc-amex fa-2x" aria-hidden="true"></i>

      </div>
    </div>
  </div>
</div>

@endsection