<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS Files -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <script src="https://kit.fontawesome.com/33730d10d7.js"></script>
    @stack('customCSS')
</head>

<body class="@yield('body-class')">
    <div class="wrapper">
        @include('admin._partials._sidenav')
        <div class="main-panel">
            @include('admin._partials._topnav')
            @yield('content')
        </div>
    </div>


    @include('admin._partials._javascript')

    @stack('customJs')
</body>

</html>