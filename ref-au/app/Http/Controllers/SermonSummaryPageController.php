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
    public function listSermonSummaries(University $university)
    {
        $viewVars = [
            'sermonSummaries' => SermonSummary::all()
        ];

        return view('page/sermonSummariesList', $viewVars);
    }

    public function readSermonSummary(University $university, SermonSummary $sermonSummary)
    {
        $articles = Article::inRandomOrder()
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

        $sitePage = app(SitePageService::class);
        $sitePage->setJavascriptVar('sermonSummaryContent', $sermonSummary->content);

        return view('page/readSermonSummary', $viewVars);
    }
}
