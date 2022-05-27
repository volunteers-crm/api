import 'vuetify/styles';

import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

import { createApp } from 'vue';
import { createVuetify } from 'vuetify';

import routes from '@plugins/routes';
import charts from '@plugins/charts'
import store from './store';

import App from './components/App';

const vuetify = createVuetify({
    components,
    directives
});

createApp(App)
    .use(vuetify)
    .use(routes)
    .use(store)
    .use(charts)
    .mount('#app');
