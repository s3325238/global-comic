<?php

namespace App\Policies;

use App\User;
use App\Roles;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPermissionPolicy
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

    public function create_group($user)
    {
        $can_create = Roles::where('id','==');
    }

    public function view_group($user)
    {

    }

    public function update_group($user)
    {

    }

    public function delete_group($user)
    {

    }

    public function add_copyright($user)
    {

    }
}
