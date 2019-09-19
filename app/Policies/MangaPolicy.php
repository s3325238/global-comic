<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MangaPolicy
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

    public function view_list($user)
    {
        if ($user->role->view_manga == TRUE) {
            return true;
        }
        abort(404);
    }

    public function create_form($user)
    {
        if ($user->role->create_manga == TRUE) {
            return true;
        }
        abort(404);
    }

    public function update_form($user)
    {
        if ($user->role->update_manga == TRUE) {
            return true;
        }
        abort(404);
    }

    public function delete_form($user)
    {
        if ($user->role->delete_manga == TRUE) {
            return true;
        }
        abort(404);
    }

    public function copyright($user)
    {
        if ($user->role->add_copyright == TRUE) {
            return true;
        }
        abort(404);
    }
}
