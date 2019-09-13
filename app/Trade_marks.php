<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Manga;

class Trade_marks extends Model
{
    // table
    protected $table = 'trade_marks';

    public function scopeLanguage($query,$language)
    {
        # code...
        return $query->where('language','=',$language);
    }

    public function groupID()
    {
        # code...
        return $this->belongsTo('App\TranslateGroup','group_id');
    }

    public function mangaID()
    {
        # code...
        return $this->belongsTo('App\Manga','manga_id');
    }
}
