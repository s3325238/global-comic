<?php

if (!function_exists('setSideBarActive')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setSideBarActive($path, $active){
        return call_user_func_array('Request::is', (array) $path) ? $active : '';
    }
}
