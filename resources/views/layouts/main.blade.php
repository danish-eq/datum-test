<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Datum Test') }}</title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin_assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
  <link href="{{ asset('admin_assets/css/custom.css') }}" rel="stylesheet" />
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="{{route('dashboard')}}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a href="{{route('dashboard')}}" class="simple-text logo-normal">
          Logo
          <!--
          Creative Tim
           <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <!-- Start side menu -->
      @include('includes.sidemenu')
      <!-- End side menu -->
    </div>
    <div class="main-panel">
      <!-- Start top menu -->
      @include('includes.topmenu')
      <!-- Start top menu -->
      
      <!-- Start Content -->
        @yield('content')
      <!-- End Content -->

      <!-- Start footer menu -->
      @include('includes.footermenu')
      <!-- Start footer menu -->

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('admin_assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('admin_assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin_assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
  
</body>

</html>
