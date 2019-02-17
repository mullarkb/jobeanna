<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public function skills()
    {
    	return $this->belongsToMany('App\skill','skill_location', 'skill_id', 'location_id')->withPivot('count')->withTimestamps();
    }
}
