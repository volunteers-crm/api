/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

const mix = require('laravel-mix');
const path = require('path');
const dotenv = require('dotenv-webpack');

const url = process.env.APP_URL || '127.0.0.1';
const port = process.env.APP_PORT || 80;

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

    .browserSync(url + (port !== 80 ? `:${ port }` : ''));
