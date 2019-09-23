<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Extension
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Cviebrock\EloquentSluggable\Sluggable;

class Chapters extends Model
{
    use Sluggable, LogsActivity, CausesActivity;

    protected $fillable = ['name', 'slug'];

    protected static $logAttributes = ['name'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected $casts = [
        'source' => 'array', // or 'object' if you like
    ];

    protected function getColumns()
    {
        $columns = Schema::getColumnListing('chapters'); // chapters table

        return $columns;
    }

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->getColumns(), (array) $value));
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function belongsToManga()
    {
        return $this->belongsTo('App\Mangas','manga_id');
    }
}
