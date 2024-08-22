<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <Line v-if="loaded" :data="chartData" :height="100" :options="options" />
                <button @click="update" class="btn btn-secondary mb-1 mt-1">Update </button>
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
} from 'chart.js'
import { Line } from 'vue-chartjs'

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
)

export default {
    components: {
        Line
    },
    data() {
        return {
            loaded: false,
            chartData: null,
            options: {
                responsive: true,
                maintainAspectRation: false
            }
        }
    },
    mounted() {
        this.update();
    },
    methods: {
        update() {
            this.loaded = false;
            axios.get('/start/data-chart-random').then((response) => {
                this.chartData = response.data;
                this.loaded = true;
            })
        }
    }
};
</script>

<style scoped>

</style>
