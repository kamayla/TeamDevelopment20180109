@extends('layouts.shop_common')


@section('content3')
<div class="container">
  <!-- バリデーションエラーの表示に使用 -->
  @include('common.errors')
  <!-- バリデーションエラーの表示に使用 -->
  <form action="{{url('/shop_confirmation')}}" method="post">
    {{csrf_field()}}
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
    <table>
      <tr>
        <td>
          Payment Type:
        </td>
        <td>
          <input type="radio" name="c_pay_type" id="c_pay_type1" value="Credit" checked="checked"><label for="c_pay_type1">Credit</label>
          <input type="radio" name="c_pay_type" id="c_pay_type2" value="Paypal"><label for="c_pay_type2">Paypal</label>
          <input type="radio" name="c_pay_type" id="c_pay_type3" value="Cash"><label for="c_pay_type3">Cash on delivery</label>
        </td>
      </tr>
      <tr>
        <td>
          Card Type:
        </td>
        <td>
          <input type="radio" name="c_card_type" id="c_card_type1" value="Visa" checked="checked"><label for="c_card_type1">Visa</label>
          <input type="radio" name="c_card_type" id="c_card_type2" value="MasterCard"><label for="c_card_type2">MasterCard</label>
          <input type="radio" name="c_card_type" id="c_card_type3" value="Amex"><label for="c_card_type3">Amex</label>
          <input type="radio" name="c_card_type" id="c_card_type4" value="JCB"><label for="c_card_type4">JCB</label>
        </td>
      </tr>
      <tr>
        <td>
          Card Number:
        </td>
        <td>
          <input type="text" name="c_card_number">
        </td>
      </tr>
      <tr>
        <td>
          Expiration Date:
        </td>
        <td>
          <select name="c_card_month" id="">
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
          <select name="c_card_year" id="">
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          Security Code:
        </td>
        <td>
         <input type="text" name="c_card_security_code">
        </td>
      </tr>
    </table>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>







@endsection