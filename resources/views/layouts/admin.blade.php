<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('admin/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('admin/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style">
    <!-- Thêm jQuery từ CDN Google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    @yield('style')

</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">
            <!-- @yield('slidebar') -->
            @include('admin.components.logo')

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                @include('admin.components.sidemenu')

                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <!-- @yield('header') -->
                <div class="navbar-custom">
                    @include('admin.components.header')

                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    @include('admin.components.search')
                </div>

                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    @yield('content')

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    @include('admin.components.footer')
                </div>
            </footer>

            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="end-bar">

        @include('admin.components.rightbar')

    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('admin/assets/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('admin/assets/js/pages/demo.dashboard.js') }}"></script>

    <!-- @yield('script') -->

    <!-- end demo js-->
</body>

</html>