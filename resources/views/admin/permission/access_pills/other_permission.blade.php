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
    
                {{-- <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>Create Manga</td>
                </tr>
    
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>Update Manga</td>
                </tr>
    
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>Delete Manga</td>
                </tr> --}}
            </table>
        </div>
    </div>