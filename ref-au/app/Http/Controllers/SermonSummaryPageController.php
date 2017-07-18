<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;
use App\SermonSummary;
use App\Article;
use App\HelperClasses\SitePageService;

class SermonSummaryPageController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function listSermonSummaries(University $university)
    {
        $viewVars = [
            'sermonSummaries' => SermonSummary::where('published', '=', true)
                                            ->orderBy('created_at', 'desc')
                                            ->get()
        ];

        return view('page/sermonSummariesList', $viewVars);
    }

    public function readSermonSummary(University $university, SermonSummary $sermonSummary)
    {
        if ( !$sermonSummary->published )
        {
            abort(404, 'Sermon summary not found');
        }

        $articles = Article::where('published', '=', true)
                        ->inRandomOrder()
                        ->take(5)
                        ->get();
        $prevSermon = SermonSummary::where('id', 1)->first();
        $nextSermon = SermonSummary::where('id', 2)->first();

        $viewVars = [
            'sermonSummary' => $sermonSummary,
            'articles' => $articles,
            'prevSermon' => $prevSermon,
            'nextSermon' => $nextSermon
        ];

        $this->sitePage->setJavascriptVar('sermonSummaryContent', $sermonSummary->content);

        return view('page/readSermonSummary', $viewVars);
    }
}
