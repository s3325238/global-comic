<?php
use Illuminate\Support\Str;

if (!function_exists('slug_converter')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function slug_converter($string)
    {
        return Str::slug($string,'-');
    }
}
