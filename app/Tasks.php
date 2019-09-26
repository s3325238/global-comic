<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Tasks extends Model
{
    protected $table = 'tasks';

    public function scopeAssigned($query)
    {
        return $query->where([
            ['assigned', '=', Auth::id()]
        ]);
    }

    public function scopePersonal($query)
    {
        return $query->where([
            ['user_id', '=', Auth::id()],
            ['assigned', '=', null]
        ]);
    }

    public function scopeMember($query)
    {
        return $query->where([
            ['user_id', '=', Auth::id()],
            ['assigned', '!=', Auth::id()]
        ]);
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status','=', $status);
    }

    public function assignedFrom()
    {
        return $this->belongsTo('App\User','assigned');
    }

    public function host()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
