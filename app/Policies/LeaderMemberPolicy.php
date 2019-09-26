<?php

namespace App\Policies;

use App\User;
use App\TranslateGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

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

    public function group_null($user)
    {
        $group = TranslateGroup::where('leader_id', $user->id)->first();

        if (!isset($group)) {
            return redirect(route('dashboard'));
        } else {
            return true;
        }
    }

    public function only_leader($user)
    {
        if ($user->role_id == '3') {
            return true;
        }
        abort(404);
    }

    public function only_member($user)
    {
        if ($user->role_id == '4') {
            return true;
        }
        abort(404);
    }

    public function both_leader_member($user)
    {
        if ($user->role_id == '3' || $user->role_id == '4') {
            return true;
        }
        abort(404);
    }

    public function view_list($user)
    {
        if ($user->role->view_video == TRUE) {
            return true;
        }
        abort(404);
    }

    public function create_video($user)
    {
        if ($user->role->create_video == TRUE) {
            return true;
        }
        abort(404);
    }

    public function update_video($user)
    {
        if ($user->role->update_video == TRUE) {
            return true;
        }
        abort(404);
    }

    public function delete_video($user)
    {
        if ($user->role->delete_video == TRUE) {
            return true;
        }
        abort(404);
    }
}
