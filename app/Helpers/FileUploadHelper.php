<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

if (!function_exists('file_upload')) {

    function file_upload($path, $request)
    {
        if ($request != null) {

            $name = $request->getClientOriginalName();

            // $file = $original_name->getClientOriginalName();

            $hash = Hash::make($name); // Making hash

            make_directory($path);

            $request->move($path, $hash);
        } else {
            $hash = 'default.png';
        }

        return $hash;
    }
}

if (!function_exists('multiple_file_upload')) {

    function multiple_file_upload($path, $image_array)
    {
        make_directory($path);

        $array = [];

        foreach ($image_array as $key => $value) {

            $name = $value->getClientOriginalName();

            $hash = Hash::make($name); // Making hash

            $value->move($path, $hash);

            array_push($array, $hash);
        }

        return $array;
    }
}

if (!function_exists('make_directory')) {

    function make_directory($path)
    {
        # code...
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }
}

if (!function_exists('remove_directory')) {
    function remove_directory($path)
    {
        File::deleteDirectory($path);
    }
}

if (!function_exists('slugging_manually')) {

    function slugging_manually($string)
    {
        return str_slug($string, '-');
    }
}

if (!function_exists('get_path')) {
    function get_path($root_path, $slug, $chapter)
    {
        return $root_path . Auth::user()->language . '/' . $slug . '/' . $chapter;
    }
}
