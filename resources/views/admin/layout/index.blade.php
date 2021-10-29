<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.layout.css_link')
  </head>
  <body>

    <div class="container-scroller">

        <!--start navbar -->
        @include('admin.layout.navbar')
        <!--end navbar -->

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

      <!--start sidebar-->
      @include('admin.layout.sidebar')
      <!-- end sidebar -->

      <!--start main panel-->
      @yield('content')
      <!--end main panel-->

      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.layout.script')
    
  </body>
</html>