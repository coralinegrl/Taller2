const mix = require('laravel-mix');

mix.js('resources/js/main.js', 'public/js/')
   .postCss('resources/css/app.css', 'public/css')
   .vue(); 
