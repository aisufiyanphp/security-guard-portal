<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>@yield("title-tag")</title>
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/slicknav.min.css')}}">

     <!-- datatable css -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
     <!-- datatable css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{url('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{url('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>
<body>
    @include('sweetalert::alert')
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="#" style="color:white;font-size:20px;">Security Portal</a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li><a href="{{ route("dashboard") }}"><i class="fa-solid fa-gauge"></i> <span>Dashboard</span></a></li>
                        <li><a href="{{ route("company-list") }}"><i class="fa-solid fa-building"></i> <span>Companies</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
        <!-- header area start -->
        <div class="header-area" style="padding:0px 30px;">
            <div class="row align-items-center">
                <div class="col-sm-2 clearfix">
                    <div class="nav-btn pull-left" style="margin-top:0px;">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="notification-area pull-right">
                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                    </ul>
                </div>
                <div class="col-sm-6 clearfix">
                  <div class="breadcrumbs-area clearfix">
                      <h4 class="page-title text-center">@yield("header-title")</h4>
                  </div>
                </div>
                <div class="col-sm-4 clearfix">
                  <div class="user-profile pull-right">
                      <img class="avatar user-thumb" src="{{url('assets/images/author/avatar.png')}}" alt="avatar">
                      <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ session::get("AdminName"); }}<i class="fa fa-angle-down"></i></h4>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Settings</a>
                          <a class="dropdown-item" href="{{route('change-password')}}">Change Password</a>
                          <a class="dropdown-item" href="{{route('admin-logout')}}">Log Out</a>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
            <div class="main-content-inner">
              @yield("content")
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Powered By: <a href="https://archiveinfotech.com" target="_blank">Archive Infotech</a></p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="{{url('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{url('assets/js/popper.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{url('assets/js/line-chart.js')}}"></script>
    <!-- all pie chart -->
    <script src="{{url('assets/js/pie-chart.js')}}"></script>
    <!-- datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- datatable js -->
    <!-- others plugins -->
    <script src="{{url('assets/js/plugins.js')}}"></script>
    <script src="{{url('assets/js/scripts.js')}}"></script>
</body>
</html>
