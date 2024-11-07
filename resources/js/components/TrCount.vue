<template>
    <tr>
        <td class="tr-count__count-cell">{{ arMeter.date }}</td>
        <td class="tr-count__count-cell">{{ arMeter.electric }}</td>
        <td class="tr-count__count-cell">{{ arMeter.hot_water }}</td>
        <td class="tr-count__count-cell">{{ arMeter.cold_water }}</td>
        <td class="tr-count__count-cell">
            <form>
                <button @click.prevent="editRow(arMeter.id)" class="btn btn-info me-1"><i class="fa fa-edit"></i>
                </button>
                <button @click.prevent="deleteRow(arMeter.id)" class="btn btn-secondary"><i class="fa fa-trash-o"></i>
                </button>
            </form>

        </td>
        <td>{{ arMeter.total }}</td>
    </tr>
    <popap-component v-model:show="popap">
        <table class="table ">
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
            <tr>

                <td class="tr-count__count-cell"><DatePicker v-model="arData.date" dateFormat="yy-mm-dd" showIcon variant="filled" /></td>
                <td class="tr-count__count-cell"><input class="tr-count__input" v-model.number="arData.electric"  /></td>
                <td class="tr-count__count-cell"><input class="tr-count__input" v-model.number="arData.hot_water" /></td>
                <td class="tr-count__count-cell"><input class="tr-count__input" v-model.number="arData.cold_water"  /></td>
                <td>
                    <button @click.prevent="save" class="btn btn-info me-1"><i
                        class="fa fa-save"></i></button>
                </td>
                <td class="tr-count__count-cell"><InputNumber v-model="countTotal" disabled  mode="currency" currency="RUB"  fluid /></td>

            </tr>
            </tbody>
        </table>
    </popap-component>
</template>

<script>
import axios from 'axios';
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';


export default {
    data() {
        return {
            popap: false,
            arData: {
                date: null,
                electric: null,
                hot_water: null,
                cold_water: null,
                total: null
            }
        };
    },
    props: {
        oldMeter: [Array],
        arMeter: [Array]
    },
    mounted() {

    },
    methods: {
        ...mapActions({
            editMeters: 'meters/editMeters',
            deleteRow: 'meters/deleteRow'
        }),
        save(){
            this.editMeters({
                id: this.arMeter.id,
                electric:this.arData.electric,
                hot_water:this.arData.hot_water,
                cold_water:this.arData.cold_water,
                date:this.$moment(this.arData.date).format("YYYY-MM-DD"),
                total: this.countTotal
            });
            this.popap = false;
        },
        editRow() {
            this.arData.date = this.arMeter.date;
            this.arData.electric = this.arMeter.electric;
            this.arData.hot_water = this.arMeter.hot_water;
            this.arData.cold_water = this.arMeter.cold_water;
            this.popap = true;
        }
    },
    computed: {
        ...mapState({
            arPrice: state => state.prices.arPrice,
            csrfToken: state => state.prices.csrfToken
        }),
        countTotal() {
            if (!this.arData.date || !this.arData.electric || !this.arData.hot_water || !this.arData.cold_water) {
                return '-';
            }

            return Math.round((this.arData.hot_water - this.oldMeter.hot_water) * this.arPrice.warming + ((this.arData.hot_water - this.oldMeter.hot_water) + (this.arData.cold_water - this.oldMeter.cold_water)) * this.arPrice.water +
                (this.arData.electric - this.oldMeter.electric) * this.arPrice.electric);
        }
    },

};
</script>

<style lang="scss" scoped>

</style>
