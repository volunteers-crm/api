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
