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
