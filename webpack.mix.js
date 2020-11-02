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

//mix.js('resources/js/app.js', 'public/js')
mix.js('resources/_adm/js/app.js', 'public/_adm/js/app.js')
    .sass('resources/sass/app.scss', 'public/css')

    .sass('resources/_site/sass/plugins.scss', 'public/_site/css/plugins.css')
    .sass('resources/_site/sass/template.scss', 'public/_site/css/template.css')
    .sass('resources/_site/sass/pages/home.scss', 'public/_site/css/pages/home.css')
    .sass('resources/_site/sass/pages/news.scss', 'public/_site/css/pages/news.css')
    .sass('resources/_site/sass/pages/entidades-parceiras.scss', 'public/_site/css/pages/entidades-parceiras.css')
    .sass('resources/_site/sass/pages/editais.scss', 'public/_site/css/pages/editais.css')
    .sass('resources/_site/sass/pages/search.scss', 'public/_site/css/pages/search.css')
    .sass('resources/_site/sass/pages/acordos-e-convencoes.scss', 'public/_site/css/pages/acordos-e-convencoes.scss')
    .sass('resources/_site/sass/pages/meu-sindicato.scss', 'public/_site/css/pages/meu-sindicato.css')

    .sass('resources/_site/sass/componentes/menu-sindicato.scss', 'public/_site/css/pages/menu-sindicato.css')
    .sass('resources/_site/sass/pages/sindicatos/sindicato.scss', 'public/_site/css/pages/sindicatos/sindicato.css')
    .sass('resources/_site/sass/pages/sindicatos/o-sindicato.scss', 'public/_site/css/pages/sindicatos/o-sindicato.css')
    .sass('resources/_site/sass/pages/sindicatos/servicos.scss', 'public/_site/css/pages/sindicatos/servicos.css')
    .sass('resources/_site/sass/pages/sindicatos/editais.scss', 'public/_site/css/pages/sindicatos/editais.css')
    .sass('resources/_site/sass/pages/sindicatos/contato.scss', 'public/_site/css/pages/sindicatos/contato.css')
    .sass('resources/_site/sass/pages/sindicatos/sindicalize-se.scss', 'public/_site/css/pages/sindicatos/sindicalize-se.css')
    
    .sass('resources/_site/sass/componentes/menu-fetrafi-rs.scss', 'public/_site/css/pages/menu-fetrafi-rs.css')
    .sass('resources/_site/sass/pages/fetrafi-rs/fetrafi-rs.scss', 'public/_site/css/pages/fetrafi-rs/fetrafi-rs.css')
    .sass('resources/_site/sass/pages/fetrafi-rs/o-fetrafi-rs.scss', 'public/_site/css/pages/fetrafi-rs/o-fetrafi-rs.css')
    .sass('resources/_site/sass/pages/fetrafi-rs/servicos.scss', 'public/_site/css/pages/fetrafi-rs/servicos.css')
    .sass('resources/_site/sass/pages/fetrafi-rs/editais.scss', 'public/_site/css/pages/fetrafi-rs/editais.css')
    .sass('resources/_site/sass/pages/fetrafi-rs/contato.scss', 'public/_site/css/pages/fetrafi-rs/contato.css')
    .sass('resources/_site/sass/pages/fetrafi-rs/sindicalize-se.scss', 'public/_site/css/pages/fetrafi-rs/sindicalize-se.css')
    
    .styles('node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css', 'public/_site/css/mCustomScrollbar.css')
    .scripts([
        //'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js.js',
        'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js'
    ], 'public/_site/js/plugins.js')
    .scripts('node_modules/@iconfu/svg-inject/dist/svg-inject.min.js', 'public/_site/js/svg-inject.min.js')
    .scripts('resources/_site/js/template.js', 'public/_site/js/template.js');

mix.sass('resources/_adm/sass/app.scss', 'public/_adm/css/app.css');
mix.sass('resources/_adm/sass/auth.scss', 'public/_adm/css/auth.css');

mix.browserSync(process.env.APP_URL);
