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

const path = require('path');

module.exports = {
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
    }
};
