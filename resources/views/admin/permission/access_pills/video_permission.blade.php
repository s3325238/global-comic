<div class="card">
    <div class="card-header card-header-text card-header-danger">
        <div class="card-text">
            <h4 class="card-title">Video</h4>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" 
                                    name="videos[]" type="checkbox" 
                                    value="view_video" {{ in_array('view_video',$permission)? "checked": "" }}>
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
                                    name="videos[]" type="checkbox" 
                                    value="create_video" {{ in_array('create_video',$permission)? "checked": "" }}>
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
                                    name="videos[]" type="checkbox" 
                                    value="update_video" {{ in_array('update_video',$permission)? "checked": "" }}>
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
                                    name="videos[]" type="checkbox" 
                                    value="delete_video" {{ in_array('delete_video',$permission)? "checked": "" }}>
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