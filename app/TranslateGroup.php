<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Cviebrock\EloquentSluggable\Sluggable;

class TranslateGroup extends Model
{
    use Sluggable;

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

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function related()
    {
        return $this->belongsTo('App\Relationship', 'id');
    }
}
