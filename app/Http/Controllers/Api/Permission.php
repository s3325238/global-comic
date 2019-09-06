<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Role;

class Permission extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function getLists()
    {
        $role = Role::select('id', 'role_name', 'created_at', 'updated_at')->get();

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

    function editData(Request $request)
    {
        $id = $request->input('id');

        $role = Role::find($id);
        
        $permission = [];

        $index_title = "Add new permission";

        return view('admin.permission.edit',compact(['role','permission','index_title']))->render();
    }

    function removeData(Request $request)
    {
        $id = $request->input('id');

        $role = Role::find($id);

        if ($role == null) {
            return request()->session()->flash('alert-danger', 'Invalid data id!');
        }

        if ($role->delete()) {
            return redirect()->back();

        } else {
            return request()->session()->flash('alert-danger', 'Failed to delete record!');
        }
    }
}
