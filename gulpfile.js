var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
      '../bower_resources/tether/dist/css/tether.min.css',
      '../bower_resources/bootstrap/dist/css/bootstrap.min.css',
      '../bower_resources/ngprogress/ngProgress.css',
      '../bower_resources/angularjs-slider/dist/rzslider.min.css'
    ])
    .scripts([
      '../bower_resources/jquery/dist/jquery.min.js',
      '../bower_resources/tether/dist/js/tether.min.js',
      '../bower_resources/bootstrap/dist/js/bootstrap.min.js',
      '../bower_resources/jquery-zoom/jquery.zoom.min.js'
    ], 'public/js/vendor.js')
    .scripts([
      '../bower_resources/angular/angular.min.js',
      '../bower_resources/angular-resource/angular-resource.min.js',
      '../bower_resources/angular-animate/angular-animate.min.js',
      '../bower_resources/ngprogress/build/ngprogress.min.js',
      '../bower_resources/angularjs-slider/dist/rzslider.min.js'
    ], 'public/js/app.js');
});
