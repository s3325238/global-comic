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

    public function belongsToUser()
    {
        return $this->belongsTo('App\User','uploaded_by');
    }
}
