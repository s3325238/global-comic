@extends('admin.master')

@section('title','Editing video')

@section('content')
<div class="content">
    <div class="container-fluid">
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto justify-content-center">
                <div class="alert alert-danger alert-dismissible fade show errorAlert" id="errorAlert" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('video.pending')}}" class="btn btn-primary"><i
                        class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back to list</a>
            </div>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-success">
                            Video Preview
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/ImtZ5yENzgE"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="col-md-6">
                                    <div class="card " style="margin-top:17%">
                                        <div class="card-header card-header-rose card-header-text">
                                            <div class="card-icon">
                                                <i class="material-icons">av_timer</i>
                                            </div>
                                            <h4 class="card-title">Pick your time</h4>
                                        </div>
                                        <div class="card-body ">
                                            <div class="form-group">
                                                <input type="text" id="published_time" name="published_time"
                                                    class="form-control datetimepicker" value="10/05/2016">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-info">
                            Image Preview
                        </div>
                        <div class="card-body">
                            <div class="row ml-auto mr-auto">
                                @foreach ($video->getChapter->source as $item)
                                <div class="col-md-3">
                                    <img class="img" style="width:90%"
                                        src="{{url('site/upload/manga/'.Auth::user()->language.'/'.$video->belongsToManga->slug.'/'.$video->getChapter->slug.'/'.$item)}}}">
                                </div>
                                @endforeach
                                <div class="col-md-3">
                                    <img class="img" style="width:90%"
                                        src="https://images.unsplash.com/photo-1492447273231-0f8fecec1e3a?auto=format&fit=crop&w=334&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D">
                                </div>

                                <div class="col-md-3">
                                    <img class="img" style="width:90%"
                                        src="https://images.unsplash.com/photo-1492447273231-0f8fecec1e3a?auto=format&fit=crop&w=334&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D">
                                </div>

                                <div class="col-md-3">
                                    <img class="img" style="width:90%"
                                        src="https://images.unsplash.com/photo-1492447273231-0f8fecec1e3a?auto=format&fit=crop&w=334&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D">
                                </div>

                                <div class="col-md-3">
                                    <img class="img" style="width:90%"
                                        src="https://images.unsplash.com/photo-1492447273231-0f8fecec1e3a?auto=format&fit=crop&w=334&q=80&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('customJs')
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('admin/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            },
            format: 'YYYY-MM-DD HH:mm',
            disabledHours: [1],
            minDate: moment().add(15, 'i'),
            stepping: '15',
            // locale: '{!! app()->getLocale() !!}'
        });
    });
</script>
@endpush

{{-- @can('only-leader', Auth::user())
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header card-header-rose card-header-text">
                <div class="card-icon">
                    <i class="material-icons">av_timer</i>
                </div>
                <h4 class="card-title">Time Picker</h4>
            </div>
            <div class="card-body ">
                <div class="form-group">
                    <input type="text" id="published_time" name="published_time" class="form-control datetimepicker"
                        value="10/05/2016">
                </div>
            </div>
        </div>
    </div>
</div>
@endcan --}}