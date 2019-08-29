@extends('ui.pages.master')
<!-- Display name of manga -->
@section('title','Manga Name')

{{-- @section('detail-title','Manga Name') --}}
@section('detail-title')
    <h1>Manga Name</h1>
    <h2>Chapter 10000</h2>
@endsection

@section('class','section-page')

@section('content')
@include('ui.pages.partials._header')
<div class="main main-raised">
    <div class="section">
        <div class="container">
            <div class="row">
                <button class="btn btn-primary btn-danger text-center ml-auto mr-auto">
                    <h4>
                        <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;Report&nbsp;&nbsp;<i
                            class="fas fa-exclamation-triangle"></i>
                    </h4>
                </button>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <form action="" class="">
                        <div class="form-row">
                            <div class="form-group col-lg-3 col-md-3">
                                <button class="btn btn-primary btn-success">
                                    <i class="fas fa-arrow-left"></i>
                                </button>
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <select class="selectpicker" data-width="100%" data-style="select-with-transition"
                                    title="Single Select" data-size="7">
                                    <option disabled>Choose city</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-3">
                                <button class="btn btn-primary btn-success">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <!-- foreach from database -->
            <div class="row">
                <img src="{{ url('/img/test-image/Kingdom6110909.jpg') }}" class="text-center ml-auto mr-auto" alt="">
            </div>
            <br>
            <div class="row">
                <img src="{{ url('/img/test-image/Kingdom6110909.jpg') }}" class="text-center ml-auto mr-auto" alt="">
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <form action="" class="">
                        <div class="form-row">
                            <div class="form-group col-lg-3 col-md-3">
                                <button class="btn btn-primary btn-success">
                                    <i class="fas fa-arrow-left"></i>
                                </button>
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <select class="selectpicker" data-width="100%" data-style="select-with-transition"
                                    title="Single Select" data-size="7">
                                    <option disabled>Choose city</option>
                                    <option value="2">Foobar</option>
                                    <option value="3">Is great</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-3">
                                <button class="btn btn-primary btn-success">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection