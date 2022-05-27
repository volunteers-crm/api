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
