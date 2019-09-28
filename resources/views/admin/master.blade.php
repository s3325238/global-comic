<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS Files -->
    <link href="{{ asset('admin/css/material-dashboard-pro.min.css') }}" rel="stylesheet" />
    
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