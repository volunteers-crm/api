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
const config = require('./webpack.config');

mix
    .webpackConfig(config)

    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')

    .extract(['vue', 'axios', 'lodash'])

    .vue({
        extractStyles: true
    })

    .sourceMaps()
    .version();

if (! mix.inProduction()) {
    const url = process.env.APP_URL || '127.0.0.1';
    const port = process.env.APP_PORT || 80;

    mix.browserSync(url + (port !== 80 ? `:${ port }` : ''));
}
