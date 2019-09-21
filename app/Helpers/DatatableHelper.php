<?php
use App\Leader_members;
use App\Manga;
use App\Role;
use App\Tasks;
use App\Positions;
use App\TranslateGroup;
use App\User;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

if (!function_exists('make_member_list_data_table')) {
    function make_member_list_data_table()
    {
        return '<div class="material-datatables">
        <table id="vi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_causer_log_data_table')) {
    function make_causer_log_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Edit by</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Edit by</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_log_data_table')) {
    function make_log_data_table($id)
    {
        return '<div class="row">
            <div class="col-md-12">
                <form action="' . route('api.log.user.delete', 'App\User') . '" method="post">
                    ' . csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Clean Null Causer</button>
                </form>
            </div>
        </div>
        <div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Description</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_user_data_table')) {
    function make_user_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_manga_data_table')) {
    function make_manga_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_copyright_data_table')) {
    function make_copyright_data_table($id)
    {
        return '<div class="material-datatables">
        <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
            style="width:100%">
            <thead>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Registered by</th>
                    <th>Updated At</th>

                    <th class="disabled-sorting text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Manga Name</th>
                    <th>Registered by</th>
                    <th>Updated At</th>

                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>';
    }
}

if (!function_exists('make_group_data_table')) {

    function make_group_data_table($id)
    {
        # code...
        return '<div class="material-datatables">
                <table id="' . $id . '" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                    <th>ID&nbsp;&nbsp;&nbsp;</th>
                    <th>Name</th>
                    <th>Leader Email</th>
                    <th>Follows</th>
                    <th>Points</th>
                    <th>Created At</th>
                    <th class="disabled-sorting text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID&nbsp;&nbsp;&nbsp;</th>
                        <th>Name</th>
                        <th>Leader Email</th>
                        <th>Follows</th>
                        <th>Points</th>
                        <th>Created At</th>

                        <th class="text-center">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>';
    }
}

if (!function_exists('load_user_data_table')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function load_user_data_table($user)
    {
        return DataTables::of($user)
            ->addColumn('id', function ($user) {
                return $user->id;
            })
            ->addColumn('name', function ($user) {
                return $user->name;
            })
            ->addColumn('email', function ($user) {
                return $user->email;
            })
            ->addColumn('action', function ($user) {
                if (Gate::allows('edit-all', Auth::user())) {
                    return '<a href="#" class="btn btn-link btn-warning btn-just-icon edit" id="' . $user->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $user->id . '"><i class="material-icons">delete</i></a>';
                } else if (Gate::allows('update-user', Auth::user())) {
                    if (Gate::allows('delete-user', Auth::user())) {
                        return '<a href="#" class="btn btn-link btn-warning btn-just-icon edit" id="' . $user->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $user->id . '"><i class="material-icons">delete</i></a>';
                    } else {
                        return '<a href="#" class="btn btn-link btn-warning btn-just-icon edit" id="' . $user->id . '"><i class="material-icons">edit</i></a>';
                    }
                }
            })
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function (User $user) {
                return $user->updated_at->diffForHumans();
            })
            ->make(true);
    }
}

if (!function_exists('load_member_data_table')) {
    function load_member_data_table($member)
    {
        return DataTables::of($member)
            ->addColumn('email', function (Leader_members $member){
                return $member->member->email;
            })
            ->addColumn('position', function (Leader_members $member){
                return '<span class="badge badge-'.$member->belongsToPosition->badge.'">'.$member->belongsToPosition->name.'</span>';
            })
            ->addColumn('status', function (Leader_members $member){
                switch ($member->member->status) {
                    case '0':
                        return '<span class="badge badge-danger"><i class="fas fa-times"></i>&nbsp;&nbsp;Not verify</span>';
                        break;
                    
                    default:
                        return '<span class="badge badge-success"><i class="fas fa-check"></i>&nbsp;&nbsp;Verified</span>';
                        break;
                }
                return $member->member->status;
            })          
            ->addColumn('action', function ($member) {
                return '<form action="'.route('member.update', $member->id).'" method="POST">' . csrf_field() . '
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-danger update"><i class="fas fa-ban"></i>&nbsp;&nbsp;Kick</button>
                        </form>';
            })
            ->editColumn('created_at', function (Leader_members $member) {
                return $member->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function (Leader_members $member) {
                return $member->updated_at->diffForHumans();
            })
            ->rawColumns(['position','status', 'action'])
            ->make(true);
    }
}

if (!function_exists('load_role_data_table')) {

    function load_role_data_table($role)
    {
        return DataTables::of($role)
            ->addColumn('id', function ($role) {
                return $role->id;
            })
            ->addColumn('role_name', function ($role) {
                return $role->role_name;
            })
            ->addColumn('action', function ($role) {
                return '<a href="#" class="btn btn-link btn-info btn-just-icon info" id="' . $role->id . '"><i class="material-icons">info</i></a>
                        <a href="' . route('permission.edit', $role->id) . '" class="btn btn-link btn-warning btn-just-icon edit" id="' . $role->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $role->id . '"><i class="material-icons">close</i></a>';
            })
            ->editColumn('created_at', function (Role $role) {
                return $role->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function (Role $role) {
                return $role->updated_at->diffForHumans();
            })
            ->make(true);
    }
}

if (!function_exists('load_personal_task_data_table')) {

    # Get user_id == Auth::id()
    function load_personal_task_data_table($task)
    {
        return DataTables::of($task)
            ->addColumn('description', function ($task) {
                return $task->description;
            })
            ->editColumn('priority', function (Tasks $task) {
                if ($task->priority == '0') {
                    return '<span class="badge badge-pill badge-info">Normal</span>';
                } else {
                    return '<span class="badge badge-pill badge-danger">Urgent</span>';
                }
            })
            ->addColumn('action', function ($task) {
                return '<form action="' . route('task.update', $task->id) . '" method="POST">' . csrf_field() . '
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success update"><i class="fas fa-check-circle"></i>&nbsp;Complete</button>
                </form>';
            })
            ->rawColumns(['priority', 'action'])
            ->make(true);
    }

}

if (!function_exists('load_group_data_table')) {
    function load_group_data_table($groups)
    {
        return DataTables::of($groups)
            ->addColumn('id', function ($groups) {
                return $groups->id;
            })
            ->addColumn('name', function ($groups) {
                return $groups->name;
            })
            ->editColumn('leader_id', function (TranslateGroup $groups) {
                return $groups->user_lead->email;
            })
            ->addColumn('follows', function ($groups) {
                return $groups->follows;
            })
            ->addColumn('points', function ($groups) {
                return $groups->points;
            })
            ->addColumn('action', function ($groups) {
                if (Gate::allows('edit-all', Auth::user())) {
                    return '<a href="' . route('group.edit', $groups->id) . '" class="btn btn-link btn-warning btn-just-icon edit" id="' . $groups->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $groups->id . '"><i class="material-icons">delete</i></a>';
                } else if (Gate::allows('update-group', Auth::user())) {
                    if (Gate::allows('delete-group', Auth::user())) {
                        return '<a href="' . route('group.edit', $groups->id) . '" class="btn btn-link btn-warning btn-just-icon edit" id="' . $groups->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $groups->id . '"><i class="material-icons">delete</i></a>';
                    } else {
                        return '<a href="' . route('group.edit', $groups->id) . '" class="btn btn-link btn-warning btn-just-icon edit" id="' . $groups->id . '"><i class="material-icons">edit</i></a>';
                    }
                }
            })
            ->editColumn('created_at', function (TranslateGroup $groups) {
                return $groups->created_at->diffForHumans();
            })
            ->make(true);
    }
}

if (!function_exists('load_copyright_data_table')) {

    # '.route('manga.edit',$trade_mark->id).'
    function load_copyright_data_table($manga)
    {
        return DataTables::of($manga)
            ->addColumn('id', function ($manga) {
                return $manga->id;
            })
            ->addColumn('name', function ($manga) {
                return $manga->name;
            })
            ->editColumn('group_id', function (Manga $manga) {
                return $manga->groups->name;
            })
            ->addColumn('action', function ($manga) {
                return '<a href="" class="btn btn-link btn-warning btn-just-icon edit" id="' . $manga->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $manga->id . '"><i class="material-icons">delete</i></a>';
            })
            ->editColumn('updated_at', function (Manga $manga) {
                return $manga->updated_at->diffForHumans();
            })
            ->make(true);
    }

}

if (!function_exists('load_manga_data_table')) {
    function load_manga_data_table($manga)
    {
        return DataTables::of($manga)
            ->addColumn('id', function ($manga) {
                return $manga->id;
            })
            ->addColumn('name', function ($manga) {
                return $manga->name;
            })
            ->addColumn('action', function ($manga) {
                return '<a href="" class="btn btn-link btn-warning btn-just-icon edit" id="' . $manga->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $manga->id . '"><i class="material-icons">delete</i></a>';
            })
            ->editColumn('updated_at', function (Manga $manga) {
                return $manga->updated_at->diffForHumans();
            })
            ->make(true);
    }
}

if (!function_exists('load_log_data_table')) {
    function load_log_data_table($activity)
    {
        return DataTables::of($activity)
            ->addColumn('id', function ($activity) {
                return $activity->id;
            })
            ->addColumn('description', function ($activity) {
                return $activity->description;
            })
            ->editColumn('updated_at', function (Activity $activity) {
                return $activity->updated_at->diffForHumans();
            })
            ->addColumn('action', function ($activity) {
                return '<a href="" class="btn btn-link btn-warning btn-just-icon edit" id="' . $activity->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $activity->id . '"><i class="material-icons">delete</i></a>';
            })
            ->make(true);
    }
}

if (!function_exists('load_other_log_data_table')) {
    function load_other_log_data_table($activity)
    {
        return DataTables::of($activity)
            ->addColumn('id', function ($activity) {
                return $activity->id;
            })
            ->addColumn('description', function ($activity) {
                return $activity->description;
            })
            ->editColumn('causer', function ($activity) {
                return $activity->causer->email;
            })
            ->editColumn('updated_at', function (Activity $activity) {
                return $activity->updated_at->diffForHumans();
            })
            ->addColumn('action', function ($activity) {
                return '<a href="" class="btn btn-link btn-warning btn-just-icon edit" id="' . $activity->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $activity->id . '"><i class="material-icons">delete</i></a>';
            })
            ->make(true);
    }
}
/**

 */

// <a href="" class="btn btn-success update" id="' . $task->id . '"><i class="fas fa-check-circle"></i>&nbsp;Complete</a>
// '.route('task.update',$task->id).'
