@extends('layouts.shop_common')


@section('content3')
<div class="container">
  <form>
    <h3>Shipping Address</h3>
    <table>
      <tr>
        <td>
          Name:
        </td>
        <td>
          <input type="text" name="c_name">
        </td>
      </tr>
      <tr>
        <td>
          Email:
        </td>
        <td>
          <input type="email" name="c_email">
        </td>
      </tr>
      <tr>
        <td>
          Country:
        </td>
        <td>
          <input type="text" name="c_country">
        </td>
      </tr>
      <tr>
        <td>
          Postal Code:
        </td>
        <td>
          <input type="text" name="c_postal1">-<input type="text" name="c_postal2">
        </td>
      </tr>
      <tr>
        <td>
          Address:
        </td>
        <td>
          <input type="text" name="c_address">
        </td>
      </tr>
      <tr>
        <td>
          Telephone:
        </td>
        <td>
          <input type="text" name="c_tel">
        </td>
      </tr>
    </table>
    <h3>Payment Method</h3>
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>







@endsection