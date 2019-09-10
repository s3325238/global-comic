<div class="card">
    <div class="card-header card-header-text card-header-primary">
        <div class="card-text">
            <h4 class="card-title">Add new task</h4>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('task.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Description</label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <select class="selectpicker" name="priority" data-live-search="true" data-style="btn btn-primary btn-round" data-width="100%" title="Choose Priority">
                        {{-- <option disabled selected>Single Option</option> --}}
                        <option value="0">Normal</option>
                        <option value="1">Urgent</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-12">
                    <select class="selectpicker" name="member" data-live-search="true" data-style="btn btn-primary btn-round" data-width="100%" title="Choose Member">
                        {{-- <option disabled selected>Single Option</option> --}}
                        <option value="vi">Vietnamese</option>
                        <option value="en">English</option>
                        <option value="jp">Japanese</option>
                        <option value="Korean">Korean</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus"></i> Add
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>