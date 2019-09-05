<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Role;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard');
    }

    public function index()
    {
        // $user = Auth::user();
        $index_title = "Dashboard";

        $role = Role::select('id', 'role_name', 'created_at', 'updated_at')->get();

        // dd($role);

        if (Auth::user()->can('isAdmin')) {
            $users_by_language = DB::table('users')
                ->select('language', DB::raw('count(*) as total'))
                ->where('role_id', '=', '1')
                ->groupBy('language')
                ->get();
            return view('admin.index', compact(['users_by_language','index_title']));
        } else {
            return view('admin.index',compact(['index_title']));
        }
    }

    public function mail()
    {
        return view('admin.mail_box.inbox');
    }
}
