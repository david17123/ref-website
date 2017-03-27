<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'universities';

    // Relationships
    public function logo()
    {
        return $this->belongsTo('App\Asset', 'logo_id');
    }
}
