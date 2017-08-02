<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\University;

class HeaderComposer
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * Create a new profile composer.
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        // Dependencies automatically resolved by service container...
        $this->route = $request->route();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($this->route->hasParameter('uniUrl'))
        {
            $uniName = strtolower( $this->route->getParameter('uniUrl')->name );
            $university = University::where('name', $uniName)->first();
            if ( $university )
            {
                $view->with('uniLogo', $university->logo->getUrl());
            }
        }
        else
        {
            $view->with('uniLogo', '/img/page/mainHome/REFLogoWhite.png');
        }
    }
}
