<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetGroup extends Model
{
    protected $hidden = ['allAssets'];
    protected $appends = ['assets'];

    // Relationships
    public function allAssets()
    {
        return $this->hasMany('App\Asset', 'asset_group_id');
    }

    public function getAssetsAttribute()
    {
        return $this->allAssets()->where('temporary', '=', false)->get();
    }

    public function removeAllAssets()
    {
        $assets = $this->assets;
        foreach ($assets as $asset)
        {
            $asset->remove();
        }
    }

    public function cleanDelete()
    {
        $this->removeAllAssets();
        $this->delete();
    }
}
