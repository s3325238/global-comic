@extends('ui.pages.master')

@section('title','Sign up')

@section('class','signup-page')

@section('content')
<div class="page-header header-filter" filter-color="purple"
    style="background-image: url('/img/frontEnd/auth-background/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <!-- Error display -->
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
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card card-signup">
                    <h2 class="card-title text-center">Sign up</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="info info-horizontal">
                                    <div class="icon icon-rose">
                                        <i class="material-icons">timeline</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">Marketing</h4>
                                        <p class="description">
                                            We've created the marketing campaign of the website. It was a very
                                            interesting collaboration.
                                        </p>
                                    </div>
                                </div>
                                <div class="info info-horizontal">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">code</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">Fully Coded in HTML5</h4>
                                        <p class="description">
                                            We've developed the website with HTML5 and CSS3. The client has access to
                                            the code using GitHub.
                                        </p>
                                    </div>
                                </div>
                                <div class="info info-horizontal">
                                    <div class="icon icon-info">
                                        <i class="material-icons">group</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">Built Audience</h4>
                                        <p class="description">
                                            There is also a Fully Customizable CMS Admin Dashboard for this product.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- register form start here -->
                            <div class="col-md-5 mr-auto">
                                <form class="form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">face</i>
                                                </span>
                                            </div>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="Display name...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">mail</i>
                                                </span>
                                            </div>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="Email...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <input type="password" name="password" placeholder="Password..."
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Confirm password..." class="form-control" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">language</i>
                                                </span>
                                            </div>
                                            <select class="form-control selectpicker" name="language"
                                                data-style="btn btn-link" id="exampleFormControlSelect1"
                                                data-width="85%">
                                                <option disabled>Choose which language to see</option>
                                                <option value="en">English</option>
                                                <option value="vi">Vietnamese</option>
                                                <option value="jp">日本人</option>
                                                <option value="kr">韓国語</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            I agree to the
                                            <a href="#something">terms and conditions</a>.
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-round">Sign up</button>
                                        {{-- <a href="#pablo" class="btn btn-primary btn-round">Sign up</a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection