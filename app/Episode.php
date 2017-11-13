<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Episode extends Model
{
  use \Venturecraft\Revisionable\RevisionableTrait;
  protected $revisionCreationsEnabled = true;
  
  protected $guarded = [];

  public function setDurationAttribute($value) {
    $this->attributes['duration'] = str_pad($value,8,'00:00:00',STR_PAD_LEFT);
  }

  public function setPubDateAttribute($value) {
    $this->attributes['pubDate'] = Carbon::parse($value)->format('Y-m-d H:i:s');
  }

  public static function boot()
  {
    parent::boot();
  }

}
