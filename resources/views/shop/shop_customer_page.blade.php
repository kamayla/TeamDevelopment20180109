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

<div class="mypage_main_top">
    <div class="mypage_top_left">
    <table>
  <tr>
    <td>
      Name:
    </td>
    <td>
      {{$customer->c_name}}
    </td>
  </tr>
  <tr>
    <td>
      Email:
    </td>
    <td>
      {{$customer->c_email}}
    </td>
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

<a href="" class="btn btn-primary">Edit Your Profile</a>



    </div>
    <div>

    </div>
</div>

<h1>MyPage</h1>


@endsection



@section('content1')
<h1>purchase history</h1>
@foreach($purchases as $purchase)
  {{$purchase->pro_name}}


@endforeach
@endsection