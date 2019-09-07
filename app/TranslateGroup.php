<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslateGroup extends Model
{
    public function related()
    {
        return $this->belongsTo('App\Relationship', 'id');
    }
}
