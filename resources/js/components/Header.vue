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
    <v-app-bar app color="deep-purple accent-4" dark>
        <v-app-bar-nav-icon />

        <v-toolbar-title v-text="title" />

        <v-spacer />

        <localization />
        <github />
    </v-app-bar>
</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex';

import Github from '@components/buttons/GitHub';
import Localization from '@components/buttons/Localization';

export default {
    components: { Github, Localization },

    setup() {
        const store = useStore();

        return {
            title: computed(() => store.getters['meta/pageTitle'])
        };
    }
};
</script>
