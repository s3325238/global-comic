<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

// Model
use Illuminate\Http\Request;

class MangaApi extends Controller
{
    public function __construct()
    {
        // $this->authorize('access-copyright', Auth::user());
    }
    public function getTradeMarks($language)
    {
        // $this->authorize('access-copyright', Auth::user());
        return load_copyright_data_table(get_model('copyright', $language));
    }

    public function getMangaList($language)
    {
        // if (Gate::allows('access-copyright', Auth::user())) {
            return load_manga_data_table(get_model('manga', $language));
        // }
        // abort(404);
        
    }

    public function removeCopyright(Request $request)
    {
        get_model_delete('copyright', $request);

        return redirect()->back();
    }

    public function removeManga(Request $request)
    {
        get_model_delete('manga', $request);

        return redirect()->back();
    }
}
