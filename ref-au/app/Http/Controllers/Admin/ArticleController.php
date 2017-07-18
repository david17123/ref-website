<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\HelperClasses\SitePageService;

use App\Article;
use App\Asset;
use App\AssetGroup;
use App\Author;

class ArticleController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function manageArticles()
    {
        $this->sitePage->setPageClass('admin-manage-articles');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage articles']
        ]);

        $articles = Article::all();

        $viewVars = [
            'articles' => $articles
        ];
        return view('page/admin/manageArticles', $viewVars);
    }

    public function createArticle()
    {
        $this->sitePage->setPageClass('admin-edit-article');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage articles', 'link' => route('manageArticles')],
            ['text' => 'New article']
        ]);

        $viewVars = [
            'preachersAjaxUrl' => route('getAuthorsAjax')
        ];
        return view('page/admin/editArticle', $viewVars);
    }

    public function editArticle(Article $article)
    {
        $this->sitePage->setPageClass('admin-edit-article');
        $this->sitePage->setBreadcrumbs([
            ['text' => 'Admin home', 'link' => route('adminHome')],
            ['text' => 'Manage articles', 'link' => route('manageArticles')],
            ['text' => $article->title]
        ]);

        $viewVars = [
            'article' => $article,
            'preachersAjaxUrl' => route('getAuthorsAjax')
        ];
        return view('page/admin/editArticle', $viewVars);
    }

    public function saveArticle(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'subtitle' => 'string|max:255',
            'content' => 'required|string',
            'author' => 'required|numeric',
            'heroImage' => 'required|array',
            'articleId' => 'numeric'
        ]);

        // Fetch sermon summary object
        $articleId = $request->input('articleId', '');
        if ($articleId === '')
        {
            $article = new Article();
        }
        else
        {
            $article = Article::find($articleId);
            if ( !$article )
            {
                abort(404, 'Article not found');
            }
        }

        // Fetch author object
        $authorId = $request->input('author');
        $author = Author::find($authorId);
        if ( !$author )
        {
            abort(404, 'Author not found');
        }

        // Process hero image
        $heroImageId = count($request->input('heroImage')) > 0 ? $request->input('heroImage') : null;
        $heroImage = Asset::find($heroImageId)->first();
        if ($heroImage)
        {
            $heroImage->finalize();
        }

        $article->title = $request->input('title');
        $article->subtitle = $request->input('subtitle');
        $article->content = $request->input('content');
        $article->published = $request->input('published') === '1';
        $article->author()->associate($author);
        if ($heroImage)
        {
            if ($article->heroImage && $article->heroImage->id != $heroImage->id)
            {
                // Remove the old hero image
                $article->heroImage->remove();
            }
            $article->heroImage()->associate($heroImage);
        }

        $article->save();

        return redirect()->route('editArticle', ['article' => $article->id]);
    }

    public function deleteArticle(Article $article)
    {
        if ($article->heroImage)
        {
            $heroImage = $article->heroImage;
            $article->heroImage()->dissociate();
            $heroImage->remove();
        }
        $article->delete();
        return redirect()->route('manageArticles');
    }
}
