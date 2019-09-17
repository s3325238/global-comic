<?php

if (!function_exists('make_disabled_select_option')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function make_disabled_select_option($card_type, $card_title, $class_name)
    {
        return '<div class="card">
        <div class="card-header card-header-text card-header-'.$card_type.'">
            <div class="card-text">
                <h4 class="card-title">' . $card_title . '</h4>
            </div>
        </div>
        <div class="card-body">
            <select class="selectpicker ' . $class_name . '" data-live-search="true" id="' . $class_name . '" name="' . $class_name . '" data-style="btn btn-primary btn-round"
                data-width="100%" title="Choose Group">
                <option disabled selected> Choose ' . $card_title . '</option>
            </select>
        </div>
    </div>';
    }
}

if (!function_exists('make_language_select_option')) {
    function make_language_select_option($class_name)
    {
        return '<div class="card">
        <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
                <h4 class="card-title">Language</h4>
            </div>
        </div>
        <div class="card-body">
            <select class="selectpicker" id="'.$class_name.'" name="'.$class_name.'" data-style="btn btn-primary btn-round"
                data-width="100%" title="Choose Language">
                <option value="vi">Vietnamese</option>
                <option value="en">English</option>
                <option value="jp">Japanese</option>
                <option value="kr">Korean</option>
            </select>
        </div>
    </div>';
    }
}