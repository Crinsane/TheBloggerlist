var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

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
    mix.less('app.less')
       .browserify('app.js', null, null, { paths: 'vendor/laravel/spark/resources/assets/js' })
       .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')
       .copy('node_modules/sweetalert/dist/sweetalert.css', 'public/css/sweetalert.css');

    mix.less('main.less')
        .browserify('dependencies.js', 'resources/assets/js/build/dependencies.js')
        .scripts([
            'build/dependencies.js',
            // 'plugins/summernote.min.js',
            './node_modules/icheck/icheck.min.js',
            'theme/inspinia.js'
        ], 'public/js/main.js');

    mix.less('landing.less')
        .browserify('landing.js', 'resources/assets/js/build/landing.js')
        .scripts([
            'build/landing.js',
            'plugins/classie.js',
            'plugins/cbpAnimatedHeader.js',
            'plugins/wow.min.js',
            'theme/landing.js'
        ], 'public/js/landing.js');

    mix.copy('node_modules/font-awesome/fonts', 'public/fonts')
       .copy('node_modules/bootstrap/fonts', 'public/fonts')
        .copy('node_modules/summernote/dist/font', 'public/fonts');

    mix.version([
        'css/main.css',
        'js/main.js',
        'css/landing.css',
        'js/landing.js'
    ]);
});
