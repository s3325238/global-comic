<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tasks;

class TasksApi extends Controller
{
    public function getPersonalTask()
    {
        $tasks = Tasks::personal()->orWhere->assigned()->status('0')->get();

        return load_personal_task_data_table($tasks);
    }

    public function getMemberTask()
    {
        $tasks = Tasks::member()->get();

        return load_member_task_data_table($tasks);
    }

    public function getTaskAjaxUpdate(Request $request)
    {
        $id = $request->input('id');

        $task = Tasks::find($id);

        if ($task->update(['status',true])) {
            return redirect()->back();

        } else {
            return request()->session()->flash('alert-danger', 'Failed to delete record!');
        }
    }
}
