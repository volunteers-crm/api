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
        template: 'default'
    }),

    getters: {
        template: state => state.template
    },

    mutations: {
        setTemplate: (state, template) => state.template = template
    },

    actions: {
        setDefault: ({ commit }) => commit('setTemplate', 'default'),
        setAdmin: ({ commit }) => commit('setTemplate', 'admin')
    }
};
