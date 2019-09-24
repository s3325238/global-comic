<?php

use App\Leader_members;
use App\Tasks;
use App\Videos;

if (!function_exists('total_noti')) {
    function total_noti()
    {
        $i = 0;

        if (count(get_pending_video(Auth::id())) > 0) {
            $i+= 1;
        }

        if (task_count() > 0) {
            $i+= 1;
        }
        return $i;
    }
}

if (!function_exists('task_count')) {
    function task_count()
    {
        $tasks = Tasks::personal()->orWhere->assigned()->status('0')->count();

        return $tasks;
    }
}