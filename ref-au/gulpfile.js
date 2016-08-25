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
        'component/utils.js',
        'component/header.js',
        'component/footer.js'
    ], 'public/js/base.js');



    // Page specific CSS
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
        'lib/marked/marked.js',
        'page/readArticle.js'
    ], 'public/js/page/readArticle.js');



    // Use asset versioning
    mix.version([
        'css/**/*.css',
        'js/**/*.js'
    ]);
});
