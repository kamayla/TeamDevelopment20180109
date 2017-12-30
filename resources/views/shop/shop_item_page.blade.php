@extends('layouts.shop_common')


@section('content1')

<div class="pro-item-wrap">
  <div class="pro-item-area">
    <div>
      Category/{{$product->pro_genre}}
    </div>
    <div>
      <h1>{{$product->pro_name}}</h1>
    </div>
    <div>
      {{$product->pro_author}}
    </div>
    <div>
      {{$product->pro_price.'円'}}
    </div>
    <div>
      In Stock
    </div>
    <div>
      ★★★★★ 4.4 scroe
    </div>
    <div>
      Publisher:{{$product->pro_publisher}}
    </div>
    <div>
      Year:{{$product->pro_release_date}}
    </div>
    <div>
      Size{{$product->pro_size}}cm
    </div>
    <div>
      Weight:{{$product->pro_weight}}kg
    </div>
    <div>
      <form action="">
        <select name="quantity" id="">
          @for($i=0; $i<$product->pro_stock; $i++)
          <option value="{{$i+1}}">{{$i+1}}</option>
          @endfor
        </select>
        <button type="submit" class="btn btn-primary">+ Add To Cart</button>
      </form>
    </div>
    <div>
      share: 
      <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
      <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
      <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
    </div>

  </div>
  <div class="pro-item-area"> 
    <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 470px; display: block; margin: 0 auto;">
  </div>
</div>

<div class="pro-review-area">
  レビューエリア
</div>


@endsection