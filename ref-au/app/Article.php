<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Relationships
    public function author()
    {
        return $this->belongsTo('App\Author', 'author_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tags', 'article_id', 'tag_id')
                    ->withTimestamps();
    }
}
