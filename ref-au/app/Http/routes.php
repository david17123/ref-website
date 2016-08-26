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

// Idea taken from: http://ryantablada.com/post/multi-tld-routing-in-laravel (accessed at 24 Aug 2016 06:29:45 AEDT)
if ( !isset($tld) )
{
    $matches = array();
    preg_match('/(?:[a-zA-Z]+:\/\/)?(?:[a-zA-Z-]+\.)?ref-au\.([^\/]+)/', Request::root(), $matches);
    $tld = $matches[1];
}
else
{
    error_log('The variable `$tld` is set by someone else. This may break routing!');
}

// Note, this route group is temporary in nature. Delete this once the new site
// is properly launched and update the route defined by: Route::get('/').
Route::group([
    'domain' => 'new.ref-au.'.$tld
], function () {
    Route::get('/', ['as' => 'mainHome', function () {
        return view('page/mainHome');
    }]);
});

Route::group([
    'domain' => '{universityName}.ref-au.'.$tld
], function () {
    Route::get('/', [
        'as' => 'uniHome',
        'uses' => 'UniversityHomePageController@displayHome']);
    Route::get('article/{article}', [
        'as' => 'readArticle',
        'uses' => 'ArticlePageController@readArticle'
    ]);
    Route::get('article', [
        'as' => 'articlesList',
        'uses' => 'ArticlePageController@listArticles'
    ]);
    Route::get('sermon/{sermonSummary}', [
        'as' => 'readSermonSummary',
        'uses' => 'SermonSummaryPageController@readSermonSummary'
    ]);
    Route::get('sermon', [
        'as' => 'sermonSummariesList',
        'uses' => 'SermonSummaryPageController@listSermonSummaries'
    ]);
});


Route::get('/', function () {
    // return view('page/mainHome');
    return redirect('https://reformedevangelicalfellowship.wordpress.com');
});
