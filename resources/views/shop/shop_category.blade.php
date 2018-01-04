@extends('layouts.shop_common')

@section('content0')
<h1>Category/{{$genre}}</h1>
<div class="container result-wrap">
  @if(count($products)>0)
    @foreach($products as $product)
    <div class="result-item">
      <div>
        <a href="{{url('shop_item_page/'.$product->id)}}">
          <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
        </a>
      </div>
      <div>
        {{$product->pro_name}}
      </div>
      <div>
        {{$product->pro_author}}
      </div>
      <div>
      <?php
         $number =$product->pro_price;
        // 3桁ごとにカンマ区切りで出力
        echo number_format($number);
        ?>円
      </div>
      <div>
        ★★★★★ 4.4
      </div>
      <div>
        in Stock
      </div>
    </div>
    @endforeach
  @endif
</div>
@endsection

@section('content1')
<h1>Top 5 of {{$genre}}</h1>
<table>
@for($i=0; $i<count($rankings); $i++)
<tr>
  <td>
    {{$i+1}}
  </td>
  <td>
    <img src="{{asset('pro_img/'.$rankings[$i]->pro_thumbnail)}}" alt="" style="height: 150px;">
  </td>
  <td>
    {{$rankings[$i]->pro_name}}
  </td>
  <td>
    {{$rankings[$i]->pro_author}}
  </td>
  <td>
    {{$rankings[$i]->pro_price}}
  </td>
  <td>
    {{date('Y', strtotime($rankings[$i]->pro_release_date))}}
  </td>
  <td>
    ★★★★★
  </td>
</tr>

@endfor
</table>
@endsection