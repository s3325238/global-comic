<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use App\Unique_Length;
use Str;

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
        $this->unique = Unique_Length::find(1);
    }

    protected function getColumns()
    {
        return array_diff(
            Schema::getColumnListing('roles'),
            ['id', 'role_name','uniqueString', 'created_at', 'updated_at']
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
            // 'id' => 'numeric|required|min:1|max:98|unique:roles',
            'role_name' => 'required|string|max:15',
        ]);

        $role = new Role();

        $role = add_role_helper($role, $request->permissions);

        $role->id = rand(5,1000);
        $role->role_name = $request->role_name;
        $role->uniqueString = Str::random($this->unique->role_length);

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

        $permission = [];

        $selected = Role::where('id', $id)
            ->exclude(['id', 'role_name', 'uniqueString', 'created_at', 'updated_at'])
            ->first();

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
            return view('admin.permission.edit', compact(['role', 'permission']));
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
        $request->validate([
            'id' => 'numeric|required|min:1',
            'role_name' => 'required|string',
        ]);
        $based = [];
        $diff = [];

        $role = role_update_helper(
            Role::find($id),
            $based,
            $diff,
            $this->getColumns(),
            $request->permissions
        );

        if ($role->update()) {
            return redirect(route('permission.index'));
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
