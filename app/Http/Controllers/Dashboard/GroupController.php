<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;
use Storage;

// Model
use App\User;
use App\Settings;
use App\TranslateGroup;


// Test
use \Illuminate\Http\Response;

class GroupController extends Controller
{
    use LogsActivity;

    public function __construct()
    {
        $this->middleware(['dashboard']);
    }

    protected function getStorage()
    {
        return Settings::findOrFail(1)->STORAGE_PATH;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view_lists', TranslateGroup::class);

        return view('admin.group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_form', TranslateGroup::class);
        
        return view('admin.group.create');
    }

    public function leaderForm()
    {
        $this->authorize('create_form', TranslateGroup::class);
        
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
        $this->authorize('create_form', TranslateGroup::class);

        $request->validate([
            'group_name' => 'required|string|min:5|max:255',
            'group_language' => 'required|string|max:3',
        ]);

        Storage::makeDirectory($this->getStorage().$request->slug);

        $group = new TranslateGroup();

        $group->name = $request->group_name;

        $group->slug = $request->slug;

        $group->language_translate = $request->group_language;

        $group->logo = storage_store('single', $request->logo, $this->getStorage().$request->slug);

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
        $this->authorize('create_form', TranslateGroup::class);

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
        // $this->authorize('create_form', TranslateGroup::class);

        $array = [];

        $groups = TranslateGroup::select('leader_id')->select_Language($request->language)->leader('!=', null)->get();

        foreach ($groups as $group) {
            $array = Arr::prepend($array, $group->leader_id);
        }

        $leaders = User::select('id', 'name')->language($request->language)->role_datatable('3')->whereNotIn('id', $array)->get();

        return response()->json($leaders);
    }

    public function updateLeader(Request $request)
    {
        $this->authorize('update_form', TranslateGroup::class);
        
        $request->validate([
            'group_language' => 'required',
            'group_name' => 'required',
            'group_leader' => 'required',
        ]);

        $group = TranslateGroup::findOrFail($request->group_name);
        
        $group->update(['leader_id' => $request->group_leader]);

        activity()
            ->causedBy(Auth::user())
            ->performedOn($group)
            ->withProperties(
                [
                    'attributes' => [
                        'name' => $group->name,
                        'leader_id' => $request->group_leader
                    ],
                ]
            )
            ->log('Add new leader');

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
        $this->authorize('update_form', TranslateGroup::class);

        $group = TranslateGroup::find($id);

        $leaders = User::select('id', 'name', 'email')->language($group->language_translate)->role_datatable('4')->whereNotIn('id', [$group->leader_id])->get();

        // dd($leaders);

        return view('admin.group.edit', compact(['group', 'leaders']));
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
        $this->authorize('update_form', TranslateGroup::class);

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
        TranslateGroup::query()->select_Language($lang)
                    ->update([
                        'follows' => '0',
                        'points' => '0'
                    ]);
        return redirect()->back();
    }
}
