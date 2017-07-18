<?php

namespace App\HelperClasses;

use App\Asset;
use App\AssetFile;

/**
 * Customizations on UploadHandler class from the jQuery FileUpload library. The
 * original UploadHandler class should be left untouched for ease of updating.
 */
class RefUploadHandler extends UploadHandler
{
    protected function get_file_name($file_path, $name, $size, $type, $error, $index, $content_range)
    {
        // Normalises $name to some sanity check before passing over to parent method
        $name = preg_replace('/[^a-zA-Z0-9\s.\-_]/', '', $name);
        $name = preg_replace('/\s+/', '-', $name);

        return parent::get_file_name($file_path, $name, $size, $type, $error, $index, $content_range);
    }

    /**
     * Processes uploaded file. This method moves the uploaded file from the
     * default tmp_name to the designated upload path as specified in the
     * config.
     *
     * If uploaded file is an image it will be transformed by handle_image_file
     * to yield multiple versions. Might want to suppress this by nulling out
     * `image_versions` config value.
     *
     * Returned file object is a class with the following attributes:
     *   - string name
     *   - int size
     *   - string type
     *   - string error?
     *   - string deleteUrl: The delete URL as provided by the UploadHandler. Not going to use this.
     *   - string deleteType: Related to deleteUrl
     * This overridden method will add Asset->toArray() under `asset` field
     *
     * @param string $uploaded_file The `tmp_name` from the default upload location
     * @param string $name File name to be given for the file
     * @param string $size Numeric string of the file's size in bytes
     * @param string $type Uploaded file type?
     * @param string $error Existing error messages, either as `error_messages` index or plain error message string
     * @param string $index the nth uploaded_file being processed, starting at 0. Null if it's a single file upload
     * @param [string] $content_range HTTP Content-Range header split on numeric values
     * @return StdClass Object containing the metadata of the processed uploaded file
     */
    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error, $index = null, $content_range = null)
    {
        $file = parent::handle_file_upload($uploaded_file, $name, $size, $type, $error, $index, $content_range);

        // Create AssetFile and Asset objects for the uploaded file
        $asset = new Asset();
        $asset->filename = $file->name;
        $asset->temporary = true;
        $asset->save();

        $assetFile = new AssetFile();
        $assetFile->type = 'original';
        $assetFile->cloud_filename = $file->name;
        $assetFile->size = $file->size;
        $assetFile->asset()->associate($asset);
        $assetFile->save();

        // Strip down $asset to array and attach to $file
        $file->asset = $asset->toArray();

        return $file;
    }

    /**
     * This handles form data which can be used to modify the resulting $file
     * being processed. This method is called as part of the handle_file_upload
     * routine.
     *
     * @param StdClass $file File object being constructed
     * @param int $index The nth file being processed, starts from 0
     */
    protected function handle_form_data($file, $index) {
        // Handle form data, e.g. $_POST['description'][$index]
    }
}
