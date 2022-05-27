<template>
    <v-row>
        <v-col cols="6">
            <!--            <apexchart-->
            <!--                :width="charts.orders.width"-->
            <!--                :type="charts.orders.type"-->
            <!--                :options="charts.orders.options"-->
            <!--                :series="charts.orders.series"-->
            <!--            />-->
        </v-col>

        <v-col cols="6">
            <!--            <apexchart-->
            <!--                :width="charts.volunteers.width"-->
            <!--                :type="charts.volunteers.type"-->
            <!--                :options="charts.volunteers.options"-->
            <!--                :series="charts.volunteers.series"-->
            <!--            />-->
        </v-col>
    </v-row>
    It's a dashboard
</template>

<script>
export default {
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
