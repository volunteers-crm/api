<!--
  - This file is part of the "Volunteers CRM" project.
  -
  - For the full copyright and license information, please view the LICENSE
  - file that was distributed with this source code.
  -
  - @author Andrey Helldar <helldar@dragon-code.pro>
  -
  - @copyright 2022 Andrey Helldar
  -
  - @license MIT
  -
  - @see https://github.com/volunteers-crm
  -->

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
