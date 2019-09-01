@extends('ui.pages.master')

@push('head')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endpush

@section('title','Password Reset Link')

@section('class','login-page')

@section('content')


<div class="page-header header-filter"
    style="background-image: url('/img/frontEnd/auth-background/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        @if (Session::has('status'))
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto justify-content-center">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('status') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
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
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="card card-login card-hidden">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Reset Password</h4>
                        </div>
                        <div class="card-body ">
                            <!-- <p class="card-description text-center">Or Be Classical</p> -->
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">email</i>
                                        </span>
                                    </div>
                                    {{-- <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email..."> --}}
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email...">

                                    {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}
                                </div>
                            </span>
                            <span class="bmd-form-group">
                                <div class="input-group row">
                                    <div class="col-md-8">
                                        <div class="g-recaptcha" data-sitekey="{{ $key }}"></div>
                                    </div>
                                </div>
                            </span>
                        </div>

                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-rose btn-link">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    @endsection