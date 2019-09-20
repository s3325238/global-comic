<?php
use App\Manga;
use App\TranslateGroup;

// Model
use App\User;
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
