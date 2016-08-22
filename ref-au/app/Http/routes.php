<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Note, this route group is temporary in nature. Delete this once the new site
// is properly launched and update the route defined by: Route::get('/').
Route::group([
    'domain' => 'new.ref-au.{tld}'
], function () {
    Route::get('/', function () {
        return view('page/mainHome');
    });
});

Route::group([
    'domain' => '{university}.ref-au.{tld}'
], function () {
    Route::get('/', 'UniversityHomePageController@displayHome');
    Route::get('article', 'ArticlePageController@listArticles');
});


Route::get('/', function () {
    // return view('page/mainHome');
    return redirect('https://reformedevangelicalfellowship.wordpress.com');
});
