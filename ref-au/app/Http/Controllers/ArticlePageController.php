<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;
use App\Article;
use App\HelperClasses\SitePageService;

class ArticlePageController extends Controller
{
    public function listArticles(University $university)
    {
        $viewVars = [
            'articles' => Article::all()
        ];

        return view('page/articlesList', $viewVars);
    }

    public function readArticle(University $university, Article $article)
    {
        $viewVars = [
            'article' => $article
        ];

        $sitePage = app(SitePageService::class);
        $sitePage->setJavascriptVar('articleContent', $article->content);

        return view('page/readArticle', $viewVars);
    }
}
