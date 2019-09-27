@extends('admin.master')

@section('title','Change permission for your member')

@push('customJs')
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}"></script>

<script type="text/javascript">
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
        <form action="{{route('member.change')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12" style="width:100%">
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                            <div class="card-text">
                                <h4 class="card-title">Choose member and permission</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <label class="col-sm-1 col-form-label">Member</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="selectpicker" id="member" name="member" data-live-search="true"
                                            data-style="btn btn-primary btn-round" data-width="100%" title="Choose member">
                                            @foreach ($has_member as $member)
                                                <option value="{{$member->member->id}}">{{$member->member->email}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <label class="col-sm-3 col-form-label">Permission Name</label>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="selectpicker" id="permission" name="permission" data-live-search="true"
                                            data-style="btn btn-primary btn-round" data-width="100%"
                                            title="Choose permission">
                                            @foreach ($permissions as $permission)
                                                <option value="{{$permission->uniqueString}}">{{$permission->role_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('member.index')}}" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;&nbsp;Back to list</a>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection