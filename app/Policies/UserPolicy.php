<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
    public function read($user)
    {
        if ($user->role->view_user == TRUE) {
            return true;
        }
        return false;
    }

    public function create($user)
    {
        if ($user->role->create_user == TRUE) {
            return true;
        }
        return false;
    }

    public function update($user)
    {
        if ($user->role->update_user == TRUE) {
            return true;
        }
        return false;
    }

    public function delete($user)
    {
        if ($user->role->delete_user == TRUE) {
            return true;
        }
        return false;
    }
    
    public function access_create_form($user)
    {
        if ($user->role->create_user == TRUE) {
            return true;
        }
        abort(404);
    }

    public function access_edit_form($user)
    {
        if ($user->role->update_user == TRUE) {
            return true;
        }
        abort(404);
    }
}
