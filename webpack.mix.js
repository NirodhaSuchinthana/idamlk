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

mix.sass('resources/assets/sass/home.scss', 'public/css')
    .sass('resources/assets/sass/register.scss', 'public/css')
    .sass('resources/assets/sass/verify.scss', 'public/css')
    .sass('resources/assets/sass/master.scss', 'public/css');