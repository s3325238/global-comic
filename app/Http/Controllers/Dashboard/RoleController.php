<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role;

class RoleController extends Controller
{
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
        //
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
            'id' => 'numeric|required|min:1|max:98|unique:roles',
            'role_name' => 'required|string|max:15|unique:roles',
        ]);
        
        $role = new Role();

        $role->id = $request->id;
        $role->role_name = $request->role_name;

        if (isset($request->mangas)) {
            foreach ($request->mangas as $manga) {

                $role->$manga = TRUE;
                
            }
        }
        
        if (isset($request->groups)) {
            foreach ($request->groups as $group) {

                $role->$group = TRUE;
                
            }
        }

        if (isset($request->users)) {
            foreach ($request->users as $user) {

                $role->$user = TRUE;
                
            }
        }

        if (isset($request->others)) {
            foreach ($request->others as $other) {
                
                $role->$other = TRUE;
                
            }
        }
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
