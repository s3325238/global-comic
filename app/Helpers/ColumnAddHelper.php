<?php

use Illuminate\Support\Arr;

if (!function_exists('array_helper')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function array_helper($users, $groups)
    {
        $different = [];
        $duplicate = [];
        foreach ($users as $user) {
            foreach ($groups as $group) {
                if ($user->id == $group->leader_id) {
                    // echo '#1';
                    // die();
                    $duplicate = Arr::prepend($duplicate, $user->id, $user->name);
                } else {
                    $different = Arr::prepend($different,$user->id,$user->name);
                }
            }
        }
        return $duplicate;
    }
}
