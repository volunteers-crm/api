export default {
    namespaced: true,

    state: () => ({
        locale: 'en',

        application: {
            title: null
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

        setApplicationTitle: ({ commit }, title) => commit('setApplicationTitle', { title }),

        setPageTitle: ({ commit }, title) => commit('setPageTitle', { title })
    },

    mutations: {
        setLocale: (state, locale) => state.locale = locale,

        setApplicationTitle: (state, title) => state.application.title = title,

        setPageTitle: (state, title) => state.page.title = title
    }
};
