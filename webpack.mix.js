const mix = require('laravel-mix');

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
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/plugins/dataTables/datatables.min.css', 'public/css')
    .postCss('resources/css/plugins/iCheck/custom.css', 'public/css')
    .postCss('resources/css/plugins/steps/jquery.steps.css', 'public/css')
    .postCss('resources/css/plugins/select2/select2.min.css', 'public/css')
    .postCss('resources/css/templatemo-style.css', 'public/css')
    .postCss('resources/font-awesome/css/font-awesome.css', 'public/css');
