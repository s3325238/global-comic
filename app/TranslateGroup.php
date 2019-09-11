<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class TranslateGroup extends Model
{
    use Sluggable;

    protected $table = 'translate_groups' ;

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

    public function scopeNo_leader($query)
    {
        return $query->where('leader_id', '=', null);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function related()
    {
        return $this->belongsTo('App\Relationship', 'id');
    }
}
