<template>
    <v-app>
        <menu-component />
        <header-component />

        <v-main>
            <router-view />
        </v-main>

        <footer-component />
    </v-app>
</template>

<script>
import HeaderComponent from '@components/Header';
import FooterComponent from '@components/Footer';
import MenuComponent from '@components/Menu';

export default {
    components: { HeaderComponent, FooterComponent, MenuComponent }
};
</script>
