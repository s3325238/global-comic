<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class LogApi extends Controller
{
    public function getLog($type, $modelName)
    {
        return load_log_data_table(get_log($type, $modelName));
    }

    public function getOtherLog($type, $modelName)
    {
        return load_other_log_data_table(get_log($type, $modelName));
    }

    // Delete hidden method
    public function deleteNullCauser($model)
    {
        Activity::where([
            ['causer_id', '=', null],
            ['subject_type', '=', $model],
        ])->delete();

        return redirect()->back();
    }
}
