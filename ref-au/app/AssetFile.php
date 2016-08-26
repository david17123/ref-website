<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetFile extends Model
{
    // Relationships
    public function asset()
    {
        return $this->belongsTo('App\Asset', 'asset_id');
    }

    public function getURL()
    {
        return '/img/assets/'.$this->cloudFilename;
    }
}
