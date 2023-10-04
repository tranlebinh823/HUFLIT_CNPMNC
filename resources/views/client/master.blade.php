<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('module', 'Trang Chủ') @yield('action')</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css"
        href="{{ asset('client/assets/css/vendors/bootstrap.css') }}" />

    <!-- wow css -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/animate.min.css') }}" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/vendors/font-awesome.css') }}" />

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/vendors/feather-icon.css') }}" />

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/vendors/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/vendors/slick/slick-theme.css') }}" />

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bulk-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/vendors/animate.css') }}" />

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/style.css') }}" />
</head>

<body class="bg-effect">
    <!-- Header Start -->
    @include('client.blocks.header')
    <!-- Header End -->

    <!-- mobile fix menu start -->
    @include('client.blocks.mobile-menu')
    <!-- mobile fix menu end -->

    @yield('content')
    @include('client.blocks.footer')
    <!-- Quick View Modal Box Start -->
    @include('client.blocks.quick-view-modal')
    <!-- Quick View Modal Box End -->

    <!-- Location Modal Start -->
    @include('client.blocks.location-modal')

    <!-- Location Modal End -->

    <!-- Cookie Bar Box Start -->
    @include('client.blocks.cookie-bar-box')
    <!-- Cookie Bar Box End -->
    <!-- Deal Box Modal Start -->
    @include('client.blocks.deal-box')
    <!-- Deal Box Modal End -->
    <!-- Tap to top start -->
    @include('client.blocks.theme-option')
    <!-- Tap to top end -->
    @include('client.blocks.setting-box')



    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{ asset('client/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- jquery ui-->
    <script src="{{ asset('client/assets/js/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('client/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap/popper.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('client/assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/feather/feather-icon.js') }}"></script>

    <!-- Lazyload Js -->
    <script src="{{ asset('client/assets/js/lazysizes.min.js') }}"></script>

    <!-- Slick js-->
    <script src="{{ asset('client/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('client/assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/slick/custom_slick.js') }}"></script>

    <!-- Auto Height Js -->
    <script src="{{ asset('client/assets/js/auto-height.js') }}"></script>

    <!-- Timer Js -->
    <script src="{{ asset('client/assets/js/timer1.js') }}"></script>

    <!-- Fly Cart Js -->
    <script src="{{ asset('client/assets/js/fly-cart.js') }}"></script>

    <!-- Quantity js -->
    <script src="{{ asset('client/assets/js/quantity-2.js') }}"></script>

    <!-- WOW js -->
    <script src="{{ asset('client/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/custom-wow.js') }}"></script>

    <!-- script js -->
    <script src="{{ asset('client/assets/js/script.js') }}"></script>

    <!-- thme setting js -->
    <script src="{{ asset('client/assets/js/theme-setting.js') }}"></script>

</body>

</html>
