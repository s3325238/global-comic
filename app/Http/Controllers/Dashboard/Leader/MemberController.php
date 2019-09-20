<?php

namespace App\Http\Controllers\Dashboard\Leader;

use App\Http\Controllers\Controller;
use App\Leader_members;
use App\Mail\verifyEmailToken;
use App\Positions;
use App\User;
use Illuminate\Http\Request;

// Verify Email
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Model
use Illuminate\Support\Str;
use Mail;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Positions::all();
        return view('admin.user.member.create', compact(['positions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255|confirmed',
            'position' => 'required',
        ]);

        $user = new User();

        $user->name = $request->email;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->status = false;
        $user->verifyToken = Str::random(40);

        $user->role_id = '4';
        $user->language = Auth::user()->language;

        $user->save();

        $thisUser = User::findOrFail($user->id);

        $this->sendVerifyEmail($thisUser);

        $leader_member = new Leader_members();

        $leader_member->leader_id = Auth::id();
        $leader_member->member_id = $thisUser->id;
        $leader_member->position = $request->position;

        // Change redirect route later
        if ($leader_member->save()) {
            return redirect(route('dashboard'));
        } else {
            return redirect(route('task.index'));
        }
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

    // Send verification token
    protected function sendVerifyEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmailToken($thisUser));
    }
}
