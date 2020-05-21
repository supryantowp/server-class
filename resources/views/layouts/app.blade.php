<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Server Class</title>
      <meta content="{{config('app.name','Laravel')}}" name="description" />
      {{-- <link rel="shortcut icon" href="images/favicon.ico"> --}}

      {{-- <link rel="stylesheet" href="plugins/morris/morris.css"> --}}
      @stack('css')

      <link href="{{asset('css/bootstrap.min.cs')}}s" rel="stylesheet" type="text/css">
      {{-- <link href="{{asset('css/metismenu.min.css')}}" rel="stylesheet" type="text/css"> --}}
      <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/style 2.css')}}" rel="stylesheet" type="text/css">
      {{-- <link rel="stylesheet" href="{{mix('css/app.css')}}"> --}}
</head>

<body>

      <!-- Begin page -->
      <div id="wrapper">

            <!-- Top Bar Start -->
            @include('layouts.includes._topbar')
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.includes._sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                  <!-- Start content -->
                  <div class="content">
                        <div class="container-fluid">

                              @yield('header')

                              @yield('content')

                        </div> <!-- container-fluid -->

                  </div> <!-- content -->

                  <footer class="footer">
                        © {{Date('Y')}} Server Class - <span class="d-none d-sm-inline-block"> Crafted with <i class="mdi mdi-heart text-danger"></i> by Kiyoshi</span>.
                  </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


      </div>
      <!-- END wrapper -->


      <!-- jQuery  -->
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/metisMenu.min.js')}}"></script>
      <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
      <script src="{{asset('js/waves.min.js')}}"></script>

      <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

      <!--Morris Chart-->
      {{-- <script src="{{asset('plugins/morris/morris.min.js')}}"></script>
      <script src="{{asset('plugins/raphael/raphael-min.js')}}"></script> --}}
      {{-- <script src="{{asset('pages/dashboard.js')}}"></script> --}}

      <!-- App js -->
      <script src="{{asset('js/app 2.js')}}"></script>

      @stack('js')

</body>

</html>
