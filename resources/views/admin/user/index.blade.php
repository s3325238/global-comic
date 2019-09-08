@extends('admin.master')

@section('title','User Lists Management')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-primary">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#vietnamese" data-toggle="tab">Vietnamese</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#english" data-toggle="tab">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#japanese" data-toggle="tab">Japanese</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#korean" data-toggle="tab">Korean</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="tab-content">
                    <div class="tab-pane active" id="vietnamese">
                        @include('admin.user.tab_pills.vietnamese_tab')
                        {{-- @include('admin.user.tab_pills.english_tab') --}}
                    </div>
                    <div class="tab-pane" id="english">
                        @include('admin.user.tab_pills.english_tab')
                        {{-- @include('admin.user.tab_pills.vietnamese_tab') --}}
                    </div>
                    <div class="tab-pane" id="japanese">
                        @include('admin.user.tab_pills.japanese_tab')
                    </div>
                    <div class="tab-pane" id="korean">
                        @include('admin.user.tab_pills.korean_tab')
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
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
<!-- Plugin for Sweet Alert -->
<script src="{{ asset('admin/js/plugins/sweetalert2.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#vi').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.user.vietnamese') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
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
        });

        $('#en').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.user.english') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
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
        });

        $('#jp').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.user.japanese') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
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
        });

        $('#kr').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.user.korean') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
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
        });

    });

    // Delete a record
    $(document).on('click', '.remove', function(e){

        e.preventDefault();

        var id = $(this).attr('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                // console.log(id);
                Swal.fire(
                    {
                        type: 'success',
                        title: 'Successfully delete data!',
                        html: '<span class="text-success">Your page will be refreshed shortly.</span>',
                        showConfirmButton: false,
                    },
                    $.ajax({
                        url:'{!! route('api.user.lists.remove') !!}',
                        method: "GET" ,
                        data:{
                            id:id
                        },
                        success:function(data)
                        {
                            // console.log(data);

                            location.reload();
                        }
                    })
                )
            }else if (result.dismiss === Swal.DismissReason.cancel) {
                // Cancel button is pressed
                Swal.fire({
                    type: 'info',
                    title: 'Your data is safe!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });

});
</script>
@endpush