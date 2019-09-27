<?php

namespace App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    
    protected function getColumns()
    {
        return Schema::getColumnListing('roles');
    }

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->getColumns(), (array) $value));
    }

    public function scopeType($query, $type)
    {
        return $query->where($type,true);
    }

    public function scopeExcept_Admin($query)
    {
        return $query->where('id','!=','99');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
