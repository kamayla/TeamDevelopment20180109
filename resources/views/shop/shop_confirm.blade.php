@extends('layouts.shop_common')


@section('content0')
@if(isset($cart))
  <table class="table">
    <tr>
      <th>
        画像
      </th>
      <th>
        数量
      </th>
      <th>
        価格
      </th>
      <th>
        合計
      </th>
    </tr>
    @for($i=0; $i<count($cart); $i++)
      <tr>
        <td>
          <img src="{{asset('pro_img/'.$product[$i]->pro_thumbnail)}}" alt="" style="height: 150px;">
        </td>
        <td>
          ×{{$quantity[$i]}}
        </td>
        <td>
          {{$product[$i]->pro_price.'円'}}
        </td>
        <td>
          {{$product[$i]->pro_price * $quantity[$i]}}
        </td>
      </tr>
      
    @endfor
  </table>
  @else
  <p>カートに何も入っていません。</p>
  @endif





@endsection

@section('content1')
<?php 
  $TotalQuantity = 0; 
  $TotalAmount = 0;
?>
<div class="container">
@if(isset($cart))
@for($i=0;$i<count($cart);$i++)

  <?php 
    $TotalQuantity += $quantity[$i];
    $TotalAmount += ($product[$i]->pro_price * $quantity[$i]);
  ?>
@endfor


<div class="total-wrap">
  <div>
    <p>Total Quantity:</p>
    <p>{{$TotalQuantity}}</p>
  </div>
  <div>
    <p>Total Amount:</p>
    <p>{{$TotalAmount}}</p>
  </div>
</div>
<p>Shiping Cost: $8.99</p>
<p>tax: $0.00</p>
<p>Grand Total: {{$TotalAmount}}</p>
@endif
</div>

@endsection

@section('content2')
<h1>Shipping Address</h1>
<table class="table">
  <tr>
    <td>
      Name:
    </td>
    <td>
      {{$request->c_name}}
    </td>
  </tr>
  <tr>
    <td>
      Email:
    </td>
    <td>
      {{$request->c_email}}
    </td>
  </tr>
  <tr>
    <td>
      Country:
    </td>
    <td>
      {{$request->c_country}}
    </td>
  </tr>
  <tr>
    <td>
      Postal Code:
    </td>
    <td>
      {{$request->c_postal1}}
    </td>
  </tr>
  <tr>
    <td>
      Address:
    </td>
    <td>
      {{$request->c_address}}
    </td>
  </tr>
  <tr>
    <td>
      Telephone:
    </td>
    <td>
      {{$request->c_tel}}
    </td>
  </tr>
</table>


<h1>Payment Method</h1>
<table class="table">
  <tr>
    <td>
      Card Type:
    </td>
    <td>
      {{$request->c_card_type}}
    </td>
  </tr>
  <tr>
    <td>
      Card Number:
    </td>
    <td>
      {{'****-****-****-'.substr($request->c_card_number,12,4)}}
    </td>
  </tr>
  <tr>
    <td>
      Expiration Date:
    </td>
    <td>
      {{$request->c_card_month.'/'.substr($request->c_card_year,2,2)}}
    </td>
  </tr>
</table>

<form action="{{url('shop_order_complete')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" name="c_name" value="{{$request->c_name}}">
  <input type="hidden" name="c_email" value="{{$request->c_email}}">
  <input type="hidden" name="c_country" value="{{$request->c_country}}">
  <input type="hidden" name="c_postal1" value="{{$request->c_postal1}}">
  <input type="hidden" name="c_address" value="{{$request->c_address}}">
  <input type="hidden" name="c_tel" value="{{$request->c_tel}}">
  <input type="hidden" name="c_pay_type" value="{{$request->c_pay_type}}">
  <input type="hidden" name="c_card_type" value="{{$request->c_card_type}}">
  <input type="hidden" name="c_card_number" value="{{$request->c_card_number}}">
  <input type="hidden" name="c_card_month" value="{{$request->c_card_month}}">
  <input type="hidden" name="c_card_year" value="{{$request->c_year}}">
  <input type="hidden" name="c_card_security_code" value="{{$request->c_card_security_code}}">
  <button type="submit" class="btn btn-primary">Submit Order</button>
</form>


@endsection