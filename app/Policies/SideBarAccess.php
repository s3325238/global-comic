<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SideBarAccess
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

    public function editAll($user)
    {
        if ($user->role_id == '99') {
            return true;
        }
        return false;
    }

    public function changeSettings($user)
    {
        if ($user->role->view_settings == TRUE) {
            return true;
        }
        return false;
    }

    public function viewUserLists($user)
    {
        if ($user->role->view_user == TRUE) {
            return true;
        }
        return false;
    }

    public function createNewUser($user)
    {
        if ($user->role->create_user == TRUE) {
            return true;
        }
        return false;
    }

    public function updateUser($user)
    {
        if ($user->role->update_user == TRUE) {
            return true;
        }
        return false;
    }

    public function deleteUser($user)
    {
        if ($user->role->delete_user == TRUE) {
            return true;
        }
        return false;
    }
}
