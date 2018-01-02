@extends('layouts.shop_common')

@section('content3')
<div class="container">
  @if(isset($cart))
  <table class="table">
    <tr>
      <th>
        画像1
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