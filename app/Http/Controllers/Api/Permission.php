<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class Permission extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getLists()
    {
        $role = Role::select('id', 'role_name','uniqueString', 'created_at', 'updated_at')->get();

        return load_role_data_table($role);
    }

    public function removeData(Request $request)
    {
        $id = $request->input('id');

        // $role = Role::find($id);
        $role = Role::where('uniqueString', $id)->first();

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
