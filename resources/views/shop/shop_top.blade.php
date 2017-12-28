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
      <div>
        <div>
          <img src="./pro_img/{{$product->pro_thumbnail}}" alt="" style="height: 150px">
        </div>
        <div>
          {{$product->pro_name}}
        </div>
        <div>
          {{$product->pro_author}}
        </div>
        <div>
          {{$product->pro_price}}
        </div>
      </div>
    @endforeach
  @endif

</div>



@endsection