<?php

if (!function_exists('role_helper')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function role_helper($role, Array $based, Array $diff, Array $columns ,$mangas, $groups, $users, $others)
    {
        if ($mangas != NULL) {
            
            $based = array_merge($based, $mangas);

            foreach ($mangas as $manga) {
                $role->$manga = TRUE;
            }
        }

        // Group
        if ($groups != NULL) {
            
            $based = array_merge($based, $groups);

            foreach ($groups as $group) {
                $role->$group = TRUE;
            }
        }

        // User
        if ($users != NULL) {
            
            $based = array_merge($based, $users);

            foreach ($users as $user) {
                $role->$user = TRUE;
            }
        }

        // Other
        if ($others != NULL) {
            
            $based = array_merge($based, $others);

            foreach ($others as $other) {
                $role->$other = TRUE;
            }
        }

        //
        $diff = array_diff($columns,$based);

        foreach ($diff as $value) {
            $role->$value = FALSE;
        }

        return $role;
    }
}
