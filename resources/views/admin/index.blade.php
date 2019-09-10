@extends('admin.master')

@section('title','Dashboard')

@push('customJs')
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('admin/js/plugins/moment.min.js') }}"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('admin/js/plugins/chartist.min.js') }}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{ asset('admin/js/plugins/jquery-jvectormap.js') }}"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('admin/js/plugins/arrive.min.js') }}"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>
@endpush

@section('content')

<div class="content">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <p class="card-category">
                                Tasks
                            </p>
                            <h3 class="card-title">0</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="#pablo">See more....</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <p class="card-category">
                                Tasks
                            </p>
                            <h3 class="card-title">Number</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="#pablo">See more....</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <p class="card-category">
                                Tasks
                            </p>
                            <h3 class="card-title">Number</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="#pablo">See more....</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <p class="card-category">
                                Tasks
                            </p>
                            <h3 class="card-title">0</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-info">info</i>
                                <a href="#pablo">See more....</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-text card-header-warning">
                            <div class="card-text">
                            <h4 class="card-title">Employees Stats</h4>
                            <p class="card-category">New employees on 15th September, 2016</p>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                    <th>Country</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                        <td>Niger</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Minerva Hooper</td>
                                        <td>$23,789</td>
                                        <td>Curaçao</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sage Rodriguez</td>
                                        <td>$56,142</td>
                                        <td>Netherlands</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Philip Chaney</td>
                                        <td>$38,735</td>
                                        <td>Korea, South</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-text card-header-warning">
                            <div class="card-text">
                            <h4 class="card-title">Employees Stats</h4>
                            <p class="card-category">New employees on 15th September, 2016</p>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                    <th>Country</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                        <td>Niger</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Minerva Hooper</td>
                                        <td>$23,789</td>
                                        <td>Curaçao</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sage Rodriguez</td>
                                        <td>$56,142</td>
                                        <td>Netherlands</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Philip Chaney</td>
                                        <td>$38,735</td>
                                        <td>Korea, South</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @can('isAdmin', Auth::user())
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-rose" data-header-animation="true">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                            </div>
                            <div class="card-body">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-info btn-link" rel="tooltip"
                                        data-placement="bottom" title="Refresh">
                                        <i class="material-icons">refresh</i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-link" rel="tooltip"
                                        data-placement="bottom" title="Change Date">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                                <h4 class="card-title">Website Views</h4>
                                <p class="card-category">Last Campaign Performance</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-success" data-header-animation="true">
                                <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                            <div class="card-body">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-info btn-link" rel="tooltip"
                                        data-placement="bottom" title="Refresh">
                                        <i class="material-icons">refresh</i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-link" rel="tooltip"
                                        data-placement="bottom" title="Change Date">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                                <h4 class="card-title">Daily Sales</h4>
                                <p class="card-category">
                                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span>
                                    increase in today sales.</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> updated 4 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-chart">
                            <div class="card-header card-header-info" data-header-animation="true">
                                <div class="ct-chart" id="completedTasksChart"></div>
                            </div>
                            <div class="card-body">
                                <div class="card-actions">
                                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                        <i class="material-icons">build</i> Fix Header!
                                    </button>
                                    <button type="button" class="btn btn-info btn-link" rel="tooltip"
                                        data-placement="bottom" title="Refresh">
                                        <i class="material-icons">refresh</i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-link" rel="tooltip"
                                        data-placement="bottom" title="Change Date">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </div>
                                <h4 class="card-title">Completed Tasks</h4>
                                <p class="card-category">Last Campaign Performance</p>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>User Statistic</h3>
                <br>
                <div class="row">
                    @foreach ($users_by_language as $single)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="fas fa-user-tag"></i>
                                    </div>
                                    <p class="card-category">
                                        @switch($single->language)
                                            @case('en')
                                                {{ "English" }}
                                                @break
                                            @case("vi")
                                                {{ "Vietnamese" }}
                                                @break
                                            @case("vi")
                                                {{ "Vietnamese" }}
                                                @break
                                            @case("jp")
                                                {{ "Japanese" }}
                                                @break
                                            @case("kr")
                                                {{ "Korean" }}
                                                @break
                                        @endswitch
                                    </p>
                                    <h3 class="card-title">{{ $single->total }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="#pablo">Get More Space...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <p class="card-category">
                                    User type
                                </p>
                                <h3 class="card-title">Manga->Group->Copyright</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    <a href="#pablo">Get More Space...</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <p class="card-category">
                                    User type
                                </p>
                                <h3 class="card-title">Statistic</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    <a href="#pablo">Get More Space...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons"></i>
                            </div>
                            <h4 class="card-title">Global Sales by Top Locations</h4>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive table-sales">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="../assets/img/flags/US.png" </div> </td> <td>USA
                                                    </td>
                                                    <td class="text-right">
                                                        2.920
                                                    </td>
                                                    <td class="text-right">
                                                        53.23%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="../assets/img/flags/DE.png" </div> </td>
                                                                <td>Germany
                                                    </td>
                                                    <td class="text-right">
                                                        1.300
                                                    </td>
                                                    <td class="text-right">
                                                        20.43%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="../assets/img/flags/AU.png" </div> </td>
                                                                <td>Australia
                                                    </td>
                                                    <td class="text-right">
                                                        760
                                                    </td>
                                                    <td class="text-right">
                                                        10.35%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="../assets/img/flags/GB.png" </div> </td>
                                                                <td>United Kingdom
                                                    </td>
                                                    <td class="text-right">
                                                        690
                                                    </td>
                                                    <td class="text-right">
                                                        7.87%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="../assets/img/flags/RO.png" </div> </td>
                                                                <td>Romania
                                                    </td>
                                                    <td class="text-right">
                                                        600
                                                    </td>
                                                    <td class="text-right">
                                                        5.94%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flag">
                                                            <img src="../assets/img/flags/BR.png" </div> </td>
                                                                <td>Brasil
                                                    </td>
                                                    <td class="text-right">
                                                        550
                                                    </td>
                                                    <td class="text-right">
                                                        4.34%
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 ml-auto mr-auto">
                                    <div id="worldMap" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
            <h3>Manage Listings</h3>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-product">
                        <div class="card-header card-header-image" data-header-animation="true">
                            <a href="#pablo">
                                <img class="img" src="../assets/img/card-2.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-actions text-center">
                                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>
                                <button type="button" class="btn btn-default btn-link" rel="tooltip"
                                    data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                </button>
                                <button type="button" class="btn btn-success btn-link" rel="tooltip"
                                    data-placement="bottom" title="Edit">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-link" rel="tooltip"
                                    data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <h4 class="card-title">
                                <a href="#pablo">Cozy 5 Stars Apartment</a>
                            </h4>
                            <div class="card-description">
                                The place is close to Barceloneta Beach and bus stop just 2 min by walk and near
                                to "Naviglio" where you can enjoy the main night life in Barcelona.
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="price">
                                <h4>$899/night</h4>
                            </div>
                            <div class="stats">
                                <p class="card-category"><i class="material-icons">place</i> Barcelona, Spain
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-product">
                        <div class="card-header card-header-image" data-header-animation="true">
                            <a href="#pablo">
                                <img class="img" src="../assets/img/card-3.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-actions text-center">
                                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>
                                <button type="button" class="btn btn-default btn-link" rel="tooltip"
                                    data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                </button>
                                <button type="button" class="btn btn-success btn-link" rel="tooltip"
                                    data-placement="bottom" title="Edit">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-link" rel="tooltip"
                                    data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <h4 class="card-title">
                                <a href="#pablo">Office Studio</a>
                            </h4>
                            <div class="card-description">
                                The place is close to Metro Station and bus stop just 2 min by walk and near to
                                "Naviglio" where you can enjoy the night life in London, UK.
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="price">
                                <h4>$1.119/night</h4>
                            </div>
                            <div class="stats">
                                <p class="card-category"><i class="material-icons">place</i> London, UK</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-product">
                        <div class="card-header card-header-image" data-header-animation="true">
                            <a href="#pablo">
                                <img class="img" src="../assets/img/card-1.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-actions text-center">
                                <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                </button>
                                <button type="button" class="btn btn-default btn-link" rel="tooltip"
                                    data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                </button>
                                <button type="button" class="btn btn-success btn-link" rel="tooltip"
                                    data-placement="bottom" title="Edit">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-link" rel="tooltip"
                                    data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <h4 class="card-title">
                                <a href="#pablo">Beautiful Castle</a>
                            </h4>
                            <div class="card-description">
                                The place is close to Metro Station and bus stop just 2 min by walk and near to
                                "Naviglio" where you can enjoy the main night life in Milan.
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="price">
                                <h4>$459/night</h4>
                            </div>
                            <div class="stats">
                                <p class="card-category"><i class="material-icons">place</i> Milan, Italy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection