<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * List of columns in the table
     * Used for scopeExclude function
     */
    protected $columns = array('id', 'name', 'email', 'status', 'role_id', 'language', 'created_at', 'updated_at');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'language', 'verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->columns, (array) $value));
    }

    public function scopeLanguage($query, $lang)
    {
        return $query->where('language', '=', $lang);
    }

    // Language, role, user id != leader_id ( reference to Translate_groups table )
    public function scopeExclude_leader_in_group($query, $value = array())
    {
        // return $query->select(array_diff((array) $leader_id, (array) $value));
        // return $query->diff(User::whereIn('id', (array) $value)->get());
    }

    public function scopeRole_Datatable($query, $role_id)
    {
        return $query->where('role_id', '=', $role_id);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', true);
    }

    public function scopeNot_active($query)
    {
        return $query->where('status', '=', false);
    }

    public function role()
    {
        return $this->belongsTo('App\Roles', 'role_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Tasks');
    }
}
