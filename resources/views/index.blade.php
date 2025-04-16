<!DOCTYPE html>
<html lang="en">

<head>
    @extends('head')
</head>

<body>
    <!-- Topbar Start -->
   @include('nav')
    <!-- Carousel Start -->
    @yield('noidung')
    <!-- Footer Start -->
   @include('footer')
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
   @extends('linkjs')
</body>
</html>