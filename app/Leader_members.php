<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader_members extends Model
{
    protected $fillable = ['leader_id', 'member_id', 'position'];

    public function member()
    {
        return $this->belongsTo('App\User', 'member_id');
    }

    public function leader()
    {
        return $this->belongsTo('App\User', 'leader_id');
    }

    public function belongsToPosition()
    {
        return $this->belongsTo('App\Positions', 'position');
    }
}
