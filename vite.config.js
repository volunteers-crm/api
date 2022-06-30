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

import { defineConfig } from 'vite';
import { resolve } from 'path';

import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
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
        laravel([
            'resources/js/app.js',
            'resources/js/admin.js'
        ]),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false
                }
            }
        })
    ]
});
