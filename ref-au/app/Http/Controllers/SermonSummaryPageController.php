<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;
use App\SermonSummary;
use App\HelperClasses\SitePageService;

class SermonSummaryPageController extends Controller
{
    public function listSermonSummaries(University $university)
    {
        $viewVars = [
            'sermonSummaries' => []
        ];

        return view('page/sermonSummariesList', $viewVars);
    }

    public function readSermonSummary(University $university, SermonSummary $sermonSummary)
    {
        $viewVars = [
            'sermonSummary' => $sermonSummary
        ];

        $sitePage = app(SitePageService::class);
        $sitePage->setJavascriptVar('sermonSummaryContent', $sermonSummary->content);

        return view('page/readSermonSummary', $viewVars);
    }
}
