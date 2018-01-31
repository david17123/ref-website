<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

use App\University;
use App\Article;
use App\SermonSummary;
use App\HelperClasses\SitePageService;

class FooterComposer
{
    /**
     * @var Route
     */
    protected $route;
    private $sitePage;

    /**
     * Create a new profile composer.
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request, SitePageService $sitePage)
    {
        // Dependencies automatically resolved by service container...
        $this->route = $request->route();
        $this->sitePage = $sitePage;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Fetch recent posts
        $recentPosts = [];

        if ($this->route->hasParameter('uniUrl'))
        {
            $uniName = strtolower( $this->route->getParameter('uniUrl')->name );
            $university = University::where('name', $uniName)->first();
            if ( $university )
            {
                // Fetch sermon summaries
                $sermonSummaries = SermonSummary::where('published', '=', true)
                                                ->orderBy('created_at', 'desc')
                                                ->take(4)
                                                ->get();
                foreach ($sermonSummaries as $summary)
                {
                    $recentPosts[] = [
                        'imageUrl' => $summary->heroImage->getUrl(),
                        'title' => $summary->title,
                        'date' => $summary->date_preached,
                        'url' => route('readSermonSummary', ['sermonSummary' => $summary->id, 'uniUrl' => $university->subdomain])
                    ];
                }
            }
        }

        if (count($recentPosts) < 4)
        {
            // Fetch articles
            $articlesToFetch = 4 - count($recentPosts);
            $articles = Article::where('published', '=', true)
                                    ->orderBy('created_at', 'desc')
                                    ->take($articlesToFetch)
                                    ->get();
            foreach ($articles as $article)
            {
                $post = [
                    'imageUrl' => $article->heroImage->getUrl(),
                    'title' => $article->title,
                    'date' => $article->created_at
                ];

                if (isset($university) && $university)
                {
                    $post['url'] = route('readArticleUni', ['article' => $article->id, 'uniUrl' => $university->subdomain]);
                }
                else
                {
                    $post['url'] = route('readArticle', ['article' => $article->id]);
                }
                $recentPosts[] = $post;
            }
        }
        $view->with('recentPosts', $recentPosts);

        // Subscribe form data
        $this->sitePage->setJavascriptVar('subscribeAjaxUrl', route('subscribeAjax'));
        $this->sitePage->setJavascriptVar('csrfToken', csrf_token());
    }
}
