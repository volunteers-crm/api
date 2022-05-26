import { createRouter, createWebHistory } from 'vue-router';

import HomeComponent from '../pages/Home';
import FaqComponent from '../pages/Faq';
import PageComponent from '../pages/Page';
import FeedbackComponent from '../pages/Feedback';
import BecomeVolunteerComponent from '../pages/BecomeVolunteer';

import AdminComponent from '../pages/Admin';
import AdminDashboardComponent from '../pages/sections/admin/Dashboard';

import { ROUTE_ADMIN_DASHBOARD, ROUTE_BECOME_VOLUNTEER, ROUTE_FAQ, ROUTE_FEEDBACK, ROUTE_HOME, ROUTE_PAGE } from './route-names';

const routes = [
    { path: '/', component: HomeComponent, name: ROUTE_HOME },
    { path: '/faq', component: FaqComponent, name: ROUTE_FAQ },
    { path: '/pages/:slug', component: PageComponent, name: ROUTE_PAGE },
    { path: '/feedback', component: FeedbackComponent, name: ROUTE_FEEDBACK },
    { path: '/become-a-volunteer', component: BecomeVolunteerComponent, name: ROUTE_BECOME_VOLUNTEER },

    {
        path: '/admin',
        component: AdminComponent,
        children: [
            { path: '', component: AdminDashboardComponent, name: ROUTE_ADMIN_DASHBOARD }
        ]
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
});
