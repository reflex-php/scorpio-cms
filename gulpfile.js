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
    mix.sass('app.scss')
        .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/summernote/dist/bs4/summernote.js',
            '../bower/tether/dist/js/tether.js',
            '../bower/bootstrap/dist/js/bootstrap.js',
            '../bower/js-cookie/src/js.cookie.js',
        ], 'public/js/vendor.js')
        .styles([
            '../bower/summernote/dist/bs4/summernote.css',
            '../bower/tether/dist/css/tether.css'
        ], 'public/css/vendor.css')
        .copy('resources/assets/bower/summernote/dist/font', 'public/font')
        .copy('resources/assets/bower/font-awesome/fonts', 'public/css/font')
        .browserSync({
            proxy: 'scorpio-cms.dev',
            notify: false
        });
});
