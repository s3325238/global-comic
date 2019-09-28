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

mix.scripts([
        'public/admin/js/check.js',
        'public/admin/js/upload.js',
    ],'public/admin/js/custom.min.js')
    .scripts([
        'public/admin/js/plugins/bootstrap-notify.js',
        'public/admin/js/plugins/sweetalert2.js',
        'public/admin/js/plugins/bootstrap-selectpicker.js',
    ],'public/admin/js/select-notify-sweet.min.js')
    .scripts('public/js/material-kit.js','public/site/js/material-kit.min.js')
    .sass('public/admin/sass/app.scss','public/admin/css/material-dashboard-pro.min.css');
