<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\TranslateGroup;
use File;
use DB;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

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

        // $groups = TranslateGroup::select_language('vi')->no_leader()->get();

        // return view('admin.group.leadForm', compact(['index_title','groups']));
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:translate_groups',
            'language' => 'required|string|max:3',
        ]);
        $messages = [
            'slug.required' => 'Group has existed in database',
        ];

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path, 0777, true, true);
        }

        $group = new TranslateGroup();

        $group->name = $request->name;

        $group->slug = $request->slug;

        $group->language_translate = $request->language;

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
        $groups = TranslateGroup::select('id','name')->select_language($request->language)->no_leader()->get();
        return response()->json($groups);
        // $output = [];
        // foreach( $groups as $group )
        // {
        //     $output[$group->id] = $group->name;
        // }
        // return $output;
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
        //
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
        //
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
