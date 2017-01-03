<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\University;

class AdminLandingController extends Controller
{
    public function index()
    {
        $viewVars = [
            'universities' => University::get()
        ];
        return view('page/admin/home', $viewVars);
    }
}
