<?php

if (!function_exists('role_update_helper')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function role_update_helper($role, Array $based, Array $diff, Array $columns ,$permissions)
    {
        // Other
        if ($permissions != NULL) {
            
            $based = array_merge($based, $permissions);

            foreach ($permissions as $permission) {
                $role->$permission = TRUE;
            }
        }

        // Compare and get differences
        $diff = array_diff($columns,$based);

        foreach ($diff as $value) {
            $role->$value = FALSE;
        }

        return $role;
    }
} 
if (!function_exists('add_role_helper')) {
    function add_role_helper($role, $permissions) {

        if ($permissions != NULL) {
            foreach ($permissions as $permission) {

                $role->$permission = TRUE;
                
            }
        }

        return $role;

    }
}