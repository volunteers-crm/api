export default {
    namespaced: true,

    state: () => ({
        id: null,

        username: null,

        firstName: null,
        lastName: null
    }),

    getters: {
        hasLogged: () => !! localStorage?.token,

        username: state => state.username.trim(),

        fullName: state => (state.firstName + ' ' + state.lastName).trim()
    }
};
