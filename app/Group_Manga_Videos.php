<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_Manga_Videos extends Model
{
    //
    public function groups()
    {
        return $this->belongsTo('App\TranslateGroup','group_id');
    }

    public function mangas()
    {
        return $this->belongsTo('App\Mangas','manga_id');
    }

    public function videos()
    {
        return $this->hasOne('App\Videos');
    }
}
