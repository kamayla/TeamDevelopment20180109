@extends('layouts.shop_common')

@section('content3')
<div class="container">
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
      <th>
        削除
      </th>
    </tr>
    @for($i=0; $i<count($cart); $i++)
      <tr>
        <td>
          <img src="{{asset('pro_img/'.$product[$i]->pro_thumbnail)}}" alt="" style="height: 150px;">
        </td>
        <td>
          <form action="{{url('shop_cart_quantity_edit/'.$product[$i]->id)}}" method="post">
            {{csrf_field()}}
            ×
            <select name="quantity" id="" onchange="submit(this.form)">
              @for($j=0; $j<$product[$i]->pro_stock; $j++)
                <option value="{{$j+1}}"<?php if ($quantity[$i] == $j+1) { echo ' selected'; }; ?>>{{$j+1}}</option>
              @endfor
            </select>
          </form>
        </td>
        <td>
          {{$product[$i]->pro_price.'円'}}
        </td>
        <td>
          {{$product[$i]->pro_price * $quantity[$i]}}
        </td>
        <td>
          <form action="{{url('shop_cart_delete/'.$product[$i]->id)}}" method="post">
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger">
              <i class="glyphicon glyphicon-trash"></i>削除
            </button>
          </form>
        </td>
      </tr>
      
    @endfor
  </table>
  @else
  <p>カートに何も入っていません。</p>
  @endif
  
</div>
@endsection

@section('content4')
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

<a href="{{url('shop_checkout')}}" class="btn btn-primary">Checkout</a>
@endif
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