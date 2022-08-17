const mix = require('laravel-mix');

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
//

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/components/modules.js', 'public/js')
    .js('node_modules/fullcalendar/locales-all.min.js', 'public/js/fullcalendar-lang.js')
    .sass('resources/sass/argon-dashboard.scss', 'public/css/argon.css');
