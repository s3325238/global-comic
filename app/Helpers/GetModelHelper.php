<?php
use App\Manga;
use App\Trade_marks;
use App\TranslateGroup;

// Model
use App\User;
use Illuminate\Support\Arr;
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
                return Trade_marks::select('id', 'group_id', 'manga_id', 'created_at', 'updated_at')
                    ->language($language)
                    ->get();
                break;
            case 'manga':
                $array = [];

                $exist_manga = Trade_marks::select('manga_id')->get();

                foreach ($exist_manga as $manga) {
                    $array = Arr::prepend($array, $manga->manga_id);
                }

                return Manga::select('id', 'name', 'updated_at')->language($language)->whereNotIn('id', $array)->get();
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
                $trade_marks = Trade_marks::find($id);
                return $trade_marks->delete();
                break;

            default:
                # code...
                break;
        }
    }
}

if (!function_exists('get_log')) {
    function get_log($type,$modelName)
    {
        switch ($type) {
            case 'user':
                return Activity::select('id', 'description', 'updated_at')->where('subject_type', '=', $modelName)->get();
                break;

            default:
                # code...
                break;
        }
    }
}
