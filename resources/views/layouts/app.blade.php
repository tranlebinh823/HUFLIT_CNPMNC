<!DOCTYPE html>
<html lang="en" data-layout="topnav" data-topbar-color="dark" data-menu-color="light">


<!-- Mirrored from themes.getappui.com/techzaa/velonic/layouts/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2023 16:42:45 GMT -->

<head>
    @include('layouts.partials.head')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->

        @include('layouts.partials.navbar-custom')
        <!-- ========== Topbar End ========== -->

        <!-- ========== Horizontal Menu Start ========== -->
        @include('layouts.partials.topnav')
        <!-- ========== Horizontal Menu End ========== -->

        <!-- ============================================================== -->

        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                   
                    <!-- start page title -->
                    @include('layouts.partials.title')
                    <!-- end page title -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @yield('content')

                </div>
                <!-- content -->

                <!-- Footer Start -->
                @include('layouts.partials.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        @include('layouts.partials.theme-setting')

        <!-- Vendor js -->
        @include('layouts.partials.foot')

</body>

<!-- Mirrored from themes.getappui.com/techzaa/velonic/layouts/layouts-horizontal.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2023 16:43:10 GMT -->

</html>
