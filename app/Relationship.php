<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function groups()
    {
        return $this->hasMany('App\TranslateGroup','group_id');
    }
}
