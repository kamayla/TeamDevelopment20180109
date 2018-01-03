<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Booquet</title>
  <!-- CSSとJavaScript -->

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- self css -->
  <link rel="stylesheet" href="{{asset('css/common_shop.css')}}">
  <!-- jquery -->
  <!-- カルーセル用プラグインCSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick-theme.css')}}">
</head>
<body>

  <!-- ヘッダーセクション -->
  <nav class="navbar navbar-default">
    <!-- 1.サーチ機能 -->
    <div class="searchSection">
      <form action="{{url('/shop_result_page')}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="searchButton"><img src="{{asset('shop_img/search.png')}}" alt=""></button>
        <input type="text" name="question">
      </form>
    </div>

    <!-- 2.Booquetロゴ -->
    <div class="">
      <a href="{{url('/booquet')}}" class="headerTitle"><img src="{{asset('shop_img/booquet_logo.png')}}" alt=""></a>
    </div>

    <!-- 3.ログイン & カート機能 -->
    <div class="loginSection">
      <img src="{{asset('shop_img/user_icon.png')}}" class="userLogo" alt="">
      <span>Login<span>
      <span class="verticalBar">|</span>
      <a href="">Join</a>
      <a href="{{url('/shop_cart_look')}}" class="cartIcon"><img src="{{asset('shop_img/cart_icon.png')}}" alt=""></a>
      <?php echo Session::get('totalQuantity')?>
      <!-- <a href="{{url('/delete')}}" class="fa fa-trash ml-4"></a> -->
    </div>
  </nav>
  <!-- /ヘッダーセクション -->


<!-- メインセクション -->
      @yield('content0')
      @yield('content1')
      @yield('content2')
      @yield('content3')
      @yield('content4')
      @yield('content5')
      @yield('content6')

<!-- フッターセクション -->
  <footer>
      <div class="footerLeft">
          <div class="footerLeft_left">
              <img src="{{asset('shop_img/booquet_logo2.png')}}" alt="" width="180px">
                <p>Monday - Friday 08.30 - 17.00</p>
                <p>booquet_japan@booquet.com</p>
                <p>Find us on Google Maps</p>
          </div>
          <div class="footerLeft_right">
              <p>Join the conversation</p>
              <p>
                  <span class="fa fa-facebook-official"></span>
                  <span class="fa fa-instagram"></span>
                  <span class="fa fa-twitter-square"></span>
              </p>
          </div>
      </div>
      <div class="footerRight">
          <div class="footerRight_left">
              <h3>Language</h3>
                <div class="languages">
                    <p>English</p>
                    <p>日本語</p>
                    <p>简体中文</p>
                </div>
          </div>
          <div class="footerRight_center">
              <h3>Document</h3>
                <div class="documents">
                    <p>Sitemap</p>
                    <p>Terms of service</p>
                    <p>Privacy policy</p>
                </div>
          </div>
          <div class="footerRight_right">
              <p>Pay securely with...</p>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-amex"></span>
              <span class="fa fa-cc-paypal"></span>
          </div>
      </div>
    
  </footer>
<!-- フッターセクション -->



<!-- Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- カルーセル用プラグイン -->
<script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
<!-- self JS-->
<script type="text/javascript" src="{{asset('js/shop_top.js')}}"></script>
</body>
</html>