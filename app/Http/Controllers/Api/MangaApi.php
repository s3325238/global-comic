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
}
