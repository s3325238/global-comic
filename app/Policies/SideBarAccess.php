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

    public function access_admin_right($user)
    {
        if ($user->role_id == '99') {
            return true;
        }
        return false;
    }

    public function access_copyright($user)
    {
        if ($user->role->access_copyright == TRUE) {
            return true;
        }
        return false;
    }

    public function only_member($user)
    {
        if ($user->role->member == TRUE) {
            return true;
        }
        return false;
    }

    public function only_leader($user)
    {
        if ($user->role->leader == TRUE) {
            return true;
        }
        return false;
    }

    public function both_leader_member($user)
    {
        if ($user->role->leader == TRUE || $user->role->member == TRUE) {
            return true;
        }
        return false;
    }

    public function assignTask($user)
    {
        if ($user->role->assign_task == TRUE) {
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

    public function accessFinance($user)
    {
        if ($user->role->access_finance == TRUE) {
            return true;
        }
        return false;
    }

    // Manga & Copyright Permission

    public function viewMangaLists($user)
    {
        if ($user->role->view_manga == TRUE) {
            return true;
        }
        return false;
    }

    public function createNewManga($user)
    {
        if ($user->role->create_manga == TRUE) {
            return true;
        }
        return false;
    }

    public function updateManga($user)
    {
        if ($user->role->update_manga == TRUE) {
            return true;
        }
        return false;
    }

    public function deleteManga($user)
    {
        if ($user->role->delete_manga == TRUE) {
            return true;
        }
        return false;
    }

    // Group Permission

    public function viewGroupLists($user)
    {
        if ($user->role->view_group == TRUE) {
            return true;
        }
        return false;
    }

    public function createNewGroup($user)
    {
        if ($user->role->create_group == TRUE) {
            return true;
        }
        return false;
    }

    public function updateGroup($user)
    {
        if ($user->role->update_group == TRUE) {
            return true;
        }
        return false;
    }

    public function deleteGroup($user)
    {
        if ($user->role->delete_group == TRUE) {
            return true;
        }
        return false;
    }

    // User CRUD permission

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

    // Video CRUD

    public function viewVideoLists($user)
    {
        if ($user->role->view_video == TRUE) {
            return true;
        }
        return false;
    }

    public function createVideo($user)
    {
        if ($user->role->create_video == TRUE) {
            return true;
        }
        return false;
    }

    public function updateVideo($user)
    {
        if ($user->role->update_video == TRUE) {
            return true;
        }
        return false;
    }

    public function deleteVideo($user)
    {
        if ($user->role->delete_video == TRUE) {
            return true;
        }
        return false;
    }
}
