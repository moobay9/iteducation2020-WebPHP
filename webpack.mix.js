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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.js('resources/assets/js/script.js', 'public/common/js')
    .sass('resources/assets/scss/style.scss', 'public/common/css')
    .options({
        processCssUrls: false,
        postCss: [
            require('autoprefixer')({
                grid: true
            }),
            require('postcss-sort-media-queries')()
        ]
    })
    .sourceMaps()

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'inline-source-map'
    })
} else {
    mix.version();
}

mix.browserSync({
    server: false,
    proxy: 'http://localhost:20080',
    port: 3300,
    files: [
        'public/**/*.html',
        'public/**/*.php',
        'public/common/js/*.js',
        'public/common/css/*.css',
    ],
    ui: {
        port: 3301
    }
})