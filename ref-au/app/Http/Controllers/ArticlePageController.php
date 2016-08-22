<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;

class ArticlePageController extends Controller
{
    public function listArticles($university)
    {
        $univeresity = University::where('name', $university)->firstOrFail();
        $viewVars = [
            'articles' => []
        ];

        return view('page/articlesList', $viewVars);
    }
}
