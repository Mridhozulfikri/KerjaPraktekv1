

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset ('images/1.jpg') }}"> 
    <title>@yield('title')</title>
   
    <!-- Bootstrap Core CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
    <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ URL::asset ('/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
  <link href="{{  URL::asset('/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{  URL::asset('plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!--This page css - Morris CSS -->
  <link href="{{  URL::asset('plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{  URL::asset('css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
  <link href="{{  URL::asset ('css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
          <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
              <!-- ============================================================== -->
              <!-- Logo -->
              <!-- ============================================================== -->
              <div class="navbar-header">
                  <a class="navbar-brand" href="#">
                      <!-- Logo icon --><b>
                          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                          
                          <!-- Light Logo icon -->
                          <img src="{{ URL::asset('images/logo-light-icon.png') }}" width="60px" alt="homepage" class="light-logo" />
                      </b>
                      <!--End Logo icon -->
                      <!-- Logo text -->
                       
                       <!-- Light Logo text -->    
                       <img src="{{URL::asset ('images/logo-light-text.png') }}" height="20px" /></a>
              </div> 
              <!-- ============================================================== -->
              <!-- End Logo -->
              <!-- ============================================================== -->
              <div class="navbar-collapse">
                  <!-- ============================================================== -->
                  <!-- toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav mr-auto mt-md-0">
                      <!-- This is  -->
                      <li class="nav-item" hidden> <a class="nav-link nav--icon hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                      <!-- ============================================================== -->
                      <!-- Search -->
                      <!-- ============================================================== -->
                       {{-- <li class="nav-item hidden-sm-down search-box" hidden> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a> 
                           <form class="app-search">
                              <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form> 
                      </li> --}}
                  </ul>
                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav my-lg-0">
                      <!-- ============================================================== -->
                      <!-- Profile -->
                      
              </div>
            </div>
          </nav>
      </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                @include('includes.navbar')
                
                <!-- End Sidebar navigation -->
              </div>
              <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
              <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
          
                                <i class="mdi mdi-power"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            
                <!-- item--></div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
          <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                  <!-- <div class="col-md-7 col-4 align-self-center">
                    <a href="https://wrappixel.com/templates/materialpro/" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"> Upgrade to Pro</a>
                  </div> -->
                
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                  <div class="container mt-4">
                    @yield('euy')
                  </div>
                  <!-- Footer -->


  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a style="text-decoration:none" class="text-reset fw-bold" href="https://www.instagram.com/sibang_ridho/">Muhammad Ridho Zulfikri</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
                 
                  <!-- Column -->

                  
                  <!-- ============================================================== -->
                  <!-- End Wrapper -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- All Jquery -->
                  <!-- ============================================================== -->
                  <script src="{{  URL::asset('plugins/jquery/jquery.min.js') }}"></script>
                  <!-- Bootstrap tether Core JavaScript -->
                  <script src="{{  URL::asset('plugins/bootstrap/js/tether.min.js') }}"></script>
                  <script src="{{ URL::asset ('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
                  <!-- slimscrollbar scrollbar JavaScript -->
                  <script src="{{ URL::asset ('js/jquery.slimscroll.js') }}"></script>
                  <!--Wave Effects -->
                  <script src="{{  URL::asset('js/waves.js') }}"></script>
                    <!--Menu sidebar -->
                    <script src="{{ URL::asset ('js/sidebarmenu.js') }}"></script>
                    <!--stickey kit -->
                    <script src="{{  URL::asset('plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
                    <!--Custom JavaScript -->
                    <script src="{{ URL::asset ('js/custom.min.js') }}"></script>
                    <!-- ============================================================== -->
                    <!-- This page plugins -->
                    <!-- ============================================================== -->
                    <!-- chartist chart -->
                    <script src="{{  URL::asset('plugins/chartist-js/dist/chartist.min.js') }}"></script>
                    <script src="{{  URL::asset('plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
                    <!--c3 JavaScript -->
                    <script src="{{  URL::asset('plugins/d3/d3.min.js') }}"></script>
                    <script src="{{  URL::asset('plugins/c3-master/c3.min.js') }}"></script>
                    <!-- Chart JS -->
                    <script src="{{ URL::asset ('js/dashboard1.js') }}"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    
                  </body>
                  
                  </html>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  

                  
                  
                  
                  
                  
                  
                  {{-- 
                    <!doctype html>
                    <html lang="en">
                      <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>SARINIAGA / </title>
  </head>
  <body>
    @include('includes.navbar')
    
    

      <div class="container mt-4">
          @yield('euy')
      </div>
       
  
  
  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html> --}}