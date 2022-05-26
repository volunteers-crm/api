import { createStore } from 'vuex';

import meta from './modules/meta';
import user from './modules/user';

export default createStore({
    modules: {
        meta,
        user
    }
});
