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
        <v-main>
            <HelloWorld />
        </v-main>
    </v-app>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue';

export default {
    name: 'App',

    components: {
        HelloWorld,
    },

    data: () => ({
        //
    }),
}
</script>
