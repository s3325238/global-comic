<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Role;
use App\Tasks;
use App\TranslateGroup;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard');
    }

    protected $tasks_per_page = '2';

    public function index()
    {
        $index_title = "Dashboard";
        // $tasks = Tasks::where('user_id','=',Auth::id())->paginate($this->tasks_per_page);

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

    public function add_task(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'priority' => 'required',
        ]);
        $tasks = new Tasks();

        $tasks->description = $request->description;
        $tasks->user_id = Auth::id();
        $tasks->priority = $request->priority;

        $tasks->save();

        return redirect()->back();
    }

    public function mail()
    {
        $index_title = "Inbox";
        return view('admin.mail_box.inbox',compact(['index_title']));
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(TranslateGroup::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
