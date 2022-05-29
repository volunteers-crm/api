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

import { createStore } from 'vuex';

import meta from '@store/modules/meta';
import user from '@store/modules/user';
import menu from '@store/modules/menu';
import layout from '@store/modules/layout';

export default createStore({
    modules: {
        meta,
        user,
        menu,
        layout
    }
});
