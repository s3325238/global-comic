<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-Commerce</title>
  @include('ui.partials._stylesheet')
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
        {{-- @foreach ($video->getChapter->source as $item)
        <div class="col-md-3">
          <img class="img" style="width:90%" src="{{ asset($manga_path.'/'.$item) }}">
        </div>
        @endforeach --}}
        @include('ui.partials._features')
        @include('ui.partials._pricing')
        @include('ui.partials._team')
        @include('ui.partials._work')
      </div>
    </div>
    @include('ui.partials._footer')
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/moment.min.js')}}"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-kit.js')}}" type="text/javascript"></script>
</body>

</html>