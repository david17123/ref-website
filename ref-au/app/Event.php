<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Relationships
    public function location()
    {
        return $this->belongsTo('App\University', 'location_id');
    }
}
