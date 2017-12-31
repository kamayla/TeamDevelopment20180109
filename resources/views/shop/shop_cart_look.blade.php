@extends('layouts.shop_common')

@section('content1')
<table>
@for($i=0; $i<count($cart); $i++)
<tr>
  <td>
    <img src="{{asset('pro_img/'.$product[$i]->pro_thumbnail)}}" alt="" style="height: 150px;">
  </td>
</tr>
  
@endfor
</table>

@endsection