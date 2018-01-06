@extends('layouts.shop_common')

@section('content0')
<h1>Let`s register now</h1>
<!-- バリデーションエラーの表示に使用 -->
  @include('common.errors')
<!-- バリデーションエラーの表示に使用 -->
<form action="{{url('shop_user_register_done')}}" method="post">
  {{csrf_field()}}
  <table>
    <tr>
      <td> 
        Your Name:
      </td>
      <td>
        <input type="text" name="c_name">
      </td>
    </tr>
    <tr>
      <td> 
        Email Address:
      </td>
      <td>
        <input type="text" name="c_email">
      </td>
    </tr>
    <tr>
      <td> 
        Password:
      </td>
      <td>
        <input type="text" name="c_password1">
      </td>
    </tr>
    <tr>
      <td> 
        Confirm Password:
      </td>
      <td>
        <input type="text" name="c_password2">
      </td>
    </tr>
  </table>
  <button type="submit">Create Account</button>
</form>


@endsection