<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Shop Fashion ST</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description')">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100" >
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{{ asset('user/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/bootstrap-responsive.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/flexslider.css') }}" type="text/css" media="screen" rel="stylesheet">
<link href="{{ asset('user/css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/cloud-zoom.css') }}" rel="stylesheet">
<link href="{{ asset('user/css/portfolio.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="{{asset('assets/ico/favicon.ico') }}">
</head>
<body>
<!-- Header Start -->
<header>
  @include('user.blocks.header')
    <div class="container">
      @include('user.blocks.nav')
      @include('sweetalert::alert')

    </div>
</header>
<!-- Header End -->

<div id="maincontainer">


  @yield('content')


</div>
<!-- /maincontainer -->

<!-- Footer -->
@include('user.blocks.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script defer src="{{ asset('user/js/custom.js') }}"></script>
<script src="{{ asset('user/js/jquery.js') }}"></script>
<script src="{{ asset('user/js/bootstrap.js') }}"></script>
<script src="{{ asset('user/js/respond.min.js') }}"></script>
<script src="{{ asset('user/js/application.js') }}"></script>
<script src="{{ asset('user/js/bootstrap-tooltip.js') }}"></script>
<script defer src="{{ asset('user/js/jquery.fancybox.js') }}"></script>
<script defer src="{{ asset('user/js/jquery.flexslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('user/js/jquery.tweet.js') }}"></script>
<script  src="{{ asset('user/js/cloud-zoom.1.0.2.js') }}"></script>
<script  type="text/javascript" src="{{ asset('user/js/jquery.validate.js') }}"></script>
<script type="text/javascript"  src="{{ asset('user/js/jquery.carouFredSel-6.1.0-packed.js') }}"></script>
<script type="text/javascript"  src="{{ asset('user/js/jquery.mousewheel.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('user/js/jquery.touchSwipe.min.js') }}"></script>
<script type="text/javascript"  src="{{ asset('user/js/jquery.ba-throttle-debounce.min.js') }}"></script>
<script src="{{ asset('user/js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('user/js/myscript.js') }}"></script>


</body>
</html>
