<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Videos;
use App\TranslateGroup;
use App\User;

class LeaderApi extends Controller
{
    public function getMember()
    {
        return load_member_data_table(get_member(Auth::id()));
    }

    public function getPublishedVideo()
    {
        return load_published_video_data_table(get_published_video());
    }

    public function getPendingVideo()
    {
        return load_pending_video_data_table(get_pending_video());
    }

    public function getPersonalVideo()
    {
        # code...
        $this->authorize('only_member', Videos::class);

        return load_member_video_data_table(get_personal_video());
    }

    public function removeVideo(Request $request)
    {
        $this->authorize('delete_video', Videos::class);
        
        get_model_delete('video', $request);

        return redirect()->back();
    }
}
