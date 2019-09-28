@extends('admin.master')

@section('title','Manga Management')

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
                                {!! make_manga_data_table('vi') !!}
                            </div>
                            <div class="tab-pane" id="english">
                                {!! make_manga_data_table('en') !!}
                            </div>
                            <div class="tab-pane" id="japanese">
                                {!! make_manga_data_table('jp') !!}
                            </div>
                            <div class="tab-pane" id="korean">
                                {!! make_manga_data_table('kr') !!}
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

        if (target == 'vi') {
            url = '{!! route('api.manga.table','vi') !!}';
        } else if (target == 'en') {
            url = '{!! route('api.manga.table','en') !!}';
        } else if (target == 'jp') {
            url = '{!! route('api.manga.table','jp') !!}';
        } else if (target == 'kr') {
            url = '{!! route('api.manga.table','kr') !!}';
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
        table_view('vi');
        table_view('en');
        table_view('jp');
        table_view('kr');
    });

    function formatErrorMessage(jqXHR, exception)
    {
        if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
        } else if (jqXHR.status == 404) {
            return ('The requested page not found.');
        }  else if (jqXHR.status == 401) {
            return ('Sorry!! You session has expired. Please login to continue access.');
        } else if (jqXHR.status == 500) {
            return ('Internal Server Error.');
        } else if (exception === 'parsererror') {
            return ('Requested JSON parse failed.');
        } else if (exception === 'timeout') {
            return ('Time out error.');
        } else if (exception === 'abort') {
            return ('Ajax request aborted.');
        } else {
            return ('Unknown error occured. Please try again.');
        }
    }

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
                        url:'{!! route('api.manga.table.lists.remove') !!}',
                        method: "GET" ,
                        data:{
                            id:id
                        },
                        success:function(data)
                        {
                            location.reload();
                        },
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