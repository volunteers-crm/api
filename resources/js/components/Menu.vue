<template>
    <v-navigation-drawer
        app
        permanent
        theme="dark"
    >
        <v-list>
            <v-list-item
                :subtitle="userName"
                :title="fullName"
            />
        </v-list>

        <v-divider />

        <v-list density="compact" nav>
            <v-list-item
                v-for="item in menu"
                :key="item.title"
                :prepend-icon="item.icon"
                :title="item.title"
            />
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex';

export default {
    setup() {
        const store = useStore();

        return {
            fullName: computed(() => store.getters['user/fullName']),
            userName: computed(() => store.getters['user/username']),

            menu: computed(() => store.getters['menu/items'])
        };
    }
};
</script>
