<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Model
use App\User;
use App\Settings;
use App\TranslateGroup;


// Test
use \Illuminate\Http\Response;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    protected function getPath()
    {
        return Settings::findOrFail(1)->GROUP_PATH;
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
        return view('admin.group.create');
    }

    public function leaderForm()
    {
        return view('admin.group.leadForm');
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
            'group_language' => 'required|string|max:3',
        ]);

        make_directory($this->getPath());

        $group = new TranslateGroup();

        $group->name = $request->group_name;

        $group->slug = $request->slug;

        $group->language_translate = $request->group_language;

        $group->logo = file_upload($this->getPath(), $request->logo);

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

        return redirect(route('group.index'));
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

        if ($request->slug != null) {
            $group->slug = $request->slug;
        }

        if ($request->language != null) {
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

    public function resetFollows($lang)
    {
        # code...
        TranslateGroup::query()->select_Language($lang)
                    ->update([
                        'follows' => '0',
                        'points' => '0'
                    ]);

        return redirect()->back();
    }
}
