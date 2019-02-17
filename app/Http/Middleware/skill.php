<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    public function locations()
    {
    	return $this->belongsToMany('App\location', 'skill_location', 'skill_id', 'location_id')->withPivot('count')->withTimestamps();
    }
}
