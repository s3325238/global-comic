<?php
use Yajra\DataTables\DataTables;
use App\User;
use App\Role;
use App\Tasks;

if (!function_exists('user_data_table')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function user_data_table($user)
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
                return '<a href="#" class="btn btn-link btn-warning btn-just-icon edit" id="' . $user->id . '"><i class="material-icons">edit</i></a>
                        <a href="" class="btn btn-link btn-danger btn-just-icon remove" id="' . $user->id . '"><i class="material-icons">delete</i></a>';
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

if (!function_exists('role_data_table')) {

    function role_data_table($role)
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
                        <a href="'.route('permission.edit',$role->id).'" class="btn btn-link btn-warning btn-just-icon edit" id="' . $role->id . '"><i class="material-icons">dvr</i></a>
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

if (!function_exists('personal_task_data_table')) {
    
    # Get user_id == Auth::id()
    function personal_task_data_table($task)
    {
        return DataTables::of($task)
            ->addColumn('description', function ($task) {
                return $task->description;
            })
            ->editColumn('priority', function(Tasks $task){
                if ($task->priority == '0') {
                    return '<span class="badge badge-pill badge-info">Normal</span>';
                } else {
                    return '<span class="badge badge-pill badge-danger">Urgent</span>';
                }
            })
            ->addColumn('action', function ($task) {
                return '<form action="'.route('task.update',$task->id).'" method="POST">'.csrf_field().'
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success update"><i class="fas fa-check-circle"></i>&nbsp;Complete</button>
                </form>';
            })
            ->rawColumns(['priority','action'])
            ->make(true);
    }

}
/**
 
 */

// <a href="" class="btn btn-success update" id="' . $task->id . '"><i class="fas fa-check-circle"></i>&nbsp;Complete</a>
// '.route('task.update',$task->id).'