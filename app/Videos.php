<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

// Extension
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Cviebrock\EloquentSluggable\Sluggable;

class Videos extends Model
{
    use Sluggable, LogsActivity, CausesActivity;

    protected $table = 'videos';

    protected function getColumns()
    {
        $columns = Schema::getColumnListing('videos'); // videos table

        return $columns;
    }

    public function scopeExclude($query, $value = array())
    {
        return $query->select(array_diff($this->getColumns(), (array) $value));
    }

    protected $fillable = ['name','slug','chapter'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function scopeIs_published($query, $boolean)
    {
        # code...
        return $query->where('is_published', $boolean);
    }
    
    public function belongsToManga()
    {
        return $this->belongsTo('App\Manga','manga_id');
    }

    public function belongsToUser()
    {
        return $this->belongsTo('App\User','uploaded_by','id');
    }

    public function getChapter()
    {
        return $this->hasOne('App\Chapters', 'id', 'chapter_id');
    }
}
