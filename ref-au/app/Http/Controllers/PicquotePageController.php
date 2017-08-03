<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Picquote;

class PicquotePageController extends Controller
{
    public function listPicquotes()
    {
        $viewVars = [
            'picquotes' => Picquote::where('published', '=', true)
                                ->orderBy('created_at', 'desc')
                                ->get()
        ];

        return view('page/picquotesList', $viewVars);
    }
}
