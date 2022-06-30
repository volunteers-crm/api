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
        <component :is="layout" />
    </v-app>
</template>

<script>
import MainLayout from '@components/layouts/Main.vue';
import AdminLayout from '@components/layouts/Admin.vue';

import { computed } from 'vue';
import { useStore } from 'vuex';

export default {
    components: { MainLayout, AdminLayout },

    setup() {
        const store = useStore();

        return {
            layout: computed(() => store.getters['layout/template'])
        };
    }
};
</script>
