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
use App\Manga;

class IndexController extends Controller
{
    public function __construct()
    {
        $tasks = Tasks::select('id')->personal()->orWhere->assigned()->status('0')->get();
        $this->middleware('dashboard');
    }

    public function index()
    {
        $index_title = "Dashboard";
        

        if (Auth::user()->can('isAdmin')) {
            $users_by_language = DB::table('users')
                ->select('language', DB::raw('count(*) as total'))
                ->where('role_id', '=', '1')
                ->groupBy('language')
                ->get();
            return view('admin.index', compact(['users_by_language','index_title','tasks']));
        } else {
            return view('admin.index',compact(['index_title','tasks']));
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
        if (isset($request->manga_title)) {
            # code...
            $slug = SlugService::createSlug(Manga::class, 'slug', $request->manga_title);
        } else {
            # code...
            $slug = SlugService::createSlug(TranslateGroup::class, 'slug', $request->group_name);
        }
        // $slug = SlugService::createSlug(TranslateGroup::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
