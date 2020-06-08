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

mix.sass('resources/_site/sass/plugins.scss', 'public/_site/css/plugins.css')
   .sass('resources/_site/sass/template.scss', 'public/_site/css/template.css')
   .sass('resources/_site/sass/pages/home.scss', 'public/_site/css/pages/home.css')
   .sass('resources/_site/sass/pages/news.scss', 'public/_site/css/pages/news.css')
   .sass('resources/_site/sass/pages/editais.scss', 'public/_site/css/pages/editais.css')
   .sass('resources/_site/sass/pages/acordos-e-convencoes.scss', 'public/_site/css/pages/acordos-e-convencoes.scss')
   .sass('resources/_site/sass/pages/meu-sindicato.scss', 'public/_site/css/pages/meu-sindicato.css')
   .styles('node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css', 'public/_site/css/mCustomScrollbar.css')
   .scripts([
      //'node_modules/jquery/dist/jquery.min.js',
      'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
      'node_modules/bootstrap/dist/js/bootstrap.min.js.js',
      'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js'
   ], 'public/_site/js/plugins.js')
   .scripts('node_modules/@iconfu/svg-inject/dist/svg-inject.min.js', 'public/_site/js/svg-inject.min.js')
   .scripts('resources/_site/js/template.js', 'public/_site/js/template.js').version();

mix.browserSync(process.env.MIX_APP_URL);
/*
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
*/
