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

        .styles([
            'bootstrap.css',
            'blog-post.css',
            'bootstrap.min.css',
            'font-awesome.css',
            'metisMenu.css',
            'sb-admin-2.css',
            'styles.css',
            'timeline.css'
        ],'./public/css/libs.css')
        .scripts([
            'jquery.js',
            'bootstrap.min.js',
            'metisMenu.js',
            'sb-admin-2.js',
            'script.js'
        ],'./public/js/libs.js')

});