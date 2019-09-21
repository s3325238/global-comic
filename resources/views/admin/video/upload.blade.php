@extends('admin.master')

@section('title','Member Mangament')

@push('customJs')
{{-- <!-- Plugin for the momentJs  -->
<script src="{{asset('admin/js/plugins/moment.min.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('admin/js/plugins/jquery.validate.min.js')}}"></script> --}}

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
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
                                            @foreach ($mangas as $manga)
                                            <option value="{{$manga->id}}">
                                                {{ Str::upper($manga->name) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Video Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
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
                                        <input type="file" name="file" multiple="" class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="text" class="form-control inputFileVisible"
                                                placeholder="Choose Video File">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                    <i class="material-icons">attach_file</i>
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
                            Vide Preview
                        </div>
                        <div class="card-body">
                            <table class="table customTableBorder" cellspacing="0" cellpadding="0" style="border:none;">
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <select class="selectpicker" name="status"
                                            data-style="btn btn-primary btn-round" title="Choose Status">
                                            {{-- <option disabled selected>Single Option</option> --}}
                                            <option value="1">Activate</option>
                                            <option value="0">Deactivate</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Permission</td>
                                    <td>
                                        <select class="selectpicker" name="role" data-style="btn btn-primary btn-round"
                                            title="Choose Permission">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Language</td>
                                    <td>
                                        <select class="selectpicker" name="language"
                                            data-style="btn btn-primary btn-round" title="Choose Language">
                                            {{-- <option disabled selected>Single Option</option> --}}
                                            <option value="vi">Vietnamese</option>
                                            <option value="en">English</option>
                                            <option value="jp">Japanese</option>
                                            <option value="Korean">Korean</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection