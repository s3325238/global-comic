<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tasks;

class TasksApi extends Controller
{
    //
    public function getPersonalTask()
    {
        $task = Tasks::select('id','description','priority')->personal()->orWhere->assigned()->status('0')->get();

        return personal_task_data_table($task);
    }

    public function getTaskAjaxUpdate(Request $request)
    {
        $id = $request->input('id');

        $task = Tasks::find($id);

        // $task->update(['status',true]);

        if ($task->update(['status',true])) {
            return redirect()->back();

        } else {
            return request()->session()->flash('alert-danger', 'Failed to delete record!');
        }

        // return redirect()->back();
    }
}
