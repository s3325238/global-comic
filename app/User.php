<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class User extends Authenticatable
{
    use Notifiable , LogsActivity, CausesActivity;

    protected static $logAttributes = ['name', 'email', 'language', 'status', 'avatar', 'role_id'];

    protected static $logOnlyDirty = true;
    
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "User has been {$eventName}";
    }

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

    public function scopeRole_Datatable($query, $role_id)
    {
        return $query->where('role_id', '=', $role_id);
    }

    public function scopeGet_Leader($query)
    {
        $is_leader = Role::query()->where([
            ['leader','=',true]
        ])->first();
        return $query->where('role_id', '=', $is_leader->id);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', true);
    }

    public function scopeNot_active($query)
    {
        return $query->where('status', '=', false);
    }

    public function lead()
    {
        return $this->hasOne('App\TranslateGroup','leader_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function tasks()
    {
        return $this->hasMany('App\Tasks');
    }

    public function hasVideos()
    {
        return $this->hasMany('App\Videos','uploaded_by','id');
    }

    public function isMemberOf()
    {
        return $this->hasMany('App\Leader_members','member_id','id');
    }
}
