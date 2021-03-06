@extends('admin.master')

@section('title','Activity Logs')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-nav-tabs card-plain">
                    <div class="card-header card-header-primary">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#user_logs" data-toggle="tab">User Logs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#other_logs" data-toggle="tab">Other Logs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tab-content">
                            <div class="tab-pane active" id="user_logs">
                                {!! make_log_data_table('userLogs') !!}
                            </div>
                            <div class="tab-pane" id="other_logs">
                                {!! make_causer_log_data_table('otherLogs') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('customJs')
<script src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('admin/js/plugins/jquery.validate.min.js') }}"></script>

<script src="{{asset('admin/js/select-notify-sweet.min.js')}}"></script>

<script type="text/javascript">
    function table_view(target) {

        var url = '';

        if (target == 'userLogs') {
            url = '{!! route('api.log.model',['user','App\User']) !!}';
        } else if (target == 'otherLogs') {
            url = '{!! route('api.log.model',['other','App\User']) !!}';
        }


        $('#'+target).DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'description', name: 'description' },
                { data: 'updated_at', name: 'updated_at' },
                {
                    data: 'action',
                    className:"text-center",
                    orderable:false,
                    searchable: false
                },
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        })
    };
    $(document).ready(function () {
        table_view('userLogs');

        $('#otherLogs').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.log.model',['other','App\User']) !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'description', name: 'description' },
                { data: 'causer', name: 'causer' },
                { data: 'updated_at', name: 'updated_at' },
                {
                    data: 'action',
                    className:"text-center",
                    orderable:false,
                    searchable: false
                },
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        })
    });
</script>
@endpush