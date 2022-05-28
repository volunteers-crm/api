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
    <v-footer app color="deep-purple accent-4" dark padless>
        <v-col cols="12" class="text-center">
            {{ new Date().getFullYear() }} {{ title }}
        </v-col>
    </v-footer>
</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex';

export default {
    setup() {
        const store = useStore();

        return {
            title: computed(() => store.getters['meta/applicationTitle'])
        };
    }
};
</script>
