@extends('admin.master')

@section('title','Add new permission')

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
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        {{-- <div class="col-md-12"> --}}
        <div class="row">
            <form action="{{ route('permission.store') }}" method="{{ "POST" }}">
                @csrf
                <div class="col-md-12" style="width:100%">
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">General Input</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <label class="col-sm-1 col-form-label">ID</label>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="id" placeholder="ID number..."
                                            value="{{ old('id') }}">
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Permission Name</label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="role_name"
                                            placeholder="Permission name..." value="{{ old('role_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Access Permission</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    @include('admin.permission.access_pills.manga_permission')
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    @include('admin.permission.access_pills.group_permission')
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    @include('admin.permission.access_pills.user_permission')
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    @include('admin.permission.access_pills.video_permission')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @include('admin.permission.access_pills.other_permission')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-lg"><i
                            class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                </div>
            </form>
        </div>
        {{-- </div> --}}
    </div>
</div>
@endsection