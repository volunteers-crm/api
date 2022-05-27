<template>
    <v-app-bar app dark dense color="deep-purple accent-4">
        <v-toolbar-title v-text="title" />

        <v-spacer />

        <v-btn>
            <v-icon>
                mdi-heart
            </v-icon>
        </v-btn>
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
            title: computed(() => store.getters['meta/pageTitle'])
        };
    }
};
</script>
