<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetGroup extends Model
{
    // Relationships
    public function assets()
    {
        return $this->hasMany('App\Asset', 'asset_group_id');
    }
}
