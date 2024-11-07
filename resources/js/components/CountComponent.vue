<template>
    <h1 class="count-list__title">Показания счетчика(+ 22000 кв. + 500 инет.)</h1>
    <add-button v-if="page===1 || !page"></add-button>
    <table class="table table-striped" v-if="arMeters.length > 0">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Электричество</th>
            <th>Гор. вода</th>
            <th>Хол. вода</th>
            <th class="text-right">Действие</th>
            <th>Всего</th>
        </tr>
        </thead>
        <tbody>
        <tr-count class="tr-count" v-if="arMeters.length > 0" v-for="(arMeter, key) in arMeters"  :arMeter="arMeter" :oldMeter="arMeters[key+1]" ></tr-count>
        <tr v-else>
            <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
        </tr>
        </tbody>
    </table>
    <h2 v-else>Загрузка ...</h2>
</template>
<script>

import TrCount from './TrCount.vue';
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

export default {
    components: {TrCount},
    data() {
        return {
            // arMeters: [],
        };
    },
    props: ['page'],
    mounted() {
        this.setPage(this.page);
        this.getMeters();
    },
    methods: {
        ...mapMutations({
            setPage: 'meters/setPage'
        }),
        ...mapActions({
            getMeters: 'meters/getMeters',
            editMeters: 'meters/editMeters'
        }),
        addedMeter(){

        },

    },
    computed: {
        ...mapState({
            page: state => state.meters.page,
            arMeters: state => state.meters.arMeters,
            csrfToken: state => state.prices.csrfToken
        })
    }
};

</script>

<style scoped>

</style>
