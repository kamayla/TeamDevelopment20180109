@extends('layouts.shop_common')

@section('content0')
<h1>Artist/{{$author}}</h1>
<div class="container result-wrap">
  @if(count($products)>0)
    @foreach($products as $product)
    <div class="result-item">
      <div>
        <a href="{{url('shop_item_page/'.$product->id)}}">
          <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
        </a>
      </div>
      <div>
        {{$product->pro_name}}
      </div>
      <div>
        {{$product->pro_author}}
      </div>
      <div>
      <?php
         $number =$product->pro_price;
        // 3桁ごとにカンマ区切りで出力
        echo number_format($number);
        ?>円
      </div>
      <div>
        ★★★★★ 4.4
      </div>
      <div>
        @if($product->pro_stock > 0)
        <p><span class="fa fa-check-circle-o"></span>In Stock</p>
        @else
        <p><span class="fa fa-times-circle-o"></span>Out of Stock</p>
        @endif
      </div>
    </div>
    @endforeach
  @endif
</div>
@endsection

@section('content1')
<h1>Top 5 of {{$author}}</h1>
@if(count($rankings)>0)
@for($i=0; $i<count($rankings); $i++)
<div class="other-works-item">
  <a href="{{url('shop_item_page/'.$rankings[$i]->pro_id)}}">
    <div class="ow-img">
        <img src="{{asset('pro_img/'.$rankings[$i]->pro_thumbnail)}}" alt="" style="height: 100px;">
    </div>
    <div class="ow-info">
        <p>｢{{$rankings[$i]->pro_name}}｣</p>
        <p>{{$rankings[$i]->pro_author}}</p>
        <p>$ {{$rankings[$i]->pro_price}}</p>
        <p>{{date('Y', strtotime($rankings[$i]->pro_release_date))}}</p>
    </div>
  </a>
</div>
@endfor
@endif
@endsection