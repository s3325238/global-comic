<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use App\Settings;

if (!function_exists('get_storage_helper')) {
    function get_storage_helper()
    {
        return Settings::find(1)->STORAGE_PATH;
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

if (!function_exists('storage_store')) {
    function storage_store($type, $image, $path)
    {
        switch ($type) {
            case 'single':
                # code...
                if ($image != null) {
                    $fileNameToStore = time().'_'.md5_file($image->getRealPath()); // Making hash

                    $image->storeAs($path, $fileNameToStore);
                } else {
                    $fileNameToStore = 'default.png';
                }

                return $fileNameToStore;
                break;
            case 'multiple':
                $fileArray = [];
                foreach ($image as $item) {

                    $fileNameToStore = time().'_'.md5_file($item->getRealPath()); // Making hash
        
                    // $item->move($path, $hash);

                    $item->storeAs($path, $fileNameToStore);
        
                    array_push($fileArray, $fileNameToStore);
                }
                return $fileArray;
                break;
            default:
                # code...
                break;
        }
    }
}