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

Route::auth();

// Note, this route group is temporary in nature. Delete this once the new site
// is properly launched and update the route defined by: Route::get('/').
Route::group([
    'domain' => 'new.ref-au.'.$tld
], function () {
    Route::get('/', [
        'as' => 'mainHome',
        'uses' => 'HomePageController@displayMainHome'
    ]);
    Route::get('article/{article}', [
        'as' => 'readArticle',
        'uses' => 'ArticlePageController@readArticle'
    ]);
    Route::get('article', [
        'as' => 'articlesList',
        'uses' => 'ArticlePageController@listArticles'
    ]);
    Route::get('picquotes', [
        'as' => 'picquotesList',
        'uses' => 'PicquotePageController@listPicquotes'
    ]);

    Route::post('ajax/subscribe', [
        'as' => 'subscribeAjax',
        'uses' => 'AjaxController@subscribe'
    ]);
    Route::post('ajax/contact', [
        'as' => 'contactUsAjax',
        'uses' => 'AjaxController@contact'
    ]);
});

Route::group([
    'domain' => 'admin.ref-au.'.$tld,
    'middleware' => 'auth'
], function () {
    Route::get('/', [
        'as' => 'adminHome',
        'uses' => 'Admin\AdminLandingController@index'
    ]);
    Route::get('uni/{uniUrl}', [
        'as' => 'manageUniSite',
        'uses' => 'Admin\UniversityController@index'
    ]);
    Route::get('uni/{uniUrl}/delete', [
        'as' => 'deleteUniSite',
        'uses' => 'Admin\UniversityController@deleteUniSite'
    ]);

    Route::get('uni/{uniUrl}/sermon-summary', [
        'as' => 'manageSermonSummaries',
        'uses' => 'Admin\UniversityController@manageSermonSummaries'
    ]);
    Route::get('uni/{uniUrl}/sermon-summary/create', [
        'as' => 'createSermonSummary',
        'uses' => 'Admin\UniversityController@createSermonSummary'
    ]);
    Route::get('uni/{uniUrl}/sermon-summary/{sermonSummary}', [
        'as' => 'editSermonSummary',
        'uses' => 'Admin\UniversityController@editSermonSummary'
    ]);
    Route::get('uni/{uniUrl}/sermon-summary/{sermonSummary}/delete', [
        'as' => 'deleteSermonSummary',
        'uses' => 'Admin\UniversityController@deleteSermonSummary'
    ]);

    Route::get('uni/{uniUrl}/event', [
        'as' => 'manageEvents',
        'uses' => 'Admin\UniversityController@manageEvents'
    ]);
    Route::get('uni/{uniUrl}/event/create', [
        'as' => 'createEvent',
        'uses' => 'Admin\UniversityController@createEvent'
    ]);
    Route::get('uni/{uniUrl}/event/{event}', [
        'as' => 'editEvent',
        'uses' => 'Admin\UniversityController@editEvent'
    ]);
    Route::get('uni/{uniUrl}/event/{event}/delete', [
        'as' => 'deleteEvent',
        'uses' => 'Admin\UniversityController@deleteEvent'
    ]);

    Route::get('article', [
        'as' => 'manageArticles',
        'uses' => 'Admin\ArticleController@manageArticles'
    ]);
    Route::get('article/create', [
        'as' => 'createArticle',
        'uses' => 'Admin\ArticleController@createArticle'
    ]);
    Route::get('article/{article}', [
        'as' => 'editArticle',
        'uses' => 'Admin\ArticleController@editArticle'
    ]);
    Route::get('article/{article}/delete', [
        'as' => 'deleteArticle',
        'uses' => 'Admin\ArticleController@deleteArticle'
    ]);

    Route::get('picquote', [
        'as' => 'managePicquotes',
        'uses' => 'Admin\PicquoteController@managePicquotes'
    ]);
    Route::get('picquote/create', [
        'as' => 'createPicquote',
        'uses' => 'Admin\PicquoteController@createPicquote'
    ]);
    Route::get('picquote/{picquote}', [
        'as' => 'editPicquote',
        'uses' => 'Admin\PicquoteController@editPicquote'
    ]);
    Route::get('picquote/{picquote}/delete', [
        'as' => 'deletePicquote',
        'uses' => 'Admin\PicquoteController@deletePicquote'
    ]);

    Route::get('author', [
        'as' => 'manageAuthors',
        'uses' => 'Admin\AuthorController@manageAuthors'
    ]);
    Route::get('author/create', [
        'as' => 'createAuthor',
        'uses' => 'Admin\AuthorController@createAuthor'
    ]);
    Route::get('author/{author}', [
        'as' => 'editAuthor',
        'uses' => 'Admin\AuthorController@editAuthor'
    ]);
    Route::get('author/{author}/delete', [
        'as' => 'deleteAuthor',
        'uses' => 'Admin\AuthorController@deleteAuthor'
    ]);

    Route::get('user', [
        'as' => 'manageUsers',
        'uses' => 'Admin\UserController@manageUsers'
    ]);
    Route::get('user/create', [
        'as' => 'createUser',
        'uses' => 'Admin\UserController@createUser'
    ]);
    Route::get('user/{user}', [
        'as' => 'editUser',
        'uses' => 'Admin\UserController@editUser'
    ]);
    Route::get('user/{user}/delete', [
        'as' => 'deleteUser',
        'uses' => 'Admin\UserController@deleteUser'
    ]);

    Route::get('ajax/authors', [
        'as' => 'getAuthorsAjax',
        'uses' => 'AjaxController@getAuthorsByName'
    ]);
    Route::get('ajax/users', [
        'as' => 'getUsersAjax',
        'uses' => 'AjaxController@getUsersByName'
    ]);
    Route::get('ajax/roles', [
        'as' => 'getRolesAjax',
        'uses' => 'AjaxController@getRolesByTitle'
    ]);

    Route::post('upload', [
        'as' => 'adminFileUploadHandler',
        'uses' => 'FileUploadController@post'
    ]);
    Route::post('uni', [
        'as' => 'createUni',
        'uses' => 'Admin\UniversityController@createUni'
    ]);
    Route::post('uni/{uniUrl}', [
        'as' => 'saveUniSiteData',
        'uses' => 'Admin\UniversityController@saveSiteDetails'
    ]);
    Route::post('uni/{uniUrl}/sermon-summary', [
        'as' => 'saveSermonSummary',
        'uses' => 'Admin\UniversityController@saveSermonSummary'
    ]);
    Route::post('uni/{uniUrl}/event', [
        'as' => 'saveEvent',
        'uses' => 'Admin\UniversityController@saveEvent'
    ]);
    Route::post('article', [
        'as' => 'saveArticle',
        'uses' => 'Admin\ArticleController@saveArticle'
    ]);
    Route::post('picquote', [
        'as' => 'savePicquote',
        'uses' => 'Admin\PicquoteController@savePicquote'
    ]);
    Route::post('author', [
        'as' => 'saveAuthor',
        'uses' => 'Admin\AuthorController@saveAuthor'
    ]);
    Route::post('user', [
        'as' => 'saveUser',
        'uses' => 'Admin\UserController@saveUser'
    ]);
});

Route::group([
    'domain' => '{uniUrl}.ref-au.'.$tld
], function () {
    Route::get('/', [
        'as' => 'uniHome',
        'uses' => 'HomePageController@displayUniHome'
    ]);
    Route::get('article/{article}', [
        'as' => 'readArticleUni',
        'uses' => 'ArticlePageController@readArticleUni'
    ]);
    Route::get('article', [
        'as' => 'articlesListUni',
        'uses' => 'ArticlePageController@listArticlesUni'
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
