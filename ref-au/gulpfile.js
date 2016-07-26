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

    // Page specific CSS
    mix.sass([
        'lib/slick/slick.scss',
        'page/mainHome.scss'
    ], 'public/css/page/mainHome.css');

    // Page specific JS
    mix.scripts([
        'lib/slick/slick.js',
        'page/mainHome.js'
    ], 'public/js/page/mainHome.js');

    // Use asset versioning
    mix.version([
        'css/**/*.css',
        'js/**/*.js'
    ]);
});
