<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AssetFile;

class Asset extends Model
{
    // Relationships
    public function assetFiles()
    {
        return $this->hasMany('App\AssetFile', 'asset_id');
    }

    public function getURL($type='original')
    {
        $assetFiles = $this->assetFiles;
        $selectedFile = null;
        foreach ($assetFiles as $file)
        {
            if ($file->type === $type)
            {
                $selectedFile = $file;
                break;
            }
            else if ($file->type === 'original' && $selectedFile === null)
            {
                $selectedFile = $file;
            }
        }

        if ($selectedFile !== null)
        {
            return $selectedFile->getURL();
        }
        else
        {
            return null;
        }
    }
}
