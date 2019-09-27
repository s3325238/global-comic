<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unique_Length extends Model
{
    //
    protected $table = 'unique_lengths';

    protected $casts = [
        'random_array' => 'array', // or 'object' if you like
    ];
}
