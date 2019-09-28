<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
// Model
use App\Manga;
use App\Tasks;
use App\TranslateGroup;
use App\Videos;
use App\User;
use App\Role;

// External
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __construct()
    {
        $tasks = Tasks::select('id')->personal()->orWhere->assigned()->status('0')->get();
        $this->middleware('dashboard');
        $this->i = 0;
    }

    public function index()
    {   
        // User::chunk(1000, function ($users){
        //     $role = Role::select('id','role_name','uniqueString')->where('role_name', 'viewers')->first();
            
        //     foreach ($users as $user) {
        //         if ($user->role_id != '99') {
        //             $user->role_id = $role->id;
        //             $user->random = $role->uniqueString;

        //             $user->save();
        //         }
        //     }
        // });
        // die;
        if (Auth::user()->can('isAdmin')) {
            $users_by_language = DB::table('users')
                ->select('language', DB::raw('count(*) as total'))
                ->where('role_id', '=', '1')
                ->groupBy('language')
                ->get();
            return view('admin.index', compact(['users_by_language', 'tasks']));
        } else {
            return view('admin.index', compact(['tasks']));
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
        return view('admin.mail_box.inbox', compact(['index_title']));
    }

    public function check_slug(Request $request)
    {
        if (isset($request->manga_title)) {
            # code...
            $slug = SlugService::createSlug(Manga::class, 'slug', $request->manga_title);
        } else if (isset($request->video_name)) {
            # coode...
            $slug = SlugService::createSlug(Videos::class, 'slug', $request->video_name);
        } else {
            # code...
            $slug = SlugService::createSlug(TranslateGroup::class, 'slug', $request->group_name);
        }
        // $slug = SlugService::createSlug(TranslateGroup::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
