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
    mix.sass('defaultLayout.scss', 'public/css/defaultLayout.css');
    mix.scripts([
        'component/header.js',
        'component/footer.js'
    ], 'public/js/defaultLayout.js');

    // mix.sass('adminLayout.scss', 'public/css/adminLayout.css');
    // mix.scripts([
    // ], 'public/js/adminLayout.js');



    // Page specific CSS
    mix.sass([
        'auth/login.scss'
    ], 'public/css/auth/login.css');

    mix.sass([
        'lib/slick/slick.scss',
        'page/mainHome.scss'
    ], 'public/css/page/mainHome.css');

    mix.sass([
        'lib/slick/slick.scss',
        'page/uniHome.scss'
    ], 'public/css/page/uniHome.css');

    mix.sass([
        'page/articlesList.scss'
    ], 'public/css/page/articlesList.css');

    mix.sass([
        'page/readArticle.scss'
    ], 'public/css/page/readArticle.css');

    mix.sass([
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



    // Use asset versioning
    mix.version([
        'css/**/*.css',
        'js/**/*.js'
    ]);
});
