<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

// Model
use Illuminate\Http\Request;

class MangaApi extends Controller
{
    public function getTradeMarks($language)
    {
        return load_trade_mark_data_table(get_model('copyright', $language));
    }

    public function getMangaList($language)
    {
        return load_manga_data_table(get_model('manga', $language));
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
