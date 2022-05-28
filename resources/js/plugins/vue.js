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

import 'vuetify/styles';

import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

import { createApp } from 'vue';
import { createVuetify } from 'vuetify';

import routes from '@plugins/routes';
//import charts from '@plugins/charts';
import store from '@plugins/store';
import icons from '@plugins/icons';

import App from '@components/App';

const vuetify = createVuetify({
    components,
    directives,
    icons
});

createApp(App)
    .use(vuetify)
    .use(routes)
    .use(store)
    //.use(charts)
    .mount('#app');
