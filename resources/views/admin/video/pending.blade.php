@extends('admin.master')

@section('title','Pending video')

@section('content')
<div class="content">
    <div class="container-fluid">
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto justify-content-center">
                <div class="alert alert-danger alert-dismissible fade show errorAlert" id="errorAlert" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
        @endif

        <div class="row">
            <div class="col-md-12">
                {!! make_pending_video_data_table() !!}
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

        $('#pending').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.video.pending') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'manga', name: 'manga' },
                { data: 'chapter', name: 'chapter' },
                { data: 'uploaded_by', name: 'uploaded_by' },
                { data: 'created_at', name: 'created_at' },
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
                        url:'{!! route('api.video.lists.remove') !!}',
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