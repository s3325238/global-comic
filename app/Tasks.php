<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Tasks extends Model
{
    //

    public function scopePersonal($query)
    {
        return $query->where('user_id','=',Auth::id());
    }

    public function scopeAssigned($query)
    {
        return $query->where('assigned','=',Auth::id());
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status','=', $status);
    }

    public function auth_tasks()
    {
        return $this->belongsTo('App\Tasks','user_id');
    }
}
