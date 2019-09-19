<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class LogApi extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    
    public function getLog($type, $modelName)
    {
        switch ($type) {
            case 'user':
                return load_log_data_table(get_log($type, $modelName));
                break;
            case 'other':
                return load_other_log_data_table(get_log($type, $modelName));
                break;
            default:
                # code...
                break;
        }   
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
