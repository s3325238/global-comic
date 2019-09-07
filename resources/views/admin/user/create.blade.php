@extends('admin.master')

@section('title','Add new user')

@push('customJs')
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
@endpush

@section('content')
{{-- <div class="content"> --}}
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
        <div class="row ">
            <form action="" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="card w-100">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">General Input</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Username">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card w-100">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Detail Information</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {{-- <div class="form-group"> --}}
                                    {{-- <label for="language" class="col-md-6 col-sm-6">Language</label> --}}
                                    {{-- <div class="col-md-6 col-sm-6"> --}}
                                        <select class="selectpicker form-control" name="language" id="language" title="Select language" data-style="btn btn-primary btn-round">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                    {{-- </div> --}}
                                    
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- </div> --}}
@endsection