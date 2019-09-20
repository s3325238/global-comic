<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    public function position_type()
    {
        return $this->hasMany('App\User','position','id');
    }
}
