<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;
use App\SermonSummary;

class HomePageController extends Controller
{
    public function displayMainHome()
    {
        $viewVars = [
            'universities' => University::where('published', '=', true)->get()
        ];

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
                                ->orderBy('created_at', 'desc')
                                ->take(4)
                                ->get();
        $viewVars = ['sermonSummaries' => $sermonSummaries];

        return view('page/uniHome', $viewVars);
    }
}
