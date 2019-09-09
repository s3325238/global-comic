@extends('admin.master')

@section('title','Add new user')

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
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-nav-tabs">
                        <div class="card-header card-header-rose">
                            General Information
                        </div>
                        <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Username</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email address</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
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
                                    <td >Status</td>
                                    <td >
                                        <select class="selectpicker" name="status" data-style="btn btn-primary btn-round" title="Choose Status">
                                            {{-- <option disabled selected>Single Option</option> --}}
                                            <option value="1">Activate</option>
                                            <option value="0">Deactivate</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr >
                                    <td >Permission</td>
                                    <td >
                                        <select class="selectpicker" name="role" data-style="btn btn-primary btn-round" title="Choose Permission">
                                            {{-- <option disabled selected>Single Option</option> --}}
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr >
                                        <td >Language</td>
                                        <td >
                                            <select class="selectpicker" name="language" data-style="btn btn-primary btn-round" title="Choose Language">
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

@push('customJs')
    <script>
        $(document).ready(function() {
            $(".errorAlert").fadeTo(2000, 700).slideUp(700, function(){
                $(".errorAlert").slideUp(700);
            });
        });
    </script>
@endpush