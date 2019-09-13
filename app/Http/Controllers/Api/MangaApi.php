<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Model
use App\Trade_marks;

class MangaApi extends Controller
{
    public function getVietnameseTradeMarks()
    {
        $vi = Trade_marks::select('id','group_id','manga_id','created_at','updated_at')->language('vi')->get();

        return trade_mark_data_table($vi);
    }

    public function getEnglishTradeMarks()
    {
        $en = Trade_marks::select('id','group_id','manga_id','created_at','updated_at')->language('en')->get();

        return trade_mark_data_table($en);
    }

    public function getJapaneseTradeMarks()
    {
        $jp = Trade_marks::select('id','group_id','manga_id','created_at','updated_at')->language('jp')->get();

        return trade_mark_data_table($jp);
    }

    public function getKoreanTradeMarks()
    {
        $kr = Trade_marks::select('id','group_id','manga_id','created_at','updated_at')->language('kr')->get();

        return trade_mark_data_table($kr);
    }
}
