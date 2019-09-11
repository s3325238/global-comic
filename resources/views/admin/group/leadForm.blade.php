@extends('admin.master')

@section('title','Add new leader')

@push('customJs')
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    function forEachResponse(target, response) {

        if (response !== null) {
            $(target).prop('disabled', false);
            emptyRefreshDisabled(target, '1');

            $.each(response, function (key, value) {
                $(target).append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            emptyRefreshDisabled(target, '2');

        } else {
            emptyRefreshDisabled(target, '4');
        }

    }

    function removeDisable(target) {
        $(target).prop('disabled', false);
    }

    function emptyRefreshDisabled(target, caseType) {
        if (caseType === "1") {
            // only empty
            $(target).empty();
        } else if (caseType === "2") {
            // only refresh
            $(target).selectpicker('refresh');
        } else if (caseType === "3") {
            // Only disable
            $(target).prop('disabled', true);
        } else {
            $(target).empty();
            $(target).prop('disabled', true);
            $(target).selectpicker('refresh');
        }
    }
    // error(function (jqXHR, textStatus, errorThrown) {
    
    // alert(formatErrorMessage(jqXHR, errorThrown));

    // }
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
    $(document).ready(function() {
        emptyRefreshDisabled('#group_name','4');
        emptyRefreshDisabled('#group_leader','4');

        $('#group_language').change(function(){
            emptyRefreshDisabled('#group_leader','4')
            var language = $(this).val();
            var token = $("input[name='_token']").val();

            $.ajax({
                url: '{!! route('loadGroups') !!}' ,
                method: 'GET',
                dataType: 'json',
                data: {
                    language: language,
                },
                success: function(data){
                    forEachResponse('#group_name', data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
    
                    alert(formatErrorMessage(jqXHR, errorThrown));

                }
            });
        });

        $('#group_name').change(function(){
            var language = $('#group_language').val();
            // alert(lang);

            $.ajax({
                url: '{!! route('loadLeaders') !!}' ,
                method: 'GET',
                dataType: 'json',
                data: {
                    language: language,
                },
                success: function(data){
                    forEachResponse('#group_leader', data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
    
                    alert(formatErrorMessage(jqXHR, errorThrown));

                }
            });
        });

        $(".errorAlert").fadeTo(2000, 700).slideUp(700, function(){
            $(".errorAlert").slideUp(700);
        });
    })
</script>
@endpush

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
        <form action="{{ route('updateLeader') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text">
                                <h4 class="card-title">Language</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <select class="selectpicker" id="group_language" name="group_language"
                                data-style="btn btn-primary btn-round" data-width="100%" title="Choose Language">
                                {{-- <option disabled selected>Single Option</option> --}}
                                <option value="vi">Vietnamese</option>
                                <option value="en">English</option>
                                <option value="jp">Japanese</option>
                                <option value="kr">Korean</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    @include('admin.group.lead_section.group')
                </div>
                <div class="col-md-4 col-sm-12">
                    {{-- @include('admin.group.lead_section.leader') --}}
                    <div class="card">
                        <div class="card-header card-header-text card-header-success">
                            <div class="card-text">
                                <h4 class="card-title">Leader</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <select class="selectpicker group_leader" id="group_leader" data-live-search="true" name="group_leader"
                                data-style="btn btn-primary btn-round" data-width="100%" title="Choose Leader">
                                <option disabled selected> Choose Leader</option>
                                {{-- @foreach ($leaders as $leader)
                                    <option value="{{ $leader->id }}">
                                        {{ $leader->name }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>&nbsp;&nbsp;Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection