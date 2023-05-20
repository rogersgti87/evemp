<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="rogertiweb" />
    <meta name="description" content="@yield('meta-description')">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <!-- Stylesheets & Fonts -->
    <link href="{{url('assets/front/css/plugins.css')}}" rel="stylesheet">
    <link href="{{url('assets/front/css/style.css')}}" rel="stylesheet">

</head>

<body>
<!-- Body Inner -->
<div class="body-inner">
    <!-- Header -->
        @include('front.header')
    <!-- end: Header -->
    <!-- Page title - banner -->
        @include('front.banner')
    <!-- end: Page title -->

    <!-- start section -->
        @yield('content')
    <!-- end section -->

    <!-- Footer -->
    @include('front.footer')
    <!-- end: Footer -->
</div>
<!-- end: Body Inner -->
<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<script src="{{url('assets/front/js/jquery.js')}}"></script>
<script src="{{url('assets/front/js/plugins.js')}}"></script>
<!--Template functions-->
<script src="{{url('assets/front/js/functions.js')}}"></script>
</body>

</html>
