<?php

namespace App\Http\Controllers\Dashboard\Leader;

use App\Http\Controllers\Controller;

// Verify Email
use App\Leader_members;
use App\Mail\verifyEmailToken;
use App\Positions;
use App\Role;
use App\User;
use Illuminate\Http\Request;

// Model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->member = Role::where('member', true)->first();
    }
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
        $allow_array = [];
        $positions = Positions::all();
        // Check if exist member is already vice leader or not
        $has_member = Leader_members::where('leader_id', Auth::id())->get(); // Get all member

        $role = Role::all();
        foreach ($role as $allow) {
            if ($allow->member == TRUE) {
                array_push($allow_array, $allow->id);
            }
        }

        if ($has_member->isEmpty()) {
            // Nếu ko có member nào cả thì sẽ lấy cả 2 role
            foreach ($role as $allow) {
                if ($allow->vice_leader == TRUE) {
                    array_push($allow_array, $allow->id);
                }
            }
            $allow_permission = Role::whereIn('id', $allow_array)->get();
        } else {
            foreach ($has_member as $member) { // Còn nếu có member thì check
                switch ($member->member->role->vice_leader) {
                    case true:
                        $allow_permission = Role::where('id', $allow_array)->get();
                        break;

                    default:
                        foreach ($role as $allow) {
                            if ($allow->vice_leader == TRUE) {
                                array_push($allow_array, $allow->id);
                            }
                        }
                        $allow_permission = Role::whereIn('id', $allow_array)->get();
                        break;
                }
            }
        }

        return view('admin.user.member.create', compact(['positions', 'allow_permission']));
    }

    /**
     * Create new member
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
            'permission' => 'required',
            // 'position' => 'required',
        ]);

        // Check if is vice leader or not
        if ($request->position == null) {
            if ($request->permission == $this->member->uniqueString) {
                return redirect()->back()->withErrors(['Member need to have position']);
            }
        }

        $role = Role::where('uniqueString', $request->permission)->first();

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->status = false;
        $user->verifyToken = Str::random(40);

        $user->role_id = $role->id;
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
            return redirect(route('member.index'));
        } else {
            return redirect()->back();
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
     * Kick the specific member
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Leader_members::find($id);

        $user = User::find($member->member_id);

        $user->role_id = '1';

        $user->update();

        $member->delete();

        return redirect()->back();
    }

    public function changeView()
    {
        $array = [];
        $has_member = Leader_members::where('leader_id', Auth::id())->get();
        $role = Role::all();
        foreach ($role as $single) {
            if ($single->leader == TRUE || $single->vice_leader == TRUE || $single->member == TRUE) {
                array_push($array, $single->id);
            }
        }
        $permissions = Role::whereIn('id', $array)->get();
        return view('admin.user.member.change', compact(['has_member', 'permissions']));
    }

    public function changeSubmission(Request $request)
    {
        $permission = Role::where('uniqueString', $request->permission)->first();

        $request_member = User::find($request->member);
        // Debug

        // dd(Auth::user()->role_id);
        switch ($permission->id) {
            case Auth::user()->role_id:
                $leader_role = $current_leader->role_id;

                $member_role = $request_member->role_id;

                $is_member->update([
                    'leader_id' => $request_member->id,
                    'member_id' => Auth::id(),
                ]);

                User::query()->where('id', Auth::id())->update([
                    'role_id' => $member_role
                ]);

                User::query()->where('id', $request_member->id)->update([
                    'role_id' => $leader_role
                ]);
                return redirect(route('dashboard'));
                break;
            case $request_member->role_id:
                return redirect()->back()->withErrors(['You cannot select same role!']);
                break;
            
            default:
                
                if ($request_member->role->vice_leader == TRUE) { // is_vice_leader == true
                    // demote vice leader
                    $request_member->role_id = $permission->id;
                    $request_member->save();

                } else {
                    $all_members = Leader_members::where([
                        ['leader_id','=',Auth::id()],
                        ['member_id','!=', $request_member->id]
                    ])->get();
                    foreach ($all_members as $member) {
                        if ($member->member->role->vice_leader == TRUE) { // is_vice_leader == TRUE
                            User::query()->where('id', $member->member->id)->update([
                                'role_id' => $request_member->role_id
                            ]);
                            User::query()->where('id', $request_member->id)->update([
                                'role_id' => $permission->id
                            ]);
                        } else {
                            $request_member->role_id = $permission->id;
                            $request_member->save();
                        }
                    }
                }
                break;
        }
        return redirect(route('member.index'));
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
