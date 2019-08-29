@extends('ui.pages.master')

@section('title','Translate Group')

@section('detail-title','Translate Group')

@section('content')
@include('ui.pages.partials._header')
<div class="main main-raised">
    <div class="section">
        <div class="container">
            <h2 class="section-title">All active group</h2>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="{{ route('singleGroup') }}">
                                <img src="{{ url('/img/group-logo/hamtruyen-logo.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">
                                <a href="#pablo">300*300</a>
                            </h4>
                            <p class="card-description">Display 8 groups and paginate.<br />Mobile version will be
                                slider</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="../assets/img/examples/dolce.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                silhouette. Team
                                it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new">€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose"
                                    data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="../assets/img/examples/tom-ford.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                silhouette. Team
                                it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new"> &nbsp;€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose"
                                    data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="../assets/img/examples/tom-ford.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                silhouette. Team
                                it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new"> &nbsp;€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose"
                                    data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End first row -->
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="{{ route('singleGroup') }}">
                                <img src="{{ url('/img/group-logo/hamtruyen-logo.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">
                                <a href="#pablo">300*300</a>
                            </h4>
                            <p class="card-description">Display 8 groups and paginate.<br />Mobile version will be
                                slider</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="{{ route('singleGroup') }}">
                                <img src="{{ url('/img/group-logo/hamtruyen-logo.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">
                                <a href="#pablo">300*300</a>
                            </h4>
                            <p class="card-description">Display 8 groups and paginate.<br />Mobile version will be
                                slider</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="{{ route('singleGroup') }}">
                                <img src="{{ url('/img/group-logo/hamtruyen-logo.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">
                                <a href="#pablo">300*300</a>
                            </h4>
                            <p class="card-description">Display 8 groups and paginate.<br />Mobile version will be
                                slider</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="{{ route('singleGroup') }}">
                                <img src="{{ url('/img/group-logo/hamtruyen-logo.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">
                                <a href="#pablo">300*300</a>
                            </h4>
                            <p class="card-description">Display 8 groups and paginate.<br />Mobile version will be
                                slider</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ml-auto mr-auto text-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <h2 class="section-title">Ranking board</h2>
            <div class="row">
                <div class="col-lg-2 col-md-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="{{ route('singleGroup')}}">
                                <img src="{{ url('/img/group-logo/hamtruyen-logo.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">HAMTRUYEN</h4>
                            <p class="card-description">Width: 300px & Height: 300px</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="../assets/img/examples/tom-ford.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">TRUYỆN SIÊU HAY</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                silhouette. Team
                                it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new"> &nbsp;€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose"
                                    data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="../assets/img/examples/tom-ford.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                silhouette. Team
                                it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new"> &nbsp;€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose"
                                    data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="../assets/img/examples/tom-ford.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                silhouette. Team
                                it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new"> &nbsp;€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose"
                                    data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 mr-auto ml-auto">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="../assets/img/examples/tom-ford.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp
                                silhouette. Team
                                it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new"> &nbsp;€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose"
                                    data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng xếp hạng -->

</div>
@endsection