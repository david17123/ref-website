<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SermonSummary extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'date_preached'
    ];
}
