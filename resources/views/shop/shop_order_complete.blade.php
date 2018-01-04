@extends('layouts.shop_common')

@section('content2')
@foreach($r as $y)
<table>
  <tr>
    <td>
    {{$y->p}}
    </td>
    <td>
    {{$y->goukei}}
    </td>
  </tr>
</table>



@endforeach

@endsection