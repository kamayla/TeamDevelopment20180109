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
      Year:{{date('Y', strtotime($product->pro_release_date))}}
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

@section('content2')
<h4>Other works by</h4>
<h4>{{$product->pro_author}}</h4>
  @foreach($otherworks as $otherwork)
    <div class="ow-wrap">
      <div class="ow-img">
        <a href="{{url('shop_item_page/'.$otherwork->id)}}">
          <img src="{{asset('pro_img/'.$otherwork->pro_thumbnail)}}" alt="" style="height: 100px; display: block; margin: 0 auto;">
        </a>
      </div>
      <div class="ow-info">
        <p>{{$otherwork->pro_name}}</p>
        <p>{{$otherwork->pro_ahtor}}</p>
        <p>{{$otherwork->pro_price}}</p>
        <p>{{date('Y', strtotime($otherwork->pro_release_date))}}</p>
        <p>{{$otherwork->pro_publisher}}</p>
      </div>

    </div>

  @endforeach

@endsection

@section('content3')
<h1>Other works of this genre</h1>
<div class="other-works-of-this-genre-wrap">
  @foreach($other_works_of_this_genres as $other_works_of_this_genre)
    <div class="genre-item">
      <div>
        <a href="{{url('shop_item_page/'.$other_works_of_this_genre->id)}}">
          <img src="{{asset('pro_img/'.$other_works_of_this_genre->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
        </a>
      </div>
      <div>
        {{$other_works_of_this_genre->pro_name}}
      </div>
      <div>
        {{$other_works_of_this_genre->pro_author}}
      </div>
      <div>
        {{$other_works_of_this_genre->pro_price}}
      </div>
    </div>

  @endforeach
</div>
  
  <button class="btn btn-primary view-more">View More</button>


@endsection


@section('content4')

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