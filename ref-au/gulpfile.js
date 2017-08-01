var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('base.scss', 'public/css/base.css');
    mix.scripts([
        'component/utils.js'
    ], 'public/js/base.js');

    // Layout specific files
    mix.sass([
        'component/inputs.scss',
        'component/header.scss',
        'component/footer.scss'
    ], 'public/css/defaultLayout.css');
    mix.scripts([
        'component/header.js',
        'component/footer.js'
    ], 'public/js/defaultLayout.js');

    mix.sass([
        'component/inputs.scss',
        'component/header.scss'
    ], 'public/css/headerOnlyLayout.css');
    mix.scripts([
        'component/header.js'
    ], 'public/js/headerOnlyLayout.js');

    // mix.sass('adminLayout.scss', 'public/css/adminLayout.css');
    // mix.scripts([
    // ], 'public/js/adminLayout.js');



    // Page specific CSS
    mix.sass([
        'component/inputs.scss',
        'auth/login.scss'
    ], 'public/css/auth/login.css');

    mix.sass([
        'lib/slick/slick.scss',
        'page/mainHome.scss'
    ], 'public/css/page/mainHome.css');

    mix.sass([
        'lib/slick/slick.scss',
        'component/sermonSummariesListTemplate.scss',
        'page/uniHome.scss'
    ], 'public/css/page/uniHome.css');

    mix.sass([
        'component/articlesListTemplate.scss',
        'page/articlesList.scss'
    ], 'public/css/page/articlesList.css');

    mix.sass([
        'page/readArticle.scss'
    ], 'public/css/page/readArticle.css');

    mix.sass([
        'component/sermonSummariesListTemplate.scss',
        'page/sermonSummariesList.scss'
    ], 'public/css/page/sermonSummariesList.css');

    mix.sass([
        'page/readSermonSummary.scss'
    ], 'public/css/page/readSermonSummary.css');



    // Page specific JS
    mix.scripts([
        'lib/slick/slick.js',
        'page/mainHome.js'
    ], 'public/js/page/mainHome.js');

    mix.scripts([
        'lib/slick/slick.js',
        'page/uniHome.js'
    ], 'public/js/page/uniHome.js');

    mix.scripts([
        'page/articlesList.js'
    ], 'public/js/page/articlesList.js');

    mix.scripts([
        'lib/marked/marked.js',
        'page/readArticle.js'
    ], 'public/js/page/readArticle.js');

    mix.scripts([
        'page/articlesList.js'
    ], 'public/js/page/sermonSummariesList.js');

    mix.scripts([
        'lib/marked/marked.js',
        'page/readSermonSummary.js'
    ], 'public/js/page/readSermonSummary.js');



    // Admin pages
    mix.sass([
        'component/inputs.scss',
        'component/simpleFileInput.scss',
        'component/admin/header.scss',
        'component/admin/manageUniSideMenu.scss',

        'lib/select2/select2Override.scss',

        'page/admin/home.scss',
        'page/admin/manageUniSite.scss',
        'page/admin/manageSermonSummaries.scss',
        'page/admin/manageEvents.scss',
        'page/admin/manageArticles.scss',
        'page/admin/managePicquotes.scss',
        'page/admin/manageAuthors.scss',
        'page/admin/manageUsers.scss'
    ], 'public/css/page/admin/admin.css');

    mix.scripts([
        'page/admin/home.js'
    ], 'public/js/page/admin/home.js');
    mix.scripts([
        'lib/jqueryFileupload/jquery.ui.widget.js',
        'lib/jqueryFileupload/jquery.iframe-transport.js',
        'lib/jqueryFileupload/jquery.fileupload.js',
        'component/simpleFileInput.js',
        'page/admin/manageUniSite.js'
    ], 'public/js/page/admin/manageUniSite.js');
    mix.scripts([
        'lib/jqueryFileupload/jquery.ui.widget.js',
        'lib/jqueryFileupload/jquery.iframe-transport.js',
        'lib/jqueryFileupload/jquery.fileupload.js',
        'lib/select2/select2.js',
        'component/simpleFileInput.js',
        'component/refSelectBox.js',
        'page/admin/editSermonSummary.js'
    ], 'public/js/page/admin/editSermonSummary.js');
    mix.scripts([
        'page/admin/editEvent.js'
    ], 'public/js/page/admin/editEvent.js');
    mix.scripts([
        'lib/jqueryFileupload/jquery.ui.widget.js',
        'lib/jqueryFileupload/jquery.iframe-transport.js',
        'lib/jqueryFileupload/jquery.fileupload.js',
        'lib/select2/select2.js',
        'component/simpleFileInput.js',
        'component/refSelectBox.js',
        'page/admin/editArticle.js'
    ], 'public/js/page/admin/editArticle.js');
    mix.scripts([
        'lib/jqueryFileupload/jquery.ui.widget.js',
        'lib/jqueryFileupload/jquery.iframe-transport.js',
        'lib/jqueryFileupload/jquery.fileupload.js',
        'component/simpleFileInput.js',
        'page/admin/editPicquote.js'
    ], 'public/js/page/admin/editPicquote.js');
    mix.scripts([
        'lib/select2/select2.js',
        'component/refSelectBox.js',
        'page/admin/editAuthor.js'
    ], 'public/js/page/admin/editAuthor.js');
    mix.scripts([
        'lib/select2/select2.js',
        'component/refSelectBox.js',
        'page/admin/editUser.js'
    ], 'public/js/page/admin/editUser.js');




    // Use asset versioning
    mix.version([
        'css/**/*.css',
        'js/**/*.js'
    ]);
});
