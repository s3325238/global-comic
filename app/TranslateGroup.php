<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class TranslateGroup extends Model
{
    use Sluggable;

    protected $table = 'translate_groups';

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
                'source' => 'group_name',
            ],
        ];
    }

    public function related()
    {
        return $this->belongsTo('App\Relationship', 'id');
    }

    public function user_lead()
    {
        return $this->hasOne('App\User', 'id', 'leader_id');
    }
}
