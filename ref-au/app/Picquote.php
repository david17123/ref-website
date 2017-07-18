<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picquote extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    // Relationships
    public function image()
    {
        return $this->belongsTo('App\Asset', 'image_id');
    }
}
