@extends('ui.pages.master')

@section('title','Login')

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
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card card-login card-hidden">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Login</h4>
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

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </span>
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password...">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </span>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-rose btn-link btn-lg">
                                Sign in
                            </button>
                        </div>
                        <hr>
                        <div class="card-footer justify-content-center">
                            <a href="#pablo" class="btn btn-danger btn-link btn-lg btn-block">Forgot your password?</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection