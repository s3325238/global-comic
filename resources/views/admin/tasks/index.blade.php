@extends('admin.master')

@section('title','Tasks Management')

@section('content')
<div class="content">
    <div class="container-fluid">
        <img src="" alt="">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @include('admin.tasks.include.create')
            </div>
            {{-- <button type="submit"></button> --}}
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                @include('admin.tasks.include.personal')
            </div>
            <div class="col-lg-6 col-md-12">
                @include('admin.tasks.include.member')
            </div>
        </div>
    </div>
</div>
@endsection

@push('customJs')
<script src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('admin/js/plugins/jquery.validate.min.js') }}"></script>w
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#personal').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.task.personal') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5,10, 25, 50, -1],
                [5,10, 25, 50, "All"]
            ],
            columns: [
                { data: 'description', name: 'description' },
                { data: 'priority', name: 'priority', },
                { data: 'assigned', name: 'assigned', },
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
        });

        $('#member').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.task.member') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5,10, 25, 50, -1],
                [5,10, 25, 50, "All"]
            ],
            columns: [
                { data: 'description', name: 'description' },
                { data: 'priority', name: 'priority', },
                { data: 'assigned', name: 'assigned', },
                {
                    data: 'status',
                    className:"text-center",
                    // orderable:false,
                    // searchable: false
                },
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    });
</script>
@endpush