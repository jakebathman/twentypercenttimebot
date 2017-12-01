<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    protected $revisionCreationsEnabled = true;

    protected $guarded = [];

    public function setDurationAttribute($value)
    {
        $this->attributes['duration'] = str_pad($value, 8, '00:00:00', STR_PAD_LEFT);
    }

    public function setPubDateAttribute($value)
    {
        $this->attributes['pubDate'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getDurationMinutes()
    {
        $duration  = Carbon::parse($this->duration);
        return ($duration->hour * 60) + $duration->minute + ($duration->second / 60);
    }

    public static function boot()
    {
        parent::boot();
    }

}
