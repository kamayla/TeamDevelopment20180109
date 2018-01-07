@extends('layouts.shop_common')


@section('content1')
<div class="pro-item-wrap">


    <div class="pro-item-area_left">
        <div>
            <p>Category</p>
        </div>
          <a href="{{url('shop_category/Tokyo')}}">Tokyo</a>
          <a href="{{url('shop_category/Kyoto')}}">Kyoto</a>
          <a href="{{url('shop_category/Gokudo')}}">Gokudo</a>
          <a href="{{url('shop_category/Temple')}}">Temple</a>
          <a href="{{url('shop_category/Art')}}">Art</a>
          <a href="{{url('shop_category/Fashion')}}">Fashion</a>
          <a href="{{url('shop_category/Music')}}">Music</a>
          <a href="{{url('shop_category/Other')}}">Other</a>
    </div>


    <div class="pro-item-area_center">
        <div class="item_center_inner">
            <div class="">
                  <p class="categoryRoute">Category/<a href="">{{$product->pro_genre}}</a></p>
                  <h2>｢{{$product->pro_name}}｣</h2>
                  <p><a href="">{{$product->pro_author}}</a></p>
                  <p class="item_price">$
                  <?php
                      $number =$product->pro_price;
                      // 3桁ごとにカンマ区切りで出力
                      echo number_format($number);
                      ?>
                  </p>
                  @if($product->pro_stock>0)
                  <p><span class="fa fa-check-circle-o"></span>In Stock</p>
                  @else
                  <p><span class="fa fa-times-circle-o"></span>Out of Stock</p>
                  @endif
                  @php
                    if(round($ave,0)==0){
                        $score='
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,0)==1){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';

                    }elseif(round($ave,0)==2){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                        
                    }elseif(round($ave,0)==3){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                        
                    }elseif(round($ave,0)==4){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                        
                    }elseif(round($ave,0)==5){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        ';
                    }

                  @endphp

                  <p>{!!$score!!} {{round($ave,0)}} score</p>
                  <p>Publisher : {{$product->pro_publisher}}</p>
                  <p>Year : {{date('Y', strtotime($product->pro_release_date))}}</p>
                  <p>Size : {{$product->pro_size}}cm</p>
                  <p>Weight : {{$product->pro_weight}}kg</p>
                <div>
                    @if($product->pro_stock>0)
                    <form action="{{url('shop_cart_in/'.$product->id)}}" method="post">
                      {{csrf_field()}}
                      <select name="quantity" id="">
                        @for($i=0; $i<$product->pro_stock; $i++)
                        <option value="{{$i+1}}">{{$i+1}}</option>
                        @endfor
                        <!-- <span class="fa fa-chevron-down"></span> -->
                      </select>
                      <button type="submit" class=""><span class="fa fa-plus" style="font-size:16px;"></span>Add To Cart</button>
                    </form>
                    @else
                    <button class=""><span class="fa fa-plus" style="font-size:16px;"></span>Add To Cart</button>
                    @endif
                </div>
                  <div class="item_icons">
                    share: 
                    <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                  </div>
              </div>
              <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 400px;">
        </div>

            <div class="review-area">
                <h4>User Review</h4>
                <div class="review_user">
                    <img src="{{asset('shop_img/gacha.jpg')}}"  width="60px;" height="60px" alt="">
                    <h3>Gachapin</h3>
                  
                    <p> 5</p>

                </div>
                <p class="review_comment">
                it was very good! The picture was also beautiful and drawn in! I also want to tell Mook!
                @foreach ($revs as $rev)
                <tr>
                <!-- 本タイトル -->
                <td class="table-text">
                    <div>{{ $rev->review }}</div>
                    <div>{{ $rev->point }}</div>
                </td>
                
                </tr>
                @endforeach
                </p>
               
                <button id="reviewBtn">Write a review</button>
                <!-- wev.phpで定義 -->
                <form action="{{ url('review_add') }}" method="post" class="write_review">
                {{csrf_field()}}
                <input type="hidden" name="pro_id" value="{{$product->id}}">
                  <p>Write your review</p>
                  <textarea name="review" id="" cols="63" rows="4"></textarea>
                  <div class="review_bottom">
                      <select name="point" id="">
                        <option value="1">★</option>
                        <option value="2">★★</option>
                        <option value="3">★★★</option>
                        <option value="4">★★★★</option>
                        <option value="5">★★★★★</option>
                      </select>
                      <button><span class="fa fa-share"></span>submit</button>
                  </div>
                </form>
            </div>
       </div>


    <div class="pro-item-area_right">
       <h4>Other works by</h4>
       <h4>{{$product->pro_author}}</h4>
         @foreach($otherworks as $otherwork)
        <div class="other-works-item">
            <a href="{{url('shop_item_page/'.$otherwork->id)}}">
                    <div class="ow-img">
                        <img src="{{asset('pro_img/'.$otherwork->pro_thumbnail)}}" alt="" style="height: 100px;">
                    </div>
                    <div class="ow-info">
                        <p>｢{{$otherwork->pro_name}}｣</p>
                        <p>{{$otherwork->pro_author}}</p>
                        <p>$ {{$otherwork->pro_price}}</p>
                        <p>{{date('Y', strtotime($otherwork->pro_release_date))}}</p>
                        <p>{{$otherwork->pro_publisher}}</p>
                    </div>
            </a>
        </div>
           @endforeach
    </div>
</div>



<div class="ow-genre-wrapper">
    <div class="ow-genre-title">
        <h3>Other works of this genre</h3>
    </div>
    <div class="ow-genre-items">
          @foreach($other_works_of_this_genres as $other_works_of_this_genre)
              <div class="genre-item">
                  <a href="{{url('shop_item_page/'.$other_works_of_this_genre->id)}}">
                    <img src="{{asset('pro_img/'.$other_works_of_this_genre->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                  <p>｢{{$other_works_of_this_genre->pro_name}}｣</p>
                  <p>{{$other_works_of_this_genre->pro_author}}</p>
                  <p>${{$other_works_of_this_genre->pro_price}}</p>
                  <p>{{date('Y', strtotime($other_works_of_this_genre->pro_release_date))}}</p>
                </a>
              </div>
          @endforeach
    </div>
</div>  

<!-- informationセクション -->
<div class="infomation-wrapper">
  <div class="infomationTitle">
      <h1>Shopping Guide</h1>
  </div>
  <div class="infomationContainer">
      <div class='infomationLeft'>
          <div class="shippingTitle">
              <p>Shipping</p>
          </div>
          <h3>Items ordered by 11 AM are shipped during <br>the day.</h3>
          <div class="shippingInner">
              <p>Most items qualify for Free Standard Shipping in the USA.<br>
              You can also pick up at a nearby bookstore or convenience store.<br>
              Dispatch other than the USA is also possible.
              </p>
              <p class="fa fa-truck" aria-hidden="true"></p>
          </div>
      </div>
      <div class='infomationRight'>
          <div class="paymentTitle">
              <p>Payment Method</p>
          </div>
          <h3>choose your preferred payment method such as credit card payment, convenience store payment</h3>
          <div class="paymentInner">
              <p>VISA,MASTERCARD,AMEX,JCB can be used.<br>
              Those who are concerned about security can also pay by paypal.<br>
              We also do cash on delivery shipping.
              </p>
              <div class="paymentIcons">
                  <div class="paymentIcons_top">
                      <p class="fa fa-cc-mastercard" aria-hidden="true"></p>
                      <p class="fa fa-cc-visa" aria-hidden="true"></p>
                  </div>
                  <div class="paymentIcons_bottom">
                    <p class="fa fa-cc-paypal" aria-hidden="true"></p>
                    <p class="fa fa-cc-amex" aria-hidden="true"></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- /informationセクション -->
@endsection