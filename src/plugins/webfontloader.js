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

/**
 * plugins/webfontloader.js
 *
 * webfontloader documentation: https://github.com/typekit/webfontloader
 */

export async function loadFonts() {
    const webFontLoader = await import(/* webpackChunkName: "webfontloader" */'webfontloader');

    webFontLoader.load({
        google: {
            families: ['Roboto:100,300,400,500,700,900&display=swap'],
        },
    })
}
