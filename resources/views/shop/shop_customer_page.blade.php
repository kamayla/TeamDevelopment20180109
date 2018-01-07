@extends('layouts.shop_common')

@section('content0')
<div class="cart_titles">
    <div class="cart_page_title">
    <h1><i class="fa fa-id-card-o"></i>Mypage</h1>
    </div>
    <div class="checkout_back_btn">
    <a href=""><span class="fa fa-reply"></span>Back to shopping</a>
    </div>
</div>



<div class="mypage_main">
      <div class="mypage_top">
          <div class="mypage_top_left">
          </div>
          <div class="mypage_top_right">
          </div>
      </div>
      <div class="mypage_bottom">
          <div class="mypage_bottom_left">
          </div>
          <div class="mypage_bottom_right">
          </div>
      </div>
</div>





<div class="mypage_main_top">
    <div class="mypage_top_left">
    <table>
  <tr>
    <td>Name:</td>
    <td>{{$customer->c_name}}</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td>{{$customer->c_email}}</td>
  </tr>
</table>
@php
  $month = date('m', strtotime($customer->created_at));
  switch($month){
    case '01':
      $month = 'January';
      break;
    case '02':
      $month = 'February';
      break;
    case '03':
      $month = 'March';
      break;
    case '04':
      $month = 'April';
      break;
    case '05':
      $month = 'May';
      break;
    case '06':
      $month = 'June';
      break;
    case '07':
      $month = 'July';
      break;
    case '08':
      $month = 'August';
      break;
    case '09':
      $month = 'September';
      break;
    case '10':
      $month = 'October';
      break;
    case '11':
      $month = 'November';
      break;
    case '12':
      $month = 'December';
      break;
  }

@endphp
{{date('d', strtotime($customer->created_at)).' '.$month.' '.date('Y', strtotime($customer->created_at))}}

<br>

<a href="{{url('shop_customer_edit/'.$customer->id)}}" class="btn btn-primary">Edit Your Profile</a>



    </div>
    <div>

    </div>
</div>

<h1>MyPage</h1>


@endsection



@section('content1')
<h1>purchase history</h1>
<div class="artist_page_items">
  @if(count($purchases)>0)
    @foreach($purchases as $purchase)
      <div class="artist_page_item">
        <a href="{{url('shop_item_page/'.$purchase->pro_id)}}">
          <div>
            <img src="{{asset('pro_img/'.$purchase->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
          </div>
          <p>｢{{$purchase->pro_name}}｣</p>
          <p>{{$purchase->pro_author}}</p>
          <p>$ 
          <?php
            $number =$purchase->pro_price;
            echo number_format($number);
          ?>
          </p>
          <p>★★★★★ 4.4</p>
          <p>
            @if($purchase->pro_stock > 0)
            <span class="fa fa-check-circle-o"></span>In Stock
            @else
            <span class="fa fa-times-circle-o"></span>Out of Stock
            @endif
          </p>
        </a>
      </div>
    @endforeach
  @endif
</div>
@endsection

@section('content2')
<h1>In Your Cart</h1>
<div class="artist_page_items">
    @if(isset($products))
        @foreach($products as $product)
            <div class="artist_page_item">
                <a href="{{url('shop_item_page/'.$product->id)}}">
                    <div>
                        <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                    </div>
                    <p>｢{{$product->pro_name}}｣</p>
                    <p>{{$product->pro_author}}</p>
                    <p>$ 
                    <?php
                        $number =$product->pro_price;
                        echo number_format($number);
                      ?>
                    </p>
                    <p>★★★★★ 4.4</p>
                    <p>
                        @if($product->pro_stock > 0)
                        <span class="fa fa-check-circle-o"></span>In Stock
                        @else
                        <span class="fa fa-times-circle-o"></span>Out of Stock
                        @endif
                    </p>
                </a>
            </div>
        @endforeach
    @endif
</div>


@endsection