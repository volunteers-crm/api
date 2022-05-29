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
    <v-row>
        <v-col cols="6">
            <!--            <apexchart-->
            <!--                :width="charts.orders.width"-->
            <!--                :type="charts.orders.type"-->
            <!--                :options="charts.orders.options"-->
            <!--                :series="charts.orders.series"-->
            <!--            />-->

            First Chart
        </v-col>

        <v-col cols="6">
            <!--            <apexchart-->
            <!--                :width="charts.volunteers.width"-->
            <!--                :type="charts.volunteers.type"-->
            <!--                :options="charts.volunteers.options"-->
            <!--                :series="charts.volunteers.series"-->
            <!--            />-->

            Second Chart
        </v-col>
    </v-row>
</template>

<script>
import { ADMIN_LAYOUT } from '@const/layouts';

export default {
    name: 'Dashboard',

    layout: ADMIN_LAYOUT,

    metaInfo() {
        return { title: 'Dashboard' };
    },

    setup() {
        return {
            charts: {
                orders: {
                    type: 'pie',

                    width: 380,

                    options: {
                        labels: ['To Do', 'In Progress', 'Completed']
                    },

                    series: [123, 36, 49]
                },

                volunteers: {
                    type: 'pie',

                    width: 380,

                    options: {
                        labels: ['Car Driver', 'Money', 'Food', 'Things', 'Coordination', 'Accommodation']
                    },

                    series: [12, 14, 16, 18, 12, 4]
                }
            }
        };
    }
};
</script>
