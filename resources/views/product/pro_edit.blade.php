@extends('layouts.common')

@section('content')

<div class="panel-body">
  <!-- バリデーションエラーの表示に使用 -->
  @include('common.errors')
  <!-- バリデーションエラーの表示に使用 -->

  <!-- 本登録フォーム -->
  <form action="{{url('pro_edit_done')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <table border="1">
      <tr>
        <td>商品名</td>
        <td><input type="text" name="pro_name" value="{{$product->pro_name}}"></td>
      </tr>
      <tr>
        <td>商品名（英語表記）</td>
        <td><input type="text" name="pro_name_en" value="{{$product->pro_name_en}}"></td>
      </tr>
      <tr>
        <td>価格（円）</td>
        <td><input type="text" name="pro_price" value="{{$product->pro_price}}"></td>
      </tr>
      <tr>
        <td>画像</td>
        <td><input type="file" name="pro_thumbnail"></td>
      </tr>
      <tr>
        <td>ジャンル</td>
        <td><input type="text" name="pro_genre" value="{{$product->pro_genre}}"></td>
      </tr>
      <tr>
        <td>著者</td>
        <td><input type="text" name="pro_author" value="{{$product->pro_author}}"></td>
      </tr>
      <tr>
        <td>著者(en)</td>
        <td><input type="text" name="pro_author_en" value="{{$product->pro_author_en}}"></td>
      </tr>
      <tr>
        <td>原作者</td>
        <td><input type="text" name="pro_original_author" value="{{$product->pro_original_author}}"></td>
      </tr>
      <tr>
        <td>原作者(en)</td>
        <td><input type="text" name="pro_original_author_en" value="{{$product->pro_original_author_en}}"></td>
      </tr>
      <tr>
        <td>発売日</td>
        <td><input type="date" name="pro_release_date" value="{{date('Y-m-d', strtotime($product->pro_release_date))}}"></td>
      </tr>
      <tr>
        <td>出版社</td>
        <td><input type="text" name="pro_publisher" value="{{$product->pro_publisher}}"></td>
      </tr>
      <tr>
        <td>レーベル</td>
        <td><input type="text" name="pro_label" value="{{$product->pro_label}}"></td>
      </tr>
      <tr>
        <td>作品詳細</td>
        <td><textarea name="pro_description" id="" cols="30" rows="10">{{$product->pro_description}}</textarea></td>
      </tr>
      <tr>
        <td>書籍サイズ</td>
        <td><input type="text" name="pro_size" value="{{$product->pro_size}}"></td>
      </tr>
      <tr>
        <td>書籍重量</td>
        <td><input type="text" name="pro_weight" value="{{$product->pro_weight}}"></td>
      </tr>
      <tr>
        <td>在庫数</td>
        <td><input type="text" name="pro_stock" value="{{$product->pro_stock}}"></td>
      </tr>
      <tr>
        <td>ISBN_NO</td>
        <td><input type="text" name="pro_isbn" value="{{$product->pro_isbn}}"></td>
      </tr>
    </table>
    <!-- 更新用にIDを保持 -->
    <input type="hidden" name="id" value="{{$product->id}}" />
    <!-- 本登録ボタン -->
    <button type="submit" class="btn-default">
      <i class="glyphicon glyphicon-plus"></i>UPLOAD
    </button>
  </form>
</div>

@endsection