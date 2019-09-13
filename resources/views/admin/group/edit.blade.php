@extends('admin.master')

@section('title','Edit group')

@push('customJs')
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('admin/js/plugins/jasny-bootstrap.min.js')}}"></script>

<script>
    $('#name').change(function(e) {
        $.get('{{ route('check_slug') }}', 
        { 
            'name': $(this).val() 
        }, 
        function( data ) {
            $('#slug').val(data.slug);
        }
        );
    });

    $(document).ready(function() {
        $(".errorAlert").fadeTo(2000, 700).slideUp(700, function(){
            $(".errorAlert").slideUp(700);
        });
    });
</script>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto justify-content-center">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $error }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <form action="{{ route('group.update', $group->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-nav-tabs">
                            <div class="card-header card-header-rose">
                                General Information
                            </div>
                            <div class="card-body">
                                <table class="table customTableBorder" cellspacing="0" cellpadding="0" style="border:none;">
                                    <tr>
                                        <td>Group Name</td>
                                        <td>
                                            <input type="text" id="name" name="name" value="{{ $group->name }}" class="form-control">
                                        </td>
                                    </tr>
                                    <tr hidden>
                                        <td>Slug</td>
                                        <td>
                                            <input type="text" id="slug" name="slug" placeholder="Sluggable" readonly class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Translate Language</td>
                                        <td>
                                            <select class="selectpicker" name="language"
                                                data-style="btn btn-primary btn-round" data-width="100%" title="Default will keep the same">
                                                {{-- <option disabled selected>Single Option</option> --}}
                                                <option value="vi">Vietnamese</option>
                                                <option value="en">English</option>
                                                <option value="jp">Japanese</option>
                                                <option value="Korean">Korean</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leader</td>
                                        <td>
                                            <select class="selectpicker" name="leader"
                                                data-style="btn btn-primary btn-round" data-live-search="true" data-width="100%">
                                                <option value="{{ $group->user_lead->id }}" selected>{{$group->user_lead->email}}</option>
                                                <option disabled >Choose new leader below</option>
                                                @foreach ($leaders as $leader)
                                                    <option value="{{ $leader->id }}">{{ $leader->name .' - '. $leader->email }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success"><i
                                                class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-6"></div> --}}
                </div>
            </form>
        </div>
    </div>
@endsection