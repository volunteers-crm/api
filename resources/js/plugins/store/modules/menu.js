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
