<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Manga;
use App\Trade_marks;

class MangaApi extends Controller
{
    public function getTradeMarks($language)
    {
        return load_trade_mark_data_table(get_trade_mark_model($language));
    }

    public function getMangaList($language)
    {
        return load_manga_data_table(loadMangaHelper($language, $array = []));
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
