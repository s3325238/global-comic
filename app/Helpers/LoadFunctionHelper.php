<?php
use Illuminate\Support\Arr;

// Model
use App\User;
use App\Manga;
use App\Trade_marks;
use App\TranslateGroup;

if (!function_exists('get_trade_mark_model')) {
    function get_trade_mark_model($language)
    {
        return Trade_marks::select('id', 'group_id', 'manga_id', 'created_at', 'updated_at')->language($language)->get();
    }
}

if (!function_exists('loadMangaHelper')) {
    function loadMangaHelper($language, $array)
    {
        $exist_manga = Trade_marks::select('manga_id')->get();

        foreach ($exist_manga as $manga) {
            $array = Arr::prepend($array, $manga->manga_id);
        }

        return Manga::select('id', 'name', 'updated_at')->language($language)->whereNotIn('id', $array)->get();
    }
}

// Get model function
if (!function_exists('get_user_viewers_model')) {
    function get_user_viewers_model($language)
    {
        return User::select('id', 'name', 'email', 'created_at', 'updated_at')->role_datatable('1')->language($language)->active()->get();
    }
}

if (!function_exists('get_group_model')) {
    function get_group_model($language)
    {
        return TranslateGroup::select('id','name','leader_id','follows','points','created_at')->select_language($language)->leader('!=', null)->get();
    }
}