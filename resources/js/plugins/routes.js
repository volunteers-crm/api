import { createRouter, createWebHistory } from 'vue-router';

import Dashboard from '@pages/Dashboard';
import Login from '@pages/Login';
import Become from '@pages/Become';

import { ROUTE_BECOME, ROUTE_DASHBOARD, ROUTE_LOGIN } from '@const/route-names';

import { authenticate, guest } from '@middlewares/authenticate';

const routes = [
    { path: '/', name: ROUTE_LOGIN, component: Login, meta: { middleware: [guest] } },

    { path: '/become', name: ROUTE_BECOME, component: Become },

    { path: '/dashboard', name: ROUTE_DASHBOARD, component: Dashboard, meta: { middleware: [authenticate] } }
];

export default createRouter({
    history: createWebHistory(),
    routes
});
