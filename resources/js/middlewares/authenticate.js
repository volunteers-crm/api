import store from '@store';
import router from '@plugins/routes';

import { ROUTE_DASHBOARD, ROUTE_LOGIN } from '@const/route-names';

export function authenticate({ next }) {
    if (store.getters['user/hasLogged']) {
        return next();
    }

    router.push({ name: ROUTE_LOGIN });
}

export function guest({ next }) {
    if (! store.getters['user/hasLogged']) {
        return next();
    }

    router.push({ name: ROUTE_DASHBOARD });
}
