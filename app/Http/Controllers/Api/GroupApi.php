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

    public function getEnglishGroup()
    {
        $groups = TranslateGroup::select('id','name','leader_id','follows','points','created_at')->select_language('en')->leader('!=', null)->get();

        return group_data_table($groups);
    }

    public function getJapaneseGroup()
    {
        $groups = TranslateGroup::select('id','name','leader_id','follows','points','created_at')->select_language('jp')->leader('!=', null)->get();

        return group_data_table($groups);
    }

    public function getKoreanGroup()
    {
        $groups = TranslateGroup::select('id','name','leader_id','follows','points','created_at')->select_language('kr')->leader('!=', null)->get();

        return group_data_table($groups);
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
