<template>
    <v-app>
        <header-component v-if="!hasLogged" />

        <v-main>
            <v-container fluid>
                <router-view />
            </v-container>
        </v-main>

        <footer-component />
    </v-app>
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
            title: computed(() => store.getters['meta/pageTitle']),

            hasLogged: computed(() => store.getters['user/hasLogged'])
        };
    }
};
</script>
