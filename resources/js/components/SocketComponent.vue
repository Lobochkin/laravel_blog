<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <Line v-if="loaded" :data="chartData" :height="100" :options="options" />
                <input type="checkbox" v-model="realtime"> realtime
                <input type="text"v-model="label">
                <input type="text"v-model="sale">
                <button @click="sentData" class="btn btn-secondary mt-1 mh-100" >Update</button>
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
            label: '',
            sale: 500,
            realtime: false,
            loaded: false,
            chartData: [],
            options: {
                responsive: true,
                maintainAspectRation: false
            }
        }
    },
    mounted() {
        this.update();
        var socket = io('http://laravel-blog.lobochkin.ru:3000');
        socket.on('news-action:App\\Events\\NewEvent',function(data){
            console.log(data);
            this.chartData= data.result;
        }.bind(this));
    },
    methods: {
        update() {
            this.loaded = false;
            axios.get('/start/socket-chart').then((response) => {
                this.chartData = response.data;
                this.loaded = true;
            })
        },
        sentData() {
            axios({
                url: '/start/socket-chart',
                method: 'GET',
                params: { label: this.label, sale: this.sale, realtime:this.realtime}
            }).then((response) => {
                this.chartData = response.data;
            })
        }
    }
};
</script>

<style scoped>

</style>
