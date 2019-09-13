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
