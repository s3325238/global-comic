<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';
    
    public function belongsToManga()
    {
        return $this->belongsTo('App\Mangas','manga_id');
    }

    public function belongsToUser()
    {
        return $this->belongsTo('App\User','uploaded_by');
    }
}
