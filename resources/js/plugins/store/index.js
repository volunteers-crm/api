import { createStore } from 'vuex';

import meta from '@store/modules/meta';
import user from '@store/modules/user';
import menu from '@store/modules/menu';

export default createStore({
    modules: {
        meta,
        user,
        menu
    }
});
