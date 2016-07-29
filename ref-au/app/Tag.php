<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Relationships
    public function sermonSummaries()
    {
        return $this->belongsToMany('App\SermonSummary', 'sermon_summary_tags', 'tag_id', 'sermon_summary_id')
                    ->withTimestamps();
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_tags', 'tag_id', 'article_id')
                    ->withTimestamps();
    }
}
