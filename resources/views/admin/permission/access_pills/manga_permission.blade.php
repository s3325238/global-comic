<div class="card">
    <div class="card-header card-header-text card-header-warning">
        <div class="card-text">
            <h4 class="card-title">Manga</h4>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input leaders members" 
                                    name="permissions[]" type="checkbox" 
                                    value="view_manga" {{ in_array('view_manga',$permission)? "checked": "" }}>
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
                            <input class="form-check-input leaders members" 
                                    name="permissions[]" type="checkbox" 
                                    value="create_manga" {{ in_array('create_manga',$permission)? "checked": "" }}>
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
                            <input class="form-check-input leaders" 
                                    name="permissions[]" type="checkbox"
                                    value="update_manga" {{ in_array('update_manga',$permission)? "checked": "" }}>
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
                            <input class="form-check-input leaders" 
                                    name="permissions[]" type="checkbox" 
                                    value="delete_manga" {{ in_array('delete_manga',$permission)? "checked": "" }}>
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