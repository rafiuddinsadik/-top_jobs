<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashboard/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/admin/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dashboard/admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('dashboard/admin/images/favicon.png') }}" />
</head>

<body>
<div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    @include('dashboard.admin.components.navbar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('dashboard.admin.components.sidebar')

        <!-- partial -->
        <div class="main-panel">

            <!-- Main Content -->
            @yield('main-content')
             
            <!-- partial:partials/_footer.html -->
            @include('dashboard.admin.components.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->

</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ asset('dashboard/admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('dashboard/admin/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('dashboard/admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('dashboard/admin/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('dashboard/admin/js/dashboard.js') }}"></script>
<!-- End custom js for this page-->
</body>

</html>