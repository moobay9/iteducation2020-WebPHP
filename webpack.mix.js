const mix = require('laravel-mix');

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