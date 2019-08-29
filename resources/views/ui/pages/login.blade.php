@extends('ui.pages.master')

@section('title','Login')

@section('class','login-page')

@section('content')
<div class="page-header header-filter"
    style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto justify-content-center">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registered Successfully! </strong> Please confirm your email!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="" action="">
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
                                    <input type="email" class="form-control" placeholder="Email...">
                                </div>
                            </span>
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password...">
                                </div>
                            </span>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-rose btn-link btn-lg">
                                Login
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