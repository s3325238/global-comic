@extends('ui.pages.master')

@section('title','Single group')

@section('detail-title','Group Name')

@section('content')
@include('ui.pages.partials._header')
<div class="main main-raised">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 mr-auto ml-auto">
                    <div class="row">
                        <div class="mr-auto ml-auto text-center">
                            <img src="{{ url('/img/group-logo/hamtruyen-logo.jpg') }}" width="100%" height="100%"
                                alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-auto text-center">
                            <h3>Width: 300px; height 300px</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-auto text-center">
                            <h4>Ranking points: 1000</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <button class="btn btn-primary btn-round btn-block mr-auto ml-auto">
                                <i class="material-icons">favorite</i> Follow
                            </button>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <button class="btn btn-primary btn-round btn-block mr-auto ml-auto">
                                <i class="fas fa-dollar-sign"></i> Donate
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="card">
                            <div class="card-header card-header-text card-header-success">
                                <div class="card-text">
                                    <h4 class="card-title">Here is the Text</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ url('/img/backEnd/user/avatar/avatar.jpg') }}" alt="Circle Image"
                                            class="rounded-circle img-fluid" style="width:30px; height:30px">
                                        <span>&nbsp; Donator # 1</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <span>1000 points <span class="badge badge-success">+40%</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ url('/img/backEnd/user/avatar/avatar.jpg') }}" alt="Circle Image"
                                            class="rounded-circle img-fluid" style="width:30px; height:30px">
                                        <span>&nbsp; Donator # 2</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <span>600 points <span class="badge badge-success">+30%</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ url('/img/backEnd/user/avatar/avatar.jpg') }}" alt="Circle Image"
                                            class="rounded-circle img-fluid" style="width:30px; height:30px">
                                        <span>&nbsp; Donator # 3</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <span>300 points <span class="badge badge-success">+20%</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ url('/img/backEnd/user/avatar/avatar.jpg') }}" alt="Circle Image"
                                            class="rounded-circle img-fluid" style="width:30px; height:30px">
                                        <span>&nbsp; Donator # 4</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <span>200 points <span class="badge badge-success">+10%</span></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ url('/img/backEnd/user/avatar/avatar.jpg') }}" alt="Circle Image"
                                            class="rounded-circle img-fluid" style="width:30px; height:30px">
                                        <span>&nbsp; Donator # 5</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <span>100 points <span class="badge badge-success">+5%</span></span>
                                    </div>
                                </div>
                                {{-- This place will display top donator with points --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="col-lg-8 col-md-8 mr-auto ml-auto">
                    <div class="row">
                        <div class="card card-nav-tabs card-plain">
                            <div class="card-header card-header-primary">
                                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#home" data-toggle="tab">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#video" data-toggle="tab">Video</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#playlist" data-toggle="tab">Playlist</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#manga" data-toggle="tab">Manga List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#recruitment"
                                                    data-toggle="tab">Recruitment</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body ">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">
                                        @include('ui.pages.group.nav-pills.home-pills')
                                    </div>
                                    <div class="tab-pane" id="video">
                                        @include('ui.pages.group.nav-pills.video-pills')
                                    </div>
                                    <div class="tab-pane" id="playlist">
                                        @include('ui.pages.group.nav-pills.playlist-pills')
                                    </div>
                                    <div class="tab-pane" id="manga">
                                        @include('ui.pages.group.nav-pills.manga-list-pills')
                                    </div>
                                    <div class="tab-pane" id="recruitment">
                                        @include('ui.pages.group.nav-pills.recruitment-pills')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection