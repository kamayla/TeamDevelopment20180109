@extends('layouts.shop_common')

@section('content1')



<h1 class="question">Result::{{$question}}</h1>



@endsection

@section('content3')
<div class="container result-wrap">
  @if(count($products)>0)
    @foreach($products as $product)
    <div class="result-item">
      <div>
        <a href="{{url('shop_item_page/'.$product->id)}}">
          <img src="./pro_img/{{$product->pro_thumbnail}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
        </a>
      </div>
      <div>
        {{$product->pro_name}}
      </div>
      <div>
        {{$product->pro_author}}
      </div>
      <div>
        {{$product->pro_price.'円'}}
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