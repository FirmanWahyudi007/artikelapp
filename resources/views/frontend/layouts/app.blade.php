@include('frontend.layouts.header')

<body>

  <!-- ======= Header ======= -->
@include('frontend.components.navbar')
  <!-- End Header -->

 @yield('content')

  <!-- ======= Footer ======= -->
@include('frontend.components.footer')
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

@include('frontend.layouts.script')