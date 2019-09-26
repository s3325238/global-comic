<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// Verify Email
use Mail;
use Session;
use App\Mail\verifyEmailToken;

use File;

// Model
use App\User;
use App\Role;

class UserController extends Controller
{
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
        $index_title = "Active User Lists Management";
        return view('admin.user.index',compact(['index_title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('access_create_form', User::class);

        $roles = Role::select('id','role_name')->except_admin()->get() ;

        // $status = [];
        return view('admin.user.create',compact(['roles']));
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255|confirmed',
            'status' => 'required',
            'role' => 'required',
            'language' => 'required',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->status = $request->status;
        if ($request->status == 0) {
            $user->verifyToken = Str::random(40);
        }

        $user->role_id = $request->role;
        $user->language = $request->language;

        $user->save();

        if ($user->verifyToken != NULL) {

            $thisUser = User::findOrFail($user->id);

            $this->sendVerifyEmail($thisUser);

        }

        return redirect(route('user.index'));
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
        $this->authorize('access_edit_form', User::class);
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

    /**
     * Send verification email to latest created user
     */
    protected function sendVerifyEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmailToken($thisUser));
    }
}
