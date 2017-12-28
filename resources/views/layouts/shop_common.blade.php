<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Booquet</title>
  <!-- CSSとJavaScript -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- self css -->
  <link rel="stylesheet" href="{{asset('css/common_shop.css')}}">

</head>
<body>
  <!-- ナビゲーションバー -->
  <nav class="navbar navbar-default">
    <div class="navdiv">
      <form action="">
        <i class="glyphicon glyphicon-search"></i>
        <input type="text">
      </form>
    </div>
    <div class="navdiv">
      <h1>Booquet</h1>
    </div>
    <div class="navdiv">
      <p>Login | Join<i class="glyphicon glyphicon-shopping-cart"></i></p>
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
      <div class="right-top">
        <i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i>
        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
        <i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
      </div>
      <div class="right-under">
        <ul>
          <li>Info</li>
          <li>Shipping</li>
          <li>About Us</li>
          <li>Help</li>
        </ul>
      </div>

    </div>
  </div>
  <div class="underContent">
    @yield('content2')
  </div>

  <footer>
    footer area
  </footer>
    

  
</body>
</html>