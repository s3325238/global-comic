<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\User;

class UserApi extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getUser($language)
    {
        return load_user_data_table(get_user_viewers_model($language));
    }

    public function getUnVerified()
    {
        $user = User::select('id', 'name', 'email', 'created_at', 'updated_at')->role_datatable('1')->not_active()->get();

        return load_user_data_table($user);
    }
    // '.route('permission.edit',$user->id).'
    // <a href="#" class="btn btn-link btn-info btn-just-icon info" id="' . $user->id . '"><i class="material-icons">info</i></a>

    function userRemove(Request $request)
    {
        $id = $request->input('id');

        $user = User::find($id);

        if ($user == null) {
            return request()->session()->flash('alert-danger', 'Invalid data id!');
        }

        if ($user->delete()) {
            return redirect()->back();

        } else {
            return request()->session()->flash('alert-danger', 'Failed to delete record!');
        }
    }

    function getVietnameseLead()
    {
        $user = User::select('id', 'name', 'email', 'created_at', 'updated_at')->role_datatable('2')->language('vi')->active()->get();

        return load_user_data_table($user);
    }
}
