<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader_members extends Model
{
    public function member()
    {
        return $this->belongsTo('App\User','member_id');
    }

    public function leader()
    {
        return $this->belongsTo('App\User','leader_id');
    }
}
