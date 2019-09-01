<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <!-- CSS Files -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <script src="https://kit.fontawesome.com/33730d10d7.js"></script>
</head>

<body class="@yield('body-class')">
    @include('admin._partials._sidenav')
    <div class="main-panel">
        @include('admin._partials._topnav')
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin/js/material-dashboard.js') }}" type="text/javascript"></script>
</body>

</html>