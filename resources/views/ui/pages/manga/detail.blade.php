@extends('ui.pages.master')

@section('title','Manga Detail')

{{-- @section('detail-title','Manga Detail') --}}

@section('class','product-page')

@section('content')
@include('ui.pages.partials._header')

<div class="section">
    <div class="container">
        <div class="main main-raised">
            <div class="row">
                <div class="col-md-6 col-sm-6 text-center">
                    <img src="{{ url('/img/frontEnd/detail-manga/product2.jpg') }}">
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2 class="title"> width:300, height:450 </h2>
                    {{-- <h3 class="main-price">$335</h3> --}}
                    <div id="accordion" role="tablist">
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Description
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    @include('ui.pages.manga.partials._description')
                                </div>
                            </div>
                        </div>
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Manga Detail
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                        @include('ui.pages.manga.partials._manga-detail')
                                </div>
                            </div>
                        </div>
                        <div class="card card-collapse">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" href="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Chapter
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <!-- 31 Chapter -->
                                    <!-- href = link to corresponding chapter -->
                                    @for ($i = 1; $i <= 31; $i++) 
                                        <a href="{{ route('chapter') }}" class="btn btn-success btn-round btn-sm">
                                            Ch {!! $i !!}
                                        </a>
                                    @endfor
                                        <nav aria-label="Page navigation ml-auto mr-auto text-center col-md-8" style="margin-top:20px">
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">1 <span
                                                            class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row pull-right">
                        <button class="btn btn-rose btn-round">Read &#xA0;
                            <i class="fas fa-book"></i>
                        </button>
                    </div> --}}
                </div>
            </div>
        </div>
        @include('ui.pages.manga.same-genre')
        @include('ui.pages.manga.partials._same-group')
    </div>
</div>
@endsection