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
