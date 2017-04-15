<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

use Auth;

use App\HelperClasses\SitePageService;

class SiteComposer
{
    /**
     * @var Route
     */
    protected $route;
    private $sitePage;

    /**
     * Create a new profile composer.
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request, SitePageService $sitePage)
    {
        // Dependencies automatically resolved by service container...
        $this->route = $request->route();
        $this->sitePage = $sitePage;
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
        if ($this->route->hasParameter('uniUrl'))
        {
            $uniName = $this->route->getParameter('uniUrl')->subdomain;
        }
        $view->with('uniUrl', $uniName);

        $view->with('sitePage', $this->sitePage);

        $view->with('loggedInUser', Auth::user());
    }
}
