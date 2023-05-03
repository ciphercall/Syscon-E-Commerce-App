<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.getstisla.com/index-0.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 May 2022 07:14:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <!-- <link rel="shortcut icon" type="image/x-icon" href="{{url('backends/assets/img/avatar/E-comIcon.webp')}}" /> -->
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>E-Commerce Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('backends/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('backends/assets/modules/fontawesome/css/all.min.css')}}">
  
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('backends/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('backends/assets/css/components.css')}}">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
@yield('css')

  </head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

        <!-- Navbar -->
        @include("layout.backends.navbar")
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
			  @include("layout.backends.mainsidebar")
        <!-- /.Main Sidebar Container -->

        <!-- Main content -->
				<section class="content">
					@yield('page')
				</section>
				<!-- /.content -->

        <!-- Footer -->
        @include("layout.backends.footer")
			  <!-- /Footer -->
    </div>
  </div>

    
  <script src="{{url('backends/assets/modules/popper.js')}}"></script>
  <script src="{{url('backends/assets/modules/tooltip.js')}}"></script>
  <script src="{{url('backends/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{url('backends/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{url('backends/assets/modules/moment.min.js')}}"></script>
  <script src="{{url('backends/assets/js/stisla.js')}}"></script>

  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{url('backends/assets/js/scripts.js')}}"></script>
  <script src="{{url('backends/assets/js/custom.js')}}"></script>
  @yield('js')
</body>

<!-- Mirrored from demo.getstisla.com/index-0.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 May 2022 07:14:02 GMT -->
</html>