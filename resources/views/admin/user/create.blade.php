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
        {{-- <div class="row">
            <div class="card card-nav-tabs">
                <div class="card-header card-header-rose">
                    General Information
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Username</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email address</label>
                                    <input type="email" class="form-control">
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
                    </form>
                </div>
            </div>
        </div> --}}
        <form action="#" method="post">
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
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email address</label>
                                            <input type="email" class="form-control">
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
                            <table class="table" cellspacing="0" cellpadding="0" style="border:none;">
                                <tr style="border: none;">
                                    <td style="border: none;">Status</td>
                                    <td style="border: none;">
                                        <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Status">
                                            {{-- <option disabled selected>Single Option</option> --}}
                                            <option value="2">Activate</option>
                                            <option value="3">Deactivate</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                    <td style="border: none;">Permission</td>
                                    <td style="border: none;">
                                        <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Permission">
                                            {{-- <option disabled selected>Single Option</option> --}}
                                            <option value="2">Foobar</option>
                                            <option value="3">Is great</option>
                                            <option value="4">Is awesome</option>
                                            <option value="5">Is wow</option>
                                            <option value="6">Boom !</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr style="border: none;">
                                        <td style="border: none;">Language</td>
                                        <td style="border: none;">
                                            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Choose Language">
                                                {{-- <option disabled selected>Single Option</option> --}}
                                                <option value="2">Foobar</option>
                                                <option value="3">Is great</option>
                                                <option value="4">Is awesome</option>
                                                <option value="5">Is wow</option>
                                                <option value="6">Boom !</option>
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