<?php

namespace App\Policies;

use App\Leader_members;
use App\TranslateGroup;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class LeaderMemberPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function can_create($user)
    {
        if ($user->role->create_video == true) {
            if (Auth::user()->role_id == '3') {

                $group = TranslateGroup::select('id')->where('leader_id', '=', Auth::id())->first();
    
                if (!isset($group)) {
                    abort(404);
                }
                return true;

            } else if (Auth::user()->role_id == '4') {
    
                $leader = Leader_members::select('leader_id')->where('member_id', Auth::id())->first();
    
                $group = TranslateGroup::select('id')->where('leader_id', '=', $leader->leader_id)->first();
    
                if (!isset($group)) {
                    return redirect(route('dashboard'));
                } else {
                    $mangas = $group->mangas;
    
                    return view('admin.video.upload', compact(['mangas']));
                }
            } else {
                abort(404);
            }
        }
        abort(404);
    }

    public function can_update($user, $video)
    {
        if ($user->role->leader == TRUE) {
            if ($user->role->update_video == true) {
                $group = TranslateGroup::where('leader_id', Auth::id())->first();

                if (!isset($group)) { // Does not have group
                    abort(404);
                } else { // Have a group
                    if ($video->group_id == $group->id) { // Belong to group
                        if ($video->uploaded_by == Auth::id()) { // Self upload
                            return true;
                        } else { // Upload by member
                            $is_member = Leader_members::where('member_id', $video->uploaded_by)->first();
                            if ($user->id == $is_member->leader_id) {
                                return true;
                            } else {
                                abort(404);
                            }
                        }
                    } else {
                        abort(404);
                    }
                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function only_leader($user)
    {
        if ($user->role->leader == TRUE) {
            $group = TranslateGroup::where('leader_id', Auth::id())->first();

            if (!isset($group)) {
                abort(404);
            }
            return true;
        }
        abort(404);
    }

    public function only_member($user)
    {
        if ($user->role_id == '5') {
            $is_member = Leader_members::where('member_id', Auth::id())->first();

            if (!isset($is_member)) {
                abort(404);
            }

            $group = TranslateGroup::where('leader_id', $is_member->leader_id)->first();

            if (!isset($group)) {
                return redirect(route('dashboard'));
            }
            return true;
        }
        abort(404);
    }

    public function both_leader_member($user)
    {
        if ($user->role->leader == TRUE || $user->role_id == '5') {
            return true;
        }
        abort(404);
    }

    public function view_list($user)
    {
        if ($user->role->view_video == true) {
            return true;
        }
        abort(404);
    }

    public function create_video($user)
    {
        if ($user->role->create_video == true) {
            return true;
        }
        abort(404);
    }

    public function update_video($user)
    {
        if ($user->role->update_video == true) {
            return true;
        }
        abort(404);
    }

    public function delete_video($user)
    {
        if ($user->role->delete_video == true) {
            return true;
        }
        abort(404);
    }
}
