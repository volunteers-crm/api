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
