<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetFile extends Model
{
    protected $visible = ['id', 'type', 'cloud_filename', 'size', 'asset_id', 'url'];
    protected $appends = ['url'];

    public static function boot()
    {
        parent::boot();

        // Tying up deletion DB entry with deletion of file
        AssetFile::deleting(function ($assetFile) {
            $assetFile->removeFile();
        });
    }

    // Relationships
    public function asset()
    {
        return $this->belongsTo('App\Asset', 'asset_id');
    }

    // Helper methods for abstraction
    public function getUrlAttribute()
    {
        return '/img/assets/'.$this->cloud_filename;
    }

    // NOTE This would likely fail because of the 'private' keyword
    private function removeFile()
    {
        // TODO Do something
    }
}
