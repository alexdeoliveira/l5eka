var elixir = require('laravel-elixir');

require('laravel-elixir-livereload');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) 
{

    mix.scripts([
        '/../bower_components/jquery/dist/jquery.js',
        '/../bower_components/bootstrap/dist/js/bootstrap.js',
        '/../bower_components/metisMenu/dist/metisMenu.js',
        'sb-admin-2.js',
    ], 'public/js/vendor.js');

    //JS comuns para a maioria das telas
    mix.scripts('app.js', 'public/js/app.js');

    //JS especifico para categorias
    mix.scripts('categories.js', 'public/js/categories.js');

    //JS especifico para projetos
    mix.scripts('projects.js', 'public/js/projects.js');

    mix.styles([
        '/../bower_components/bootstrap/dist/css/bootstrap.min.css',
        '/../bower_components/metisMenu/dist/metisMenu.min.css',
        '/../bower_components/font-awesome/css/font-awesome.min.css',
        'sb-admin-2.css',
    ], 'public/css/vendor.css');

    mix.version([
        'js/app.js',
        'js/categories.js',
        'js/projects.js',
    ]);

    mix.livereload();
});
    