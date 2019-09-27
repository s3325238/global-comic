<div class="card">
        <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
                <h4 class="card-title">Group</h4>
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
                                        value="view_group" {{ in_array('view_group',$permission)? "checked": "" }}>
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
                                        value="create_group" {{ in_array('create_group',$permission)? "checked": "" }}>
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
                                        value="update_group" {{ in_array('update_group',$permission)? "checked": "" }}>
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
                                        value="delete_group" {{ in_array('delete_group',$permission)? "checked": "" }}>
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