<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataTable extends Controller
{
    public function getGroup($language)
    {
        return load_group_data_table(get_group_model($language));
    }

    public function getUser($language)
    {
        return load_user_data_table(get_user_viewers_model($language));
    }
    
    public function getTradeMarks($language)
    {
        return load_trade_mark_data_table(get_trade_mark_model($language));
    }
}
