<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Model
use App\Trade_marks;

class MangaApi extends Controller
{
    public function getTradeMarks($language)
    {
        return load_trade_mark_data_table(get_trade_mark_model($language));
    }

    public function getVietnameseManga()
    {
        $manga = loadMangaHelper('vi',$array = []);
    }
}
