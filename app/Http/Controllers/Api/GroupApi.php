<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupApi extends Controller
{
    public function getGroup($language)
    {
        return load_group_data_table(get_group_model($language));
    }

    public function groupRemove(Request $request)
    {
        get_model_delete('group', $request);

        return redirect()->back();
    }
}
