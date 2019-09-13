<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\TranslateGroup;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use \Illuminate\Http\Response;

// Test
use Illuminate\Support\Facades\Route;

class GroupController extends Controller
{
    protected $path = 'upload/group/';

    public function __construct()
    {
        $this->middleware(['admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index_title = "Groups Management";

        // $url = action([HomeController::class, 'index']);

        // dd($url);

        return view('admin.group.index', compact(['index_title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $index_title = "Add new group";

        return view('admin.group.create', compact(['index_title']));
    }

    public function leaderForm()
    {
        $index_title = "Add new leader";

        return view('admin.group.leadForm', compact(['index_title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'group_name' => 'required|string|min:5|max:255',
            // 'slug' => 'required|string|unique:translate_groups',
            'group_language' => 'required|string|max:3',
        ]);
        $messages = [
            'slug.required' => 'Group has existed in database',
        ];

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path, 0777, true, true);
        }

        $group = new TranslateGroup();

        $group->group_name = $request->group_name;

        $group->slug = $request->slug;

        $group->language_translate = $request->group_language;

        $group->logo = file_upload($this->path, $request->logo);

        $group->save();

        return redirect(route('group.leader'));
    }

    /**
     * Fetch Group by language using language options
     * Data: language = ajax request, leader = Null
     *
     * @param  Illuminate\Http\Request;  ajax
     * @return \Illuminate\Http\Response
     */
    public function loadGroups(Request $request)
    {
        $groups = TranslateGroup::select('id', 'name')->select_language($request->language)->leader('=', null)->get();
        return response()->json($groups);
    }

    /**
     * Fetch Leader by language using language options
     * Data: language = ajax request
     *
     * @param  Illuminate\Http\Request;  ajax
     * @return \Illuminate\Http\Response
     */
    public function loadLeaders(Request $request)
    {
        $array = [];

        $groups = TranslateGroup::select('leader_id')->select_Language($request->language)->leader('!=', null)->get();

        foreach ($groups as $group) {
            $array = Arr::prepend($array, $group->leader_id);
        }

        $leaders = User::select('id', 'name')->language($request->language)->role_datatable('4')->whereNotIn('id', $array)->get();

        return response()->json($leaders);
    }

    public function updateLeader(Request $request)
    {
        $request->validate([
            'group_language' => 'required',
            'group_name' => 'required',
            'group_leader' => 'required',
        ]);

        TranslateGroup::where('id', $request->group_name)->update(['leader_id' => $request->group_leader]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = TranslateGroup::find($id);

        $leaders = User::select('id', 'name', 'email')->language($group->language_translate)->role_datatable('4')->whereNotIn('id', [$group->leader_id])->get();

        // dd($leaders);
        $index_title = "Edit group";

        return view('admin.group.edit', compact(['index_title', 'group', 'leaders']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = TranslateGroup::find($id);

        $group->name = $request->name;

        if ($request->slug != NULL) {
            $group->slug = $request->slug;
        }

        if ($request->language != NULL) {
            $group->language_translate = $request->language;
        }

        $group->leader_id = $request->leader;

        $group->update();

        return redirect(route('group.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
