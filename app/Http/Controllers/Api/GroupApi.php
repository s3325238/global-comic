<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TranslateGroup;

class GroupApi extends Controller
{
    public function getGroup($language)
    {
        $this->authorize('view_group', TranslateGroup::class);
        
        return load_group_data_table(get_model('group', $language));
    }

    public function groupRemove(Request $request)
    {
        $this->authorize('delete_group', TranslateGroup::class);

        get_model_delete('group', $request);

        return redirect()->back();
    }
}
