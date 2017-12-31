@extends('layouts.shop_common')

@section('content3')
<div class="container">
  @if(isset($cart))
  <table class="table">
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
      </tr>
      
    @endfor
  </table>
  @endif
</div>
<?php var_dump(Session::get('quantity'))?>
<br>
<?php var_dump(Session::get('cart'))?>
<br>
<?php var_dump(Session::get('key'))?>


@endsection