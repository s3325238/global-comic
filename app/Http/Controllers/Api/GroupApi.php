<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TranslateGroup;

class GroupApi extends Controller
{
    public function getGroup($language)
    {
        return load_group_data_table(get_group_model($language));
    }

    function groupRemove(Request $request)
    {
        $id = $request->input('id');

        $group = TranslateGroup::find($id);

        if ($group == null) {
            return request()->session()->flash('alert-danger', 'Invalid data id!');
        }

        if ($group->delete()) {
            return redirect()->back();

        } else {
            return request()->session()->flash('alert-danger', 'Failed to delete record!');
        }
    }
}
