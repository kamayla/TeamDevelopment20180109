@extends('layouts.common')

@section('content')
<!-- 本の一覧表示 -->
@if (count($products)>0)
<div class="panel panel-default">
  <div class="panel-heading">
    登録済み本一覧
  </div>
  <div class="panel-body">
    <table class="table table-striped task-table">
      <thead>
        <th>イメージ</th>
        <th>タイトル</th>
        <th>価格</th>
        <th>ジャンル</th>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td class="table-text"><img src="./pro_img/{{$product->pro_thumbnail}}" style="width: 50px"></td>
            <td class="table-text">{{$product->pro_name}}</td>
            <td class="table-text">{{$product->pro_price}}</td>
            <td class="table-text">{{$product->pro_genre}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif


@endsection