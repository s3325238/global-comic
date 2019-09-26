<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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

    public function view_group($user)
    {
        if ($user->role->view_group == TRUE) {
            return true;
        }
        abort(404);
    }

    public function create_group($user)
    {
        if ($user->role->create_group == TRUE) {
            return true;
        }
        abort(404);
    }

    public function update_group($user)
    {
        if ($user->role->update_group == TRUE) {
            return true;
        }
        abort(404);
    }

    public function delete_group($user)
    {
        if ($user->role->delete_group == TRUE) {
            return true;
        }
        abort(404);
    }
}
