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

export default {
    namespaced: true,

    state: () => ({
        items: [
            { icon: 'mdi-view-dashboard', title: 'Dashboard' },
            { icon: 'mdi-clipboard-account', title: 'Orders' }
        ]
    }),

    getters: {
        items: state => state.items
    }
};
