<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\University;

class UniversityHomePageController extends Controller
{
    /**
     * @param string $university Name of universoty as used in the sub-domain
     * @return Response
     */
    public function displayHome($university)
    {
        $univeresity = University::where('name', $university)->firstOrFail();

        // TODO Fetch uni specific contents

        return view('page/uniHome');
    }
}
