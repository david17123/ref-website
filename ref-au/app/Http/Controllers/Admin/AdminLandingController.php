<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\University;
use App\HelperClasses\SitePageService;

class AdminLandingController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function index()
    {
        $this->sitePage->setPageClass('admin-landing-page');

        $viewVars = [
            'universities' => University::get()
        ];
        return view('page/admin/home', $viewVars);
    }
}
