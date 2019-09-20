<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class Manga extends Model
{
    use Sluggable, LogsActivity, CausesActivity;

    protected $table = 'mangas';

    protected $fillable = ['name', 'slug', 'logo', 'group_id'];

    protected static $logAttributes = ['name', 'logo', 'language'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Manga has been {$eventName}";
    }

    protected function getColumns()
    {
        $columns = Schema::getColumnListing($this->table); // translate_groups table

        return $columns;
    }

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->getColumns(), (array) $value));
    }

    public function scopeLanguage($query, $lang)
    {
        return $query->where('language', '=', $lang);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function groups(Type $var = null)
    {
        return $this->belongsTo('App\TranslateGroup', 'group_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Group_Manga_Videos', 'manga_id', 'id');
    }
    // manga : id, name, slug, author_id, is_registered, group_id
    // leader: bấm vào và show mâng unpublished -> manga db -> query by groupId
}
