const mix = require('laravel-mix');
const path = require('path');
const dotenv = require('dotenv-webpack');

mix
    .webpackConfig({
        resolve: {
            alias: {
                '@images': path.resolve(__dirname, 'resources/images'),

                '@const': path.resolve(__dirname, 'resources/js/constants'),
                '@pages': path.resolve(__dirname, 'resources/js/pages'),
                '@store': path.resolve(__dirname, 'resources/js/plugins/store'),
                '@middlewares': path.resolve(__dirname, 'resources/js/middlewares'),
                '@plugins': path.resolve(__dirname, 'resources/js/plugins'),
                '@components': path.resolve(__dirname, 'resources/js/components')
            }
        },

        plugins: [
            new dotenv()
        ]
    })

    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')

    .vue()
    .sourceMaps()
    .version()
    .extract(['vue', 'axios', 'lodash'])

    .browserSync('localhost:8000');
