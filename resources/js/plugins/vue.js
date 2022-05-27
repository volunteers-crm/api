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
