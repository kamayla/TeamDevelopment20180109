@extends('layouts.shop_common')

@section('content0')
<h1>Edit Your Profile</h1>
<!-- バリデーションエラーの表示に使用 -->
@include('common.errors')
<!-- バリデーションエラーの表示に使用 -->
<form action="{{'/shop_customer_edit_done/'.$customer->id}}" method="post">
{{csrf_field()}}
  <table>
    <tr>
      <td>
        Your Name:
      </td>
      <td>
        <input type="text" name="c_name" value="{{$customer->c_name}}">
      </td>
    </tr>
    <tr>
      <td>
        Email Address:
      </td>
      <td>
        <input type="email" name="c_email" value="{{$customer->c_email}}">
      </td>
    </tr>
    <tr>
      <td>
        Password:
      </td>
      <td>
        <input type="password" name="c_password1">
      </td>
    </tr>
    <tr>
      <td>
        Confirm Password:
      </td>
      <td>
        <input type="password" name="c_password2">
      </td>
    </tr>
  </table>
<input type="button" onclick="history.back()" value="Back">
<button type="submit">Edit Account</button>
</form>

@endsection