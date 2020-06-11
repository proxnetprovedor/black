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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/assets/scss/material-dashboard.scss', 'public/css');

mix.styles(
    [
        "resources/assets/css/material-dashboard.css",
        "resources/assets/demo/demo.css"
        //"resources/assets/demo/demo.css",
        //"resources/css/style.css",
    ],
    "public/css/black-route.css"
);

//Plugin Core JS
mix.scripts(
    [
        "resources/assets/js/core/jquery.min.js",
        "resources/assets/js/core/popper.min.js",
        "resources/assets/js/core/bootstrap-material-design.min.js",

        "resources/assets/js/plugins/perfect-scrollbar.jquery.min.js",
        "resources/assets/js/plugins/moment.min.js",

    ],
    "public/js/plugins-core.js"
);
// Plugins Formularios
mix.scripts(
    [
        "resources/assets/js/plugins/jquery.validate.min.js",
        "resources/assets/js/plugins/jquery.bootstrap-wizard.js",
        "resources/assets/js/plugins/bootstrap-selectpicker.js",
        "resources/assets/js/plugins/bootstrap-datetimepicker.min.js",
        "resources/assets/js/plugins/jquery.dataTables.min.js",


    ],
    "public/js/plugins-form.js"
);
mix.scripts(
    [
        "resources/assets/js/plugins/bootstrap-tagsinput.js",
        "resources/assets/js/plugins/jasny-bootstrap.min.js",
        "resources/assets/js/plugins/fullcalendar.min.js",
        "resources/assets/js/plugins/nouislider.min.js",
    ],
    "public/js/plugins-form2.js"
);
mix.scripts(
    [
        "resources/assets/js/plugins/sweetalert2.js",
        "resources/assets/js/plugins/bootstrap-notify.js",

        //"resources/assets/demo/demo.js"
    ],
    "public/js/plugins-notify.js"
);

mix.scripts(
    [
        "resources/assets/js/material-dashboard.js",
    ],
    "public/js/material.js"
);




mix.styles(
    [
        //"resources/assets/bootstrap/css/bootstrap.min.css",
    ],
    "public/css/vendor.min.css"
);

// mix.copy("resources/assets/images/", "public/assets/images/");
// mix.copy("resources/css/icons", "public/css/scss/icons/");


mix.disableNotifications();
mix.browserSync({
    proxy: 'localhost:8000'
})