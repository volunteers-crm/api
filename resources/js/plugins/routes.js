import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '@pages/Dashboard';

import { ROUTE_DASHBOARD } from '@const/route-names';

import { authenticate } from '@middlewares/authenticate';

const routes = [
    { path: '/', name: ROUTE_DASHBOARD, component: Dashboard, meta: { middleware: [authenticate] } }
];

export default createRouter({
    history: createWebHistory(),
    routes
});
