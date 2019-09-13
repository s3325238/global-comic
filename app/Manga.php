<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Manga extends Model
{
    use Sluggable;
    
    protected $table = 'mangas';

    protected function getColumns()
    {
        $columns = Schema::getColumnListing($this->table); // translate_groups table

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
                'source' => 'manga_title',
            ],
        ];
    }
}
