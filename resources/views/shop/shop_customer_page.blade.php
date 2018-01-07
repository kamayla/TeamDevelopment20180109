@extends('layouts.shop_common')

@section('content0')
<div class="cart_titles">
    <div class="cart_page_title">
    <h1><i class="fa fa-id-card-o"></i>Mypage</h1>
    </div>
    <div class="checkout_back_btn">
    <a href="{{url('/booquet')}}"><span class="fa fa-reply"></span>Back to shopping</a>
    </div>
</div>
<div class="mypage_main">
      <div class="mypage_top">
            <div class="mypage_top_left">
                <div class="mypage_tl_inner">
                  <div class="mypage_user_image">
                      <img src="{{asset('shop_img/user_default.png')}}" alt="">
                  </div>
                  <table id="mypage_user_table">
                      <tr>
                          <td font-size="16px">Name :</td>
                          <td align="left">{{$customer->c_name}}</td>
                      </tr>
                      <tr>
                          <td>Email :</td>
                          <td>{{$customer->c_email}}</td>
                      </tr>
                  </table>
                  @php
                    $month = date('m', strtotime($customer->created_at));
                    switch($month){
                      case '01':
                        $month = 'January';
                        break;
                      case '02':
                        $month = 'February';
                        break;
                      case '03':
                        $month = 'March';
                        break;
                      case '04':
                        $month = 'April';
                        break;
                      case '05':
                        $month = 'May';
                        break;
                      case '06':
                        $month = 'June';
                        break;
                      case '07':
                        $month = 'July';
                        break;
                      case '08':
                        $month = 'August';
                        break;
                      case '09':
                        $month = 'September';
                        break;
                      case '10':
                        $month = 'October';
                        break;
                      case '11':
                        $month = 'November';
                        break;
                      case '12':
                        $month = 'December';
                        break;
                    }

                  @endphp
                  <p>Our member since {{date('d', strtotime($customer->created_at)).' '.$month.' '.date('Y', strtotime($customer->created_at))}}</p>
                  <br>
                  <a href="{{url('shop_customer_edit/'.$customer->id)}}"><span class="fa fa-pencil"></span>Edit Your Profile</a>
                  </div>
            </div>

            <div class="mypage_top_right">
                <h2>In Your Cart</h2>
                <div class="artist_page_items">
                    @if(isset($products))
                        @foreach($products as $product)
                            <div class="artist_page_item" style="width:25%;">
                                <a href="{{url('shop_item_page/'.$product->id)}}">
                                    <div>
                                        <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                                    </div>
                                    <p>｢{{$product->pro_name}}｣</p>
                                    <p>{{$product->pro_author}}</p>
                                    <p>$ 
                                    <?php
                                        $number =$product->pro_price;
                                        echo number_format($number);
                                      ?>
                                    </p>
                                    <p>★★★★★ 4.4</p>
                                    <p>
                                        @if($product->pro_stock > 0)
                                        <span class="fa fa-check-circle-o"></span>In Stock
                                        @else
                                        <span class="fa fa-times-circle-o"></span>Out of Stock
                                        @endif
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="top_right_pagenation">
                  <button>1</button>
                </div>

            </div>
      </div>
      <div class="mypage_bottom">
          <div class="mypage_bottom_left">
            <h2>Purchase History</h2>
            <div class="mypage_bl_inner">
                  <div class="artist_page_items">
                    <?php
                        $i = 0;
                    ?>
                    @if(count($purchases)>0)
                      @foreach($purchases as $purchase)
                      <?php $i++ ?>
                        <div class="artist_page_item selection" id="paging_item_{!!$i!!}" style="width:32%;">
                          <a href="{{url('shop_item_page/'.$purchase->pro_id)}}">
                            <div>
                              <img src="{{asset('pro_img/'.$purchase->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                            </div>
                            <p>｢{{$purchase->pro_name}}｣</p>
                            <p>{{$purchase->pro_author}}</p>
                            <p>$ 
                            <?php
                              $number =$purchase->pro_price;
                              echo number_format($number);
                            ?>
                            </p>
                            <p>★★★★★ 4.4</p>
                            <p>
                              @if($purchase->pro_stock > 0)
                              <span class="fa fa-check-circle-o"></span>In Stock
                              @else
                              <span class="fa fa-times-circle-o"></span>Out of Stock
                              @endif
                            </p>
                          </a>
                        </div>
                      @endforeach
                    @endif
                  </div>
                  <div class="top_right_pagenation">
                      <div id="paging"></div>
                      <button>1</button>
                  </div>
              </div>
            </div>
          <div class="mypage_bottom_right">
            <h2>Wishlist</h2>
            <div class="artist_page_items">
                @if(isset($wishlists))
                    @foreach($wishlists as $wishlist)
                        <div class="artist_page_item" style="width:25%;">
                            <a href="{{url('shop_item_page/'.$wishlist->pro_id)}}">
                                <div>
                                    <img src="{{asset('pro_img/'.$wishlist->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                                </div>
                                <p>｢{{$wishlist->pro_name}}｣</p>
                                <p>{{$wishlist->pro_author}}</p>
                                <p>$ 
                                <?php
                                    $number =$wishlist->pro_price;
                                    echo number_format($number);
                                  ?>
                                </p>
                                <p>★★★★★ 4.4</p>
                                <p>
                                    @if($wishlist->pro_stock > 0)
                                    <span class="fa fa-check-circle-o"></span>In Stock
                                    @else
                                    <span class="fa fa-times-circle-o"></span>Out of Stock
                                    @endif
                                </p>
                            </a>
                            <div>
                              @if($wishlist->pro_stock>0)
                              <form action="{{url('shop_cart_in/'.$wishlist->pro_id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class=""><span class="fa fa-plus" style="font-size:16px;"></span>Add To Cart</button>
                              </form>
                              @else
                              <button class=""><span class="fa fa-plus" style="font-size:16px;"></span>Add To Cart</button>
                              @endif
                          </div>
                        </div>
                    @endforeach
                @endif
            </div>
          </div>
      </div>
</div>

@endsection



@section('content1')

@endsection

@section('content2')

@endsection