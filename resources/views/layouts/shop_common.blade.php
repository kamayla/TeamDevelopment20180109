<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Booquet</title>
  <!-- CSSとJavaScript -->

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- self css -->
  <link rel="stylesheet" href="{{asset('css/common_shop.css')}}">

</head>
<body>
  <!-- ナビゲーションバー -->
  <nav class="navbar navbar-default">
    <div class="navdiv">
      <form action="{{url('/shop_result_page')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="question">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
      </form>
    </div>
    <div class="navdiv">
      <a href="{{url('/booquet')}}" class="headerTitle"><h1>Booquet</h1></a>
    </div>
    <div class="navdiv">
      Login | Join
      <a href="{{url('/shop_cart_look')}}"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
      <?php echo Session::get('totalQuantity')?>
    </div>
  </nav>
  <!-- /ナビゲーションバー -->

  <div class="mainWrapper">
    <div class="leftSidebar">
      <ul>
        <li>New Arrival</li>
        <li>Category</li>
        <li>Artist</li>
      </ul>
    </div>
    <div class="mainArea">
      @yield('content1')
    </div>
    <div class="rightSidebar">
      @yield('content2')
    </div>
  </div>
  <div class="underContent1">
    @yield('content3')
  </div>
  <div class="underContent2">
    @yield('content4')
  </div>
  <div class="underContent3">
    @yield('content5')
  </div>
  <div class="underContent4">
    @yield('content6')
  </div>

  <footer>
    footer area
  </footer>
    

  
<!-- Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>