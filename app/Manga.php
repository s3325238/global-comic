<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Manga extends Model
{
    use Sluggable, LogsActivity, CausesActivity;
    
    protected $table = 'mangas';

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

    public function tradeMarkRegistered()
    {
        # code...
        return $this->hasMany('App\Trade_marks','manga_id','id');
    }
}
