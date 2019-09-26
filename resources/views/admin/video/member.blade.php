@extends('admin.master')

@section('title','Personal video')

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
                {!! make_personal_video_data_table() !!}
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

        $('#personal').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.video.member') !!}',
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [
                { data: 'manga', name: 'manga' },
                { data: 'chapter', name: 'chapter' },
                { data: 'video', name: 'video' },
                { data: 'publish', name: 'publish' },
                {
                    data: 'status',
                    className:"text-center",
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