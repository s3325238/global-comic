<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') | Global Comics</title>
  @include('ui.partials._stylesheet')
</head>

<body class="@yield('class') sidebar-collapse">
  @include('ui.partials._navbar')

  @yield('content')

  @include('ui.partials._footer')
  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/moment.min.js')}}"></script>
  <!--	Plugin for Small Gallery in Product Page -->
  <script src="{{ asset('js/plugins/jquery.flexisel.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-kit.js')}}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
        $("#flexiselDemo1").flexisel({
          visibleItems: 4,
          itemsToScroll: 1,
          animationSpeed: 400,
          enableResponsiveBreakpoints: true,
          responsiveBreakpoints: {
            portrait: {
              changePoint: 480,
              visibleItems: 3
            },
            landscape: {
              changePoint: 640,
              visibleItems: 3
            },
            tablet: {
              changePoint: 768,
              visibleItems: 3
            }
          }
        });
      });
  </script>
</body>

</html>