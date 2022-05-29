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
    <h1 v-text="h1" />
    <h2 v-text="h2" />

    <v-btn :to="signIn.url" v-text="signIn.title" />
</template>

<script>
import { DEFAULT_LAYOUT } from '@const/layouts';
import { ROUTE_SIGN_IN } from '@const/route-names';

export default {
    name: 'Home',

    layout: DEFAULT_LAYOUT,

    metaInfo() {
        return { title: 'Sign In' };
    },

    setup() {
        return {
            h1: 'The CRM',
            h2: 'for volunteers',

            signIn: {
                url: ROUTE_SIGN_IN,
                title: 'Get Started'
            }
        };
    }
};
</script>

