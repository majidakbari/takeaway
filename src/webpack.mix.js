const mix = require('laravel-mix');


mix.setPublicPath('public')
    .js('resources/js/app.js', 'public/js/bundle.js')
    .sass('resources/sass/app.scss', 'public/css/bundle.css');
