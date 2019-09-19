<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;

// Database
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    protected function getColumns()
    {
        return array_diff(
            Schema::getColumnListing('roles'),
            ['id', 'role_name', 'created_at', 'updated_at']
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permission.lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = [];
        
        return view('admin.permission.create', compact(['permission']));
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'id' => ['required', 'numeric', 'min:1', 'max:98'],
            'role_name' => ['required', 'string', 'max:15', 'unique:roles'],
        ]);
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
            'id' => 'numeric|required|min:1|max:98|unique:roles',
            'role_name' => 'required|string|max:15',
        ]);

        $role = new Role();

        $role = add_role_helper($role, $request->mangas, $request->groups, $request->users, $request->others);

        $role->id = $request->id;
        $role->role_name = $request->role_name;

        $role->save();

        return redirect(route('permission.index'));
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
        $role = Role::find($id);

        $index_title = "Edit permission";

        $permission = [];

        $selected = Role::where('id', '=', $id)->exclude(['id', 'role_name', 'created_at', 'updated_at'])->first();

        if ($selected == null) {
            return redirect(route('permission.index'));
        }

        $permission_arr = array_keys($selected->toArray());

        foreach ($permission_arr as $key => $value) {
            if ($selected->$value == '1') {
                array_push($permission, $value);
            }
        }

        if ($role) {
            return view('admin.permission.edit', compact(['role', 'index_title', 'permission']));
        } else {
            return redirect()->route('permission.index');
        }

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
        $based = [];
        $diff = [];

        $request->validate([
            'id' => 'numeric|required|min:1',
            'role_name' => 'required|string',
        ]);

        $role = role_update_helper(Role::find($id), $based, $diff, $this->getColumns(), $request->mangas, $request->groups, $request->users, $request->others);

        if ($role->update()) {
            return redirect()->route('permission.index');
        } else {
            return redirect()->back()->with('errors', 'Fail!');
        }

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
