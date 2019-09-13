<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade_marks extends Model
{
    // table
    protected $table = 'trade_marks';

    public function groupID()
    {
        # code...
        return $this->belongsTo('App\TranslateGroup');
    }

    public function mangaID()
    {
        # code...
        return $this->belongsTo('App\Manga');
    }
}
