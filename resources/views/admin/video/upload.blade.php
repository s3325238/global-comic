@extends('admin.master')

@section('title','Add new video')

@push('customJs')
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('admin/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
<script type="text/javascript">
    $('#video_name').change(function(e) {
        $.get('{{ route('check_slug') }}', 
        { 
            'video_name': $(this).val() 
        }, 
        function( data ) {
            $('#slug').val(data.slug);
        }
        );
    });
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

        $('.form-file-simple .inputFileVisible').click(function() {
            $(this).siblings('.inputFileHidden').trigger('click');
        });

        $('.form-file-simple .inputFileHidden').change(function() {
            var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $(this).siblings('.inputFileVisible').val(filename);
        });

        $('.form-file-multiple .inputFileVisible, .form-file-multiple .input-group-btn').click(function() {
            $(this).parent().parent().find('.inputFileHidden').trigger('click');
            $(this).parent().parent().addClass('is-focused');
        });

        $('.form-file-multiple .inputFileHidden').change(function() {
            var names = '';
            for (var i = 0; i < $(this).get(0).files.length; ++i) {
                if (i < $(this).get(0).files.length - 1) {
                names += $(this).get(0).files.item(i).name + ',';
                } else {
                names += $(this).get(0).files.item(i).name;
                }
            }
            $(this).siblings('.input-group').find('.inputFileVisible').val(names);
        });

        $('.form-file-multiple .btn').on('focus', function() {
            $(this).parent().siblings().trigger('focus');
        });

        $('.form-file-multiple .btn').on('focusout', function() {
            $(this).parent().siblings().trigger('focusout');
        });

        $(".errorAlert").fadeTo(2000, 700).slideUp(700, function(){
            $(".errorAlert").slideUp(700);
        });
    });
</script>
@endpush

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
        <form action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-rose">
                            General Information
                        </div>
                        <div class="card-body">
                            <table class="table customTableBorder" cellspacing="0" cellpadding="0" style="border:none;">
                                <tr>
                                    <td>Manga</td>
                                    <td>
                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="manga" data-style="btn btn-primary btn-round" title="Choose Manga">
                                            @isset($mangas)
                                            @foreach ($mangas as $manga)
                                            <option value="{{$manga->id}}">
                                                {{ Str::upper($manga->name) }}
                                            </option>
                                            @endforeach
                                            @else
                                            <option value="">
                                                No manga to add
                                            </option>
                                            @endisset

                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Video Name</label>
                                        <input type="text" id="video_name" name="video_name" class="form-control" value="{{ old('video_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Slug</label>
                                        <input type="text" id="slug" name="slug" placeholder="slug" readonly
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Chapter</label>
                                        <input type="number" name="chapter" class="form-control"
                                            value="{{ old('chapter') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-file-upload form-file-multiple">
                                        <input type="file" name="video" accept="video/*" class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="text" disabled class="form-control inputFileVisible"
                                                placeholder="Choose Video File ( extension: mp4 )">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                    <i class="material-icons">attach_file</i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-file-upload form-file-multiple">
                                        <input type="file" name="images[]" accept="image/*" multiple=""
                                            class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="text" disabled class="form-control inputFileVisible"
                                                placeholder="Choose Manga Images ( extension: jpg, jpeg, png )" multiple>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-info">
                                                    <i class="material-icons">layers</i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"><i
                                            class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-success">
                            Video Preview
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/ImtZ5yENzgE"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <br>
                            @can('only-leader', Auth::user())
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
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection