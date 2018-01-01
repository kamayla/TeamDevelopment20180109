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
  @endif
</div>



@endsection