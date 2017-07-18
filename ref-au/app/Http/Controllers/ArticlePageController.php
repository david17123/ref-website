<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;
use App\Article;
use App\HelperClasses\SitePageService;

class ArticlePageController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function listArticles(University $university)
    {
        $viewVars = [
            'articles' => Article::where('published', '=', true)
                                ->orderBy('created_at', 'desc')
                                ->get()
        ];

        return view('page/articlesList', $viewVars);
    }

    public function readArticle(University $university, Article $article)
    {
        if ( !$article->published )
        {
            abort(404, 'Article not found');
        }

        $otherArticles = Article::where([
                                ['id', '<>', $article->id],
                                ['published', '=', true]
                            ])
                            ->inRandomOrder()
                            ->take(5)
                            ->get();

        $viewVars = [
            'article' => $article,
            'otherArticles' => $otherArticles
        ];

        $this->sitePage->setJavascriptVar('articleContent', $article->content);

        return view('page/readArticle', $viewVars);
    }
}
