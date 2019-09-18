<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class LogApi extends Controller
{
    public function getLog($type, $modelName)
    {
        // $user_logs = Activity::orderBy('id', 'DESC')->select('id', 'description', 'updated_at')->where('subject_type', '=', 'App\TranslateGroup')->get();
        return load_log_data_table(get_log($type, $modelName));
    }
}
