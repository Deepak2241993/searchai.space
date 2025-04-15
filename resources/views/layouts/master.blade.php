<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dilabs - Creative Digital Agency Template">

    <!-- ========== Page Title ========== -->
    <title>Search Ai</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{url('/front-assets')}}/assets/img/logofavicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{url('/front-assets')}}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/themify-icons.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/elegant-icons.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/flaticon-set.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/animate.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/validnavs.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/helper.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/unit-test.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/assets/css/style.css" rel="stylesheet">
    <link href="{{url('/front-assets')}}/style.css" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->


    <!-- Start Header Top 
    ============================================= -->
    <x-front.header></x-front.header>
    <!-- End Header -->
			@yield('main-body')
    <!-- Start Footer 
    ============================================= -->
    <x-front.footer/>
    <!-- End Footer -->
    
    <!-- jQuery Frameworks
    ============================================= -->
    
    <x-front.front_footer_js/>
    @stack('script')
</body>
</html>