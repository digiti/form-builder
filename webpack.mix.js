const mix  = require('laravel-mix');
require('laravel-mix-purgecss');
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

 /**
  * Javascript
  */
mix.js('resources/js/site.js', 'public/js');

/**
 * Stylesheets
 */
mix.sass('resources/scss/site.scss', 'public/css')
   .purgeCss({
        enabled: false
    });
mix.options({
  processCssUrls: false
});

/**
 * Browser sync
 */
 mix.browserSync('conversion-tool.test');

if (mix.inProduction()) {
   mix.version();
}
