<div class="card">
        <div class="card-header card-header-text card-header-info">
            <div class="card-text">
                <h4 class="card-title">Others</h4>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" 
                                        name="others[]" type="checkbox"
                                        value="add_copyright" {{ in_array('add_copyright',$permission)? "checked": "" }}>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>Add Copyright</td>
                </tr>
    
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" 
                                        name="others[]" type="checkbox"
                                        value="view_settings" {{ in_array('view_settings',$permission)? "checked": "" }}>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>View Setting</td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" 
                                        name="others[]" type="checkbox"
                                        value="assign_task" {{ in_array('assign_task',$permission)? "checked": "" }}>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>Assign Task</td>
                </tr>
            </table>
        </div>
    </div>