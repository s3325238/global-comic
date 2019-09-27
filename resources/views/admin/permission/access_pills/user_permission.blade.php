<div class="card">
    <div class="card-header card-header-text card-header-success">
        <div class="card-text">
            <h4 class="card-title">User</h4>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" 
                                    name="permissions[]" type="checkbox" 
                                    value="view_user" {{ in_array('view_user',$permission)? "checked": "" }}>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </td>
                <td>View</td>
            </tr>

            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" 
                                    name="permissions[]" type="checkbox" 
                                    value="create_user" {{ in_array('create_user',$permission)? "checked": "" }}>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </td>
                <td>Create</td>
            </tr>

            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" 
                                    name="permissions[]" type="checkbox" 
                                    value="update_user" {{ in_array('update_user',$permission)? "checked": "" }}>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </td>
                <td>Update</td>
            </tr>

            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" 
                                    name="permissions[]" type="checkbox"
                                    value="delete_user" {{ in_array('delete_user',$permission)? "checked": "" }}>
                            <span class="form-check-sign">
                            <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </td>
                <td>Delete</td>
            </tr>
        </table>
    </div>
</div>