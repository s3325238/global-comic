<?php

namespace App;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class TranslateGroup extends Model
{
    use Sluggable, LogsActivity, CausesActivity;

    protected $table = 'translate_groups';

    protected $fillable = ['name', 'slug', 'leader_id', 'follows', 'points'];

    protected static $logAttributes = ['name', 'slug', 'leader_id', 'follows', 'points'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Translate Group has been {$eventName}";
    }

    protected function getColumns()
    {
        $columns = Schema::getColumnListing('translate_groups'); // translate_groups table

        return $columns;
    }

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->getColumns(), (array) $value));
    }

    public function scopeSelect_Language($query, $lang)
    {
        return $query->where('language_translate', '=', $lang);
    }

    public function scopeLeader($query, $operator, $value)
    {
        return $query->where('leader_id',$operator, $value);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    // public function related()
    // {
    //     return $this->belongsTo('App\Relationship', 'id');
    // }

    public function user_lead()
    {
        return $this->hasOne('App\User', 'id', 'leader_id');
    }

    public function mangas()
    {
        return $this->hasMany('App\Manga','group_id','id');
    }

    public function videos()
    {
        return $this->hasMany('App\Group_Manga_Videos','group_id','id');
    }
    // user_id 
    // group_id
}
