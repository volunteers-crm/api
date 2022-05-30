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

const { resolve } = require('path');

const dotenv = require('dotenv-webpack');
const minimizer = require('css-minimizer-webpack-plugin');
const extract = require('mini-css-extract-plugin');

module.exports = {
    module: {
        rules: [
            {
                test: /lang.+\.(php|json)$/,
                loader: 'laravel-localization-loader'
            },
            {
                test: /.s?css$/,
                use: [extract.loader, 'css-loader', 'sass-loader']
            }
        ]
    },

    resolve: {
        alias: {
            '@images': resolve(__dirname, 'resources/images'),

            '@const': resolve(__dirname, 'resources/js/constants'),
            '@pages': resolve(__dirname, 'resources/js/pages'),
            '@store': resolve(__dirname, 'resources/js/plugins/store'),
            '@middlewares': resolve(__dirname, 'resources/js/middlewares'),
            '@plugins': resolve(__dirname, 'resources/js/plugins'),
            '@components': resolve(__dirname, 'resources/js/components')
        }
    },

    plugins: [
        new dotenv(),
        new extract()
    ],

    optimization: {
        minimizer: [
            new minimizer()
        ]
    }
};
