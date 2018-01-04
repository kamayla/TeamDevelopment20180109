@extends('layouts.shop_common')

@section('content2')
<div class="cart_page_title">
  
  <h1><span><img src="{{asset('shop_img/cart_icon.png')}}" alt=""><span>In Your Cart</h1>
</div>
@endsection

@section('content3')
<div class="my_cart_wrapper">
  @if(isset($cart))
  <table class="table">
      <!-- <tr class="thead">
          <th></th>
          <th></th>
          <th></th>
          <th></th>
      </tr> -->
    @for($i=0; $i<count($cart); $i++)
      <tr height="120px">
        <!-- <td align="center" valign="middle">
          </td> -->
          <td class="cart_item_title">
            <a href="">
              <div class="cart_item_image">
                <img src="{{asset('pro_img/'.$product[$i]->pro_thumbnail)}}" alt="" style="height: 100px;">
              </div>
                <div>
                    <p>{{$product[$i]->pro_name}}</p>
                    <p>{{$product[$i]->pro_author}}</p>
                    <p>$ {{$product[$i]->pro_price}}</p>
                      @if($product[$i]->pro_stock > 0)
                      <p><span class="fa fa-check-circle-o"></span>In Stock</p>
                      @else
                      <p><span class="fa fa-times-circle-o"></span>Out of Stock</p>
                      @endif
                </div>
                </a>
            </td>
        <td class="cart_item_count">
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
        <td class="cart_item_amount">$ {{$product[$i]->pro_price * $quantity[$i]}}</td>
        <td>
            <form action="{{url('shop_cart_delete/'.$product[$i]->id)}}" method="post">
                {{csrf_field()}}
                <button type="submit" class="fa fa-trash-o cart_trashBtn"></button>
            </form>
        </td>
      </tr>
      
    @endfor
  </table>
  @else
  <p class="cart-nothing">There is nothing in the cart.</p>
  @endif
</div>
@endsection





@section('content4')
<?php 
  $TotalQuantity = 0; 
  $TotalAmount = 0;
?>

<div class="cart_total_amount_wrapper">
  @if(isset($cart))
      @for($i=0;$i<count($cart);$i++)
      
          <?php
          $TotalQuantity += $quantity[$i];
          $TotalAmount += ($product[$i]->pro_price * $quantity[$i]);
          ?>
      @endfor
          
          
      <div class="cart_total_inner">
          <div class="total-wrap">
              <div class="cart_total_quantity">
                <p>Total Quantity :</p>
                <p>× {{$TotalQuantity}}</p>
              </div class="cart_total_amount">
              <div>
                <p>Total Amount :</p>
                <p>$ {{$TotalAmount}}</p>
              </div>
          </div>
          <div class="total_amount_taxes">
              <p>Shiping Cost : $4.99</p>
              <p>Taxes : $0.00</p>
              <p>Grand Total : $ {{$TotalAmount + 4.99}}</p>
          </div>
          <div class="cart_checkout_area">
              <a href="{{url('shop_checkout')}}" class="cart_checkout_btn"><span class="fa fa-share"></span>Checkout</a>
          </div>
      @endif
    </div>
</div>
@endsection


<!-- shopping guideセクション -->

@section('content6')
<div class="infomation-wrapper">
  <div class="infomationTitle">
      <h1>Shopping Guide</h1>
  </div>
  <div class="infomationContainer">
      <div class='infomationLeft'>
          <div class="shippingTitle">
              <p>Shipping</p>
          </div>
          <h3>Items ordered by 11 AM are shipped during <br>the day.</h3>
          <div class="shippingInner">
              <p>Most items qualify for Free Standard Shipping in the USA.<br>
              You can also pick up at a nearby bookstore or convenience store.<br>
              Dispatch other than the USA is also possible.
              </p>
              <p class="fa fa-truck" aria-hidden="true"></p>
          </div>
      </div>
      <div class='infomationRight'>
          <div class="paymentTitle">
              <p>Payment Method</p>
          </div>
          <h3>choose your preferred payment method such as credit card payment, convenience store payment</h3>
          <div class="paymentInner">
              <p>VISA,MASTERCARD,AMEX,JCB can be used.<br>
              Those who are concerned about security can also pay by paypal.<br>
              We also do cash on delivery shipping.
              </p>
              <div class="paymentIcons">
                  <div class="paymentIcons_top">
                      <p class="fa fa-cc-mastercard" aria-hidden="true"></p>
                      <p class="fa fa-cc-visa" aria-hidden="true"></p>
                  </div>
                  <div class="paymentIcons_bottom">
                    <p class="fa fa-cc-paypal" aria-hidden="true"></p>
                    <p class="fa fa-cc-amex" aria-hidden="true"></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection