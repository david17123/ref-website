<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\University;
use App\SermonSummary;

class UniversityHomePageController extends Controller
{
    /**
     * @param string $university Name of university as used in the sub-domain
     * @return Response
     */
    public function displayHome(University $university)
    {
        // TODO Fetch uni specific contents
        $sermonSummaries = SermonSummary::orderBy('created_at', 'desc')
                                ->take(4)
                                ->get();
        $viewVars = ['sermonSummaries' => $sermonSummaries];

        return view('page/uniHome', $viewVars);
    }
}
