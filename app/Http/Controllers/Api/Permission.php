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

        return role_data_table($role);
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
