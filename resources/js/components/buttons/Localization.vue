<template>
    <v-btn v-text="locale" />
</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex';

export default {
    name: 'Localization',

    setup() {
        const store = useStore();

        return {
            locale: computed(() => store.getters['meta/locale'])
        };
    }
};
</script>
