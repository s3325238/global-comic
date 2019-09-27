@extends('admin.master')

@section('title','Permission List')

@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">
                                    format_list_bulleted
                                </i>
                            </div>
                            <h4 class="card-title">Permission Lists</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                <a href="{{ route('permission.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Add new
                                </a>
                            </div>
                            <br>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>

                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>

                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
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
            $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('api.permission.lists') !!}',
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                columns: [
                    { data: 'role_name', name: 'role_name' },
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
                            url:'{!! route('api.permission.lists.remove') !!}',
                            method: "GET" ,
                            data:{
                                id:id
                            },
                            success:function(data)
                            {
                                console.log(data);

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