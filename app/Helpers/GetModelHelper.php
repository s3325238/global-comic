<?php
use App\Leader_members;
use App\Manga;
use App\TranslateGroup;
use App\User;

// Model
use App\Videos;
use Spatie\Activitylog\Models\Activity;

if (!function_exists('get_model')) {
    function get_model($model, $language)
    {
        switch ($model) {
            case 'group':
                return TranslateGroup::select('id', 'name', 'leader_id', 'follows', 'points', 'created_at')
                    ->select_language($language)
                    ->leader('!=', null)
                    ->get();
                break;
            case 'user_viewer':
                return User::select('id', 'name', 'email', 'created_at', 'updated_at')
                    ->role_datatable('1')
                    ->language($language)
                    ->active()
                    ->get();
                break;
            case 'copyright':
                return Manga::select('id', 'name', 'group_id', 'updated_at')->language($language)->where('group_id', '!=', null)->get();
                break;
            case 'manga':
                return Manga::select('id', 'name', 'updated_at')->language($language)->where('group_id', '=', null)->get();
                break;
            default:
                # code...
                break;
        }
    }
}

if (!function_exists('get_model_delete')) {
    function get_model_delete($model, $request)
    {
        $id = $request->input('id');
        # code...
        switch ($model) {
            case 'group':
                $group = TranslateGroup::find($id);
                return $group->delete();
                break;
            case 'manga':
                $manga = Manga::find($id);
                return $manga->delete();
                break;
            case 'copyright':
                $copyright = Manga::find($id);

                $copyright->group_id = null;

                return $copyright->save();
                break;
            case 'video':
                $video = Videos::where('uniqueString', $id)->first();

                $member = Leader_members::select('leader_id','member_id')->where('member_id',$video->uploaded_by)->first();

                if(!isset($member)) {
                    abort(404);
                } else {
                    if ($member->leader_id != Auth::id()) {
                        abort(404);
                    }
                }

                $path = get_storage_helper() . $video->belongsToGroup->slug . '/' . $video->belongsToManga->slug . '/' . $video->getChapter->slug;

                Storage::deleteDirectory($path);

                $video->getChapter->delete();

                return $video->delete();
                break;
            default:
                # code...
                break;
        }
    }
}

if (!function_exists('get_log')) {
    function get_log($type, $modelName)
    {
        switch ($type) {
            case 'user':
                return Activity::select('id', 'description', 'updated_at')->where('subject_type', '=', $modelName)->get();
                break;

            default:
                return Activity::all()->load('causer')
                    ->where('subject_type', '!=', $modelName)
                    ->where('causer_id', '!=', '1');
                break;
        }
    }
}

if (!function_exists('get_member')) {
    function get_member($auth_id)
    {
        return Leader_members::where('leader_id', '=', $auth_id)->get();
    }
}
// Get video
if (!function_exists('get_published_video')) {
    function get_published_video()
    {
        $group = TranslateGroup::where('leader_id', Auth::id())->first();

        return Videos::where([
            ['group_id', '=', $group->id],
            ['published_time', '!=', null],
        ])->get();
    }
}

if (!function_exists('get_pending_video')) {
    function get_pending_video()
    {
        $group = TranslateGroup::where('leader_id', Auth::id())->first();

        return Videos::where([
            ['group_id', '=', $group->id],
            ['published_time', '=', null],
            ['is_published', '=', false],
        ])->get();
    }
}

if (!function_exists('get_personal_video')) {
    function get_personal_video()
    {
        return Videos::where([
            ['uploaded_by', '=', Auth::id()]
        ])->get();
    }
}