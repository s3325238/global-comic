<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

use Auth;
use Spatie\Activitylog\Contracts\Activity;

use App\Tasks;
use App\Role;
use App\User;
use App\Leader_members;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['dashboard']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('assign-task', Auth::user())) {
            $array = [1];

            $roles = Role::query()->type('moderator')->orWhere->type('member')->get();

            foreach ($roles as $role) {
                array_push($array, $role->id);
            }
            array_push($array, 99);

            if (Auth::user()->role->leader == TRUE) {
                $can_assign = Leader_members::where('leader_id', Auth::id())->get();
            } else {
                array_push($array, 99);
                $can_assign = User::whereNotIn('role_id', $array)->get();
            }
            return view('admin.tasks.index', compact(['can_assign']));
        } else {
            return view('admin.tasks.index');    
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $task = new Tasks();

        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->user_id = Auth::id();
        
        if ($request->member != NULL) {
            $task->assigned = $request->member;
        }

        $task->save();

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        Tasks::where('id',$id)->update(['status' => true]);

        return redirect()->back();
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
