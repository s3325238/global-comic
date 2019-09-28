@extends('admin.master')

@section('title','Active User Lists Management')

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
                                <a class="nav-link active" href="#un_verified" data-toggle="tab">Not verified</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#vietnamese" data-toggle="tab">Vietnamese</a>
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
                    <div class="tab-pane active" id="un_verified">
                        {!! make_user_data_table('notactive') !!}
                    </div>
                    <div class="tab-pane" id="vietnamese">
                        {!! make_user_data_table('vi') !!}
                    </div>
                    <div class="tab-pane" id="english">
                        {!! make_user_data_table('en') !!}
                    </div>
                    <div class="tab-pane" id="japanese">
                        {!! make_user_data_table('jp') !!}
                    </div>
                    <div class="tab-pane" id="korean">
                        {!! make_user_data_table('kr') !!}
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
        var url;

        if (target == 'vi') {
            url = '{!! route('api.user.table','vi') !!}';
        } else if (target == 'en') {
            url = '{!! route('api.user.table','en') !!}';
        } else if (target == 'jp') {
            url = '{!! route('api.user.table','jp') !!}';
        } else if (target == 'kr') {
            url = '{!! route('api.user.table','kr') !!}';
        } else {
            url = '{!! route('api.user.not.verified') !!}';
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
    }

    $(document).ready(function () {
        table_view('vi');
        table_view('en');
        table_view('jp');
        table_view('kr');
        table_view('notactive');

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