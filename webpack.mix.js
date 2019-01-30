let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/app.scss', 'public/css').version()
    .combine([
        'resources/assets/js/jquery-3.2.1.min.js',
        'resources/assets/js/mdc/material-components-web.js',
        'resources/assets/js/semanticui/semanticui.min.js',
        'resources/assets/js/materialize/materialize.js',
        'resources/assets/js/script.js',
    ], 'public/js/app.js')
    .version();