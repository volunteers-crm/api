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
        locale: 'en',

        application: {
            title: process.env.APP_NAME
        },

        page: {
            title: null
        }
    }),

    getters: {
        locale: state => state.locale,

        applicationTitle: state => state.application.title,

        pageTitle: state => state.page.title
    },

    actions: {
        setLocale: ({ commit }, locale) => commit('setLocale', { locale }),

        setPageTitle: ({ commit }, title) => commit('setPageTitle', { title })
    },

    mutations: {
        setLocale: (state, locale) => state.locale = locale,

        setPageTitle: (state, title) => state.page.title = title
    }
};
