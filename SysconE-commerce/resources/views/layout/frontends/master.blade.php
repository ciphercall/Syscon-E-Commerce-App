<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/junko/junko/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 09:44:58 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Syscon E-Commerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('frontends/assets/img/favicon.ico')}}">

    <!-- CSS 
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{url('frontends/assets/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{url('frontends/assets/css/style.css')}}">

</head>

<body>

    <!--header area start-->
    @include("layout.frontends.header")
    <!--header area end-->

    <!--sticky header area start-->
    @include("layout.frontends.stickyheader")
    <!--sticky header area end-->

    <!--home section four area start-->
    @yield('main_content')
    <!--home section four area end-->

    <!--footer area start-->
    @include("layout.frontends.footer")
    <!--footer area end-->

    <!-- modal area start-->
    @include("layout.frontends.modal")
    <!-- modal area end-->

    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="{{url('frontends/assets/js/plugins.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('frontends/assets/js/main.js')}}"></script>



</body>


<!-- Mirrored from htmldemo.net/junko/junko/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 09:45:00 GMT -->
</html>