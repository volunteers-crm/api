<template>
    <v-footer padless>
        <v-col cols="12" class="text-center">
            {{ new Date().getFullYear() }} - <strong>{{ title }}</strong>
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
