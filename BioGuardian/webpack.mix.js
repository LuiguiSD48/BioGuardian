const mix = require('laravel-mix');

mix.js('public/js/app.js', 'public/js')
   .sass('public/sass/app.scss', 'public/css')
   .scripts([
       'public/js/jquery-1.10.2.min.js',
       'public/js/jquery.maphighlight.min.js',
       'public/js/imageMapResizer.min.js'
   ], 'public/js/all-scripts.js');
