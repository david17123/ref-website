<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class SiteComposer
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
        $uniName = '';
        if ($this->route->hasParameter('universityName'))
        {
            $uniName = $this->route->getParameter('universityName')->name;
        }
        $view->with('universityName', $uniName);
    }
}
