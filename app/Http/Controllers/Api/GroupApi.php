<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TranslateGroup;

class GroupApi extends Controller
{
    public function getVietnameseGroup()
    {
        $groups = TranslateGroup::select('id','name','leader_id','follows','points','created_at')->select_language('vi')->leader('!=', null)->get();

        return group_data_table($groups);
    }
}
