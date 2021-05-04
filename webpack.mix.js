const mix = require('laravel-mix');
mix.disableNotifications();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss')
    ]);

mix.sass('resources/sass/fontawesome.scss', 'public/css');

mix.styles(['resources/css/cdsolec.css'], 'public/css/cdsolec.css');

if (mix.inProduction()) {
    mix.version();
}
