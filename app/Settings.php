<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'CAPTCHA_KEY', 'CAPTCHA_SECRET',
    ];
}
