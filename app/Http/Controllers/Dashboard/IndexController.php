<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->can('isAdmin')) {
            $users_by_language = DB::table('users')
                ->select('language',DB::raw('count(*) as total'))
                ->where('role_id','=','1')
                ->groupBy('language')
                ->get();
            return view('admin.index',compact(['users_by_language']));
        }else {
            return view('admin.index');
        }
    }

    public function mail()
    {
        return view('admin.mail_box.inbox');
    }
}
