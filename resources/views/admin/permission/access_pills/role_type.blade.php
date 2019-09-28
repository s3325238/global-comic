<div class="card">
        <div class="card-header card-header-text card-header-default">
            <div class="card-text">
                <h4 class="card-title">Type</h4>
            </div>
        </div>
        <div class="card-body">
            {{-- <div class="row">
                <input type="button" value="Result" onclick="display()"/>
            </div> --}}
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" id="moderator" name="permissions[]" type="checkbox" value="moderator"
                                {{ in_array('moderator',$permission)? "checked": "" }}>Moderator
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" id="leader" name="permissions[]" type="checkbox" value="leader"
                                {{ in_array('leader',$permission)? "checked": "" }}> Leader
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" id="viceLeader" name="permissions[]" type="checkbox" value="vice_leader"
                                {{ in_array('vice_leader',$permission)? "checked": "" }}> Vice Leader
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" id="member" name="permissions[]" type="checkbox" value="member"
                                {{ in_array('member',$permission)? "checked": "" }}> Member
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>