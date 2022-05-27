<template>
    <v-btn
        :href="repository"
        :icon="icon"
    />
</template>

<script>
export default {
    name: 'GitHub',

    setup() {
        return {
            icon: 'mdi-github',

            repository: process.env.GITHUB_REPOSITORY
        };
    }
};
</script>
