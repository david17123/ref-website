<?php
namespace App\Http\Controllers;

// require_once('../app/UploadHandler.php');

use Illuminate\Http\Request;

use App\HelperClasses\RefUploadHandler;

class FileUploadController extends Controller
{
    /**
     * handle file upload via POST method.
     *
     * @return \Illuminate\Http\Response
     */
    public function post()
    {
        $uploadHandler = new RefUploadHandler([
            'print_response' => false,
            'upload_dir' => base_path('public/img/assets/'),
            'param_name' => 'files',
            'user_dirs' => false
        ], false); // Do not initialize or print response because we want to pipe the response through Laravel
        $response = $uploadHandler->post(false);

        return response()->json($response);
    }
}
