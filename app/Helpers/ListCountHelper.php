<?php

use App\Leader_members;
use App\Tasks;
use App\Videos;

if (!function_exists('total_noti')) {
    function total_noti()
    {
        $i = 0;

        if ( pending_video_count() > 0) {
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

if (!function_exists('pending_video_count')) {
    function pending_video_count()
    {
        $member_id_array = [];

        $members = Leader_members::select('member_id')->where('leader_id', '=', Auth::id())->get();

        foreach ($members as $member) {
            array_push($member_id_array, $member->member_id);
        }

        return Videos::where([
            ['published_time', '=', null],
            ['is_published', '=', false],
        ])->whereIn('uploaded_by', $member_id_array)->count();
    }
}