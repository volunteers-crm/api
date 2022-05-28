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

import store from '@store';
import router from '@plugins/routes';

import { ROUTE_DASHBOARD } from '@const/route-names';
import { URL_LOGIN } from '@const/url';

export function authenticate({ next }) {
    if (store.getters['user/hasLogged']) {
        return next();
    }

    window.location.href = URL_LOGIN;
}

export function guest({ next }) {
    if (! store.getters['user/hasLogged']) {
        return next();
    }

    router.push({ name: ROUTE_DASHBOARD });
}
