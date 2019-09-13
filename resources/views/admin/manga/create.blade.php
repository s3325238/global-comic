@extends('admin.master')

@section('title','Add new group')

@push('customJs')
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>
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

        <form action="{{ route('manga.store') }}" enctype="multipart/form-data" method="post">
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
                                    <td>Manga Title</td>
                                    <td>
                                        <input type="text" id="manga_title" name="manga_title" value="{{ old('manga_title') }}" class="form-control">
                                    </td>
                                </tr>
                                <tr hidden>
                                    <td>Slug</td>
                                    <td>
                                        <input type="text" id="slug" name="slug" placeholder="slug" readonly class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Translate Language</td>
                                    <td>
                                        <select class="selectpicker" name="language"
                                            data-style="btn btn-primary btn-round" data-width="100%" title="Choose Language">
                                            {{-- <option disabled selected>Single Option</option> --}}
                                            <option value="vi">Vietnamese</option>
                                            <option value="en">English</option>
                                            <option value="jp">Japanese</option>
                                            <option value="Korean">Korean</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
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
                            Detail Information
                        </div>
                        <div class="card-body text-center">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-raised">
                                    <img src="{{ asset('upload/group/default.png') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                <div>
                                    <span class="btn btn-raised btn-round btn-rose btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="logo" />
                                    </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                        <i class="fa fa-times"></i> Remove</a>
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
<script>
    $('#manga_title').change(function(e) {
        $.get('{{ route('check_slug') }}', 
        { 
            'manga_title': $(this).val() 
        }, 
        function( data ) {
            $('#slug').val(data.slug);
        }
        );
    });

    $(document).ready(function() {
        $(".errorAlert").fadeTo(2000, 700).slideUp(700, function(){
            $(".errorAlert").slideUp(700);
        });
    });
</script>
@endpush