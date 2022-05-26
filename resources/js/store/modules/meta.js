export default {
    namespaced: true,

    state: () => ({
        locale: 'en',

        title: null
    }),

    actions: {
        setLocale: ({ commit }, locale) => commit('setLocale', { locale }),

        setMetaTitle: ({ commit }, title) => commit('setMetaTitle', { title })
    },

    mutations: {
        setLocale: (state, locale) => state.locale = locale,

        setMetaTitle: (state, title) => state.meta.title = title
    }
};
