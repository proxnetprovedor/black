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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

// mix.styles(
//     [
//         //"resources/css/style.css",
//     ],
//     "public/css/black-route.css"
// );

// mix.scripts(
//     [        //"resources/assets/jquery/jquery.min.js",
//     ], 
//     "public/js/plugins.js"
// );
// mix.styles(
//     [
//         //"resources/assets/bootstrap/css/bootstrap.min.css",
//     ],
//     "public/css/vendor.min.css"
// );

// mix.copy("resources/assets/images/", "public/assets/images/");
// mix.copy("resources/css/icons", "public/css/scss/icons/");


