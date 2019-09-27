<div class="card">
    <div class="card-header card-header-text card-header-info">
        <div class="card-text">
            <h4 class="card-title">Others</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" name="permissions[]" type="checkbox" value="add_copyright"
                            {{ in_array('add_copyright',$permission)? "checked": "" }}> Add
                        Copyright
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" name="permissions[]" type="checkbox" value="view_settings"
                            {{ in_array('view_settings',$permission)? "checked": "" }}>
                        View Setting
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" name="permissions[]" type="checkbox" value="assign_task"
                            {{ in_array('assign_task',$permission)? "checked": "" }}>
                        Assign Task
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" name="permissions[]" type="checkbox" value="access_finance"
                            {{ in_array('access_finance',$permission)? "checked": "" }}>
                        Finance
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>