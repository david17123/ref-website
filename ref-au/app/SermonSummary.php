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

    // Relationships
    public function preacher()
    {
        return $this->belongsTo('App\Author', 'preacher_id');
    }

    public function summarizer()
    {
        return $this->belongsTo('App\Author', 'summarizer_id');
    }

    public function sermonLocation()
    {
        return $this->belongsTo('App\University', 'sermon_location_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'sermon_summary_tags', 'sermon_summary_id', 'tag_id')
                    ->withTimestamps();
    }
}
