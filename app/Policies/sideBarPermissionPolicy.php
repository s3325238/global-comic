<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class sideBarPermissionPolicy
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

    public function isAdmin($user)
    {
        if ($user->role_id == "99") {
            return true;
        }
        return false;
    }

    // @can = return method
    // @cannot = ngược lại với điều kiện thoả mãn

    // User with role_id = $id cannot view
    // Other than that can view
}
