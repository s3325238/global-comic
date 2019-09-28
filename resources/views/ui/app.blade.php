<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-Commerce</title>
  <link href="{{ asset('site/css/material-kit.min.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/33730d10d7.js"></script>
  {{-- @include('ui.partials._stylesheet') --}}
</head>

<body class="sections-page sidebar-collapse">
  <div class="main">
    {{-- <div class="section-space"></div> --}}
    <div class="cd-section" id="headers">
      <div class="header-2">
        @include('ui.partials._navbar')
        @include('ui.partials._page-header')
      </div>
    </div>
    <div class="cd-section" id="features">
      <div class="container">
        @include('ui.partials._features')
        @include('ui.partials._pricing')
        @include('ui.partials._team')
        @include('ui.partials._work')
      </div>
    </div>
    @include('ui.partials._footer')
    <!--   Core JS Files   -->
    <script src="{{ asset('site/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('site/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('site/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('site/js/plugins/moment.min.js')}}"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('site/js/material-kit.min.js')}}" type="text/javascript"></script>
</body>

</html>