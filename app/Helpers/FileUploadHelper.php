<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

// use File;
if (!function_exists('file_upload')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function file_upload($path, $request)
    {
        if ($request != NULL) {

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

    function multiple_file_upload(Type $var = null)
    {
        # code...
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