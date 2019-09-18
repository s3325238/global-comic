<?php

namespace App;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Database\Eloquent\Model;
// use App\Manga;

class Trade_marks extends Model
{
    use LogsActivity, CausesActivity;

    protected static $logAttributes = ['group_id', 'manga_id', 'language'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Copyright has been {$eventName}";
    }
    // table
    protected $table = 'trade_marks';

    public function scopeLanguage($query,$language)
    {
        # code...
        return $query->where('language','=',$language);
    }

    public function groupID()
    {
        # code...
        return $this->belongsTo('App\TranslateGroup','group_id');
    }

    public function mangaID()
    {
        # code...
        return $this->belongsTo('App\Manga','manga_id');
    }
}
