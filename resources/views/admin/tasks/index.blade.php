@extends('admin.master')

@section('title','Tasks Management')

@push('customJs')
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @include('admin.tasks.include.create')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    @include('admin.tasks.include.personal')
                </div>
                <div class="col-lg-6 col-md-12">
                    @include('admin.tasks.include.member')
                </div>
            </div>
        </div>
    </div>
@endsection