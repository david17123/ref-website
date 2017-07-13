<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date_commenced',
        'date_finished'
    ];

    // Relationships
    public function location()
    {
        return $this->belongsTo('App\University', 'location_id');
    }
}
