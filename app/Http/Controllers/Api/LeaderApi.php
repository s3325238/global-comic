<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaderApi extends Controller
{
    public function getMember()
    {
        return load_member_data_table(get_member(Auth::id()));
    }

    public function getPendingVideo()
    {
        return load_pending_video_data_table(get_pending_video(Auth::id()));
    }
}
