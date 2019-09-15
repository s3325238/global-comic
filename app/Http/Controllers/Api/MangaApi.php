<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Manga;

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

    public function removeManga(Request $request)
    {
        $id = $request->input('id');

        $manga = Manga::find($id);

        if ($manga == null) {
            return request()->session()->flash('alert-danger', 'Invalid data id!');
        }

        if ($manga->delete()) {
            return redirect()->back();

        } else {
            return request()->session()->flash('alert-danger', 'Failed to delete record!');
        }
    }

    public function getVietnameseManga()
    {
        $manga = loadMangaHelper('vi', $array = []);

        return load_manga_data_table($manga);
    }
}
