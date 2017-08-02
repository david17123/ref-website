<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;
use App\SermonSummary;
use App\Picquote;
use App\HelperClasses\SitePageService;

class HomePageController extends Controller
{
    private $sitePage;

    public function __construct(SitePageService $sitePage)
    {
        $this->sitePage = $sitePage;
    }

    public function displayMainHome()
    {
        // Get picquotes: 5 latest, 4 random
        $picquotes = Picquote::where('published', '=', true)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
        $takenPicquotes = [];
        foreach ($picquotes as $picquote)
        {
            $takenPicquotes[$picquote->id] = true;
        }
        $randomPicquotes = Picquote::where('published', '=', true)
                                ->inRandomOrder()
                                ->take(9)
                                ->get();
        $randomPicquotesCount = 0;
        foreach ($randomPicquotes as $picquote)
        {
            if ( isset($takenPicquotes[$picquote->id]) )
            {
                continue;
            }
            $picquotes[] = $picquote;
            $randomPicquotesCount++;
            if ($randomPicquotesCount >= 4)
            {
                break;
            }
        }

        $viewVars = [
            'universities' => University::where('published', '=', true)->get(),
            'picquotes' => $picquotes
        ];

        $this->sitePage->setJavascriptVar('subscribeAjaxUrl', route('subscribeAjax'));
        $this->sitePage->setJavascriptVar('contactUsAjaxUrl', route('contactUsAjax'));
        $this->sitePage->setJavascriptVar('csrfToken', csrf_token());

        return view('page/mainHome', $viewVars);
    }

    /**
     * @param string $university Name of university as used in the sub-domain
     * @return Response
     */
    public function displayUniHome(University $university)
    {
        if ( !$university->published )
        {
            abort(404, 'University not found');
        }

        // TODO Fetch uni specific contents
        $sermonSummaries = SermonSummary::where('sermon_location_id', '=', $university->id)
                                ->where('published', '=', true)
                                ->orderBy('created_at', 'desc')
                                ->take(4)
                                ->get();
        $viewVars = ['sermonSummaries' => $sermonSummaries];

        return view('page/uniHome', $viewVars);
    }
}
