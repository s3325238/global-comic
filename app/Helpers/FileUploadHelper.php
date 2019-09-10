<?php
use Illuminate\Support\Facades\Hash;

// use File;
if (!function_exists('file_upload')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function file_upload($path, $original_name)
    {
        if ($original_name != NULL) {

            $file = $original_name;

            $hash = Hash::make($original_name); // Making hash

            $file->move($path, $hash);
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