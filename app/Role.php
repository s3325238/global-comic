<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $columns = array('id', 'role_name',
        'create_manga', 'view_manga', 'update_manga', 'delete_manga',
        'create_group', 'view_group', 'update_group', 'delete_group',
        'create_user', 'view_user', 'update_user', 'delete_user', 
        'add_copyright', 'view_settings',
        'created_at', 'updated_at');

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->columns, (array) $value));
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
