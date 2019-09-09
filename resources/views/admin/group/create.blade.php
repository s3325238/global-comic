@extends('admin.master')

@section('title','Add new group')

@push('customJs')
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
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

        <form action="#" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-rose">
                            General Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Group Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Slug</label>
                                        <input type="text" name="slug" disabled class="form-control" />
                                    </div>
                                </div>
                            </div>
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
                        <div class="card-body">
                            <table class="table customTableBorder" cellspacing="0" cellpadding="0" style="border:none;">
                                <tr>
                                    <td>Translate Language</td>
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