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
    mix.less('app.less')
        .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/summernote/dist/summernote.js',
            '../bower/bootstrap/dist/js/bootstrap.js',
            '../bower/js-cookie/src/js.cookie.js'
        ], 'public/js/vendor.js')
        .styles(['../bower/summernote/dist/summernote.css'], 'public/css/vendor.css')
       .copy('resources/assets/bower/summernote/dist/font', 'public/css/font');
});
