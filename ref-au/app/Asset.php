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

    public function getUrl($type='original')
    {
        $selectedFile = $this->getAssetFile($type);

        if ($selectedFile !== null)
        {
            return $selectedFile->url;
        }
        else
        {
            return null;
        }
    }

    public function getAssetFile($type='original')
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

        return $selectedFile;
    }

    public function toArray($type='original')
    {
        $stripped = [
            'id' => $this->id,
            'filename' => $this->filename,
            'asset_group' => $this->asset_group_id
        ];

        $assetFile = $this->getAssetFile($type)
                          ->makeHidden(['id', 'cloud_filename', 'asset_id']);
        $stripped = array_merge($stripped, $assetFile->toArray());

        return $stripped;
    }
}
