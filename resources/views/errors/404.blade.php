@extends('ui.pages.master')

@section('title','Error')

@section('class','error-page')

@section('content')


<div class="page-header error-page header-filter" style="background-image: url('/img/404.jpg')">
    <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">404</h1>
                <h2 class="description">Page not found :(</h2>
                <h4 class="description">Ooooups! Looks like you got lost.</h4>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-home"></i>&nbsp;Back To home
                </a>
            </div>
        </div>
    </div>
</div>


@endsection