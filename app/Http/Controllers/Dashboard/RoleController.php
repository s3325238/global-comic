<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

// Database
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Role;

class RoleController extends Controller
{
    protected $columns = array(
        'create_manga', 'view_manga', 'update_manga', 'delete_manga',
        'create_group', 'view_group', 'update_group', 'delete_group',
        'create_user', 'view_user', 'update_user', 'delete_user', 'add_copyright');

    public function __construct()
    {
        $this->middleware(['dashboard', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index_title = "Permission Lists";

        return view('admin.permission.lists',compact(['index_title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $index_title = "Add new permission";
        $permission = [];
        return view('admin.permission.create',compact(['index_title','permission']));
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
            'id' => 'numeric|required|min:1|max:98',
            'role_name' => 'required|string|max:15',
        ]);
        
        $role = new Role();

        $role = add_role_helper($role, $request->mangas, $request->groups, $request->users, $request->others);

        $role->id = $request->id;
        $role->role_name = $request->role_name;

        $role->save();
        
        return redirect(route('dashboard'));
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

        $test = Role::where('id','=',$id)->exclude(['id','role_name','created_at', 'updated_at'])->first();

        $newArray = array_keys($test->toArray());

        foreach ($newArray as $key => $value) {
            if ($test->$value == '1') {
                array_push($permission,$value);
            }
        }

        if ($role) {
            return view('admin.permission.edit',compact(['role','index_title','permission']));
        }else {
            return redirect()->route('dashboard');
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

        $role = role_helper(Role::find($id), $based, $diff, $this->columns, $request->mangas, $request->groups, $request->users, $request->others);

        if ($role->update()) {
            return redirect()->route('permission.index');
        } else {
            return redirect()->back()->with('errors','Fail!');
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
        $table->$type($name);
    }
}
