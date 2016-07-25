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
    mix.sass('page/mainHome.scss', 'public/css/page/mainHome.css');

    // Use asset versioning
    mix.version([
        'css/**/*.css'
    ]);
});
