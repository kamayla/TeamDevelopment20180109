@extends('layouts.shop_common')

@section('content1')
<!-- 本の一覧表示 -->
<img src="{{asset('shop_img/main_visual.png')}}" alt="" style="width: 100%;">

@endsection

@section('content2')
<h1>New Arrival</h1>
<div class="new-arrival">
  @if (count($products) > 0)
    @foreach($products as $product)
      <div class="new-arrival-item">
        <div>
          <img src="./pro_img/{{$product->pro_thumbnail}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
        </div>
        <div>
          {{$product->pro_name}}
        </div>
        <div>
          {{$product->pro_author}}
        </div>
        <div>
          {{$product->pro_price.'円'}}
        </div>
      </div>
    @endforeach
  @endif

</div>
@endsection

@section('content3')
<h1>Category</h1>
<div class="categoryWrap">
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
  <div class="categoryItem">
    <img src="{{asset('shop_img/26.jpg')}}" alt="" style="height: 150px">
    <p>Tokyo</p>
  </div>
</div>

@endsection

@section('content4')
<h1>Artist</h1>

@endsection