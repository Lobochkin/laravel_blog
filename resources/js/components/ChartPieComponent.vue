<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <Pie v-if="loaded" :data="chartData"  :options="options" />
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Pie } from 'vue-chartjs'

ChartJS.register(ArcElement, Tooltip, Legend)

export default {
    components: {
        Pie
    },
    data() {
        return {
            loaded: false,
            chartData: null,
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    mounted() {
        this.update();
    },
    methods: {
        update() {
            this.loaded = false;
            axios.get('/start/data-chart-js').then((response) => {
                this.chartData = response.data;
                this.loaded = true;
            })
        }
    }
};
</script>

<style scoped>

</style>
