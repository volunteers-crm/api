<template>
    <v-navigation-drawer app />

    <v-app-bar app>
        App title is {{ title }}
    </v-app-bar>
</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex';

import HeaderComponent from '@components/Header';
import FooterComponent from '@components/Footer';

export default {
    components: { HeaderComponent, FooterComponent },

    setup() {
        const store = useStore();

        return {
            title: computed(() => store.getters['meta/title'])
        };
    }
};
</script>
