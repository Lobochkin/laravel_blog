<template>
    <div class="count-list__button">
        <Button type="button" label="Передать показания" severity="success"  raised icon="pi pi-plus-circle" @click="showPopap" />
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
                    <td class="tr-count__count-cell"><Calendar v-model="date" dateFormat="yy-mm-dd" showIcon variant="filled" /></td>
                    <td class="tr-count__count-cell"><input class="tr-count__input" v-model.number="electric" /></td>
                    <td class="tr-count__count-cell"><input class="tr-count__input" v-model.number="hot_water"/></td>
                    <td class="tr-count__count-cell"><input class="tr-count__input" v-model.number="cold_water" /></td>
                    <td>
                        <button @click.prevent="added" class="btn btn-info me-1"><i
                            class="fa fa-save"></i></button>
                    </td>
                    <td class="tr-count__count-cell"><InputNumber v-model="countTotal" disabled  mode="currency" currency="RUB"  fluid /></td>
                </tr>
                </tbody>
            </table>
        </popap-component>
    </div>
</template>

<script>
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';
import axios from 'axios';
export default {
    data() {
        return {
            popap: false,
            date: null,
            electric: null,
            hot_water: null,
            cold_water: null
        }
    },
    props: ['page'],
    methods: {
        ...mapActions({
            addMeters: 'meters/addMeters'
        }),
        showPopap(){
            this.popap = true;
            this.date = null;
            this.electric = null;
            this.hot_water = null;
            this.cold_water = null;
        },
        added() {
            this.addMeters({
                total: this.countTotal,
                date: this.$moment(this.date).format("YYYY-MM-DD"),
                electric: this.electric,
                hot_water: this.hot_water,
                cold_water: this.cold_water
            });

            this.popap = false;
        },
        dateFormate(date = null) {
            if (date) {
                let obDate = new Date(date);
                return obDate.toLocaleDateString();
            }

            return '';
        }

    },
    computed: {
        ...mapState({
            arPrice: state => state.prices.arPrice,
            arMeters: state => state.meters.arMeters,
        }),
        countTotal(){
            if (!this.date || !this.electric || !this.hot_water || !this.cold_water) {
                return '-';
            }
            return Math.round((this.hot_water - this.arMeters[0].hot_water) * this.arPrice.warming + ((this.hot_water - this.arMeters[0].hot_water) + (this.cold_water - this.arMeters[0].cold_water)) * this.arPrice.water +
                (this.electric - this.arMeters[0].electric) * this.arPrice.electric);
        }
    }
};
</script>

<style lang="scss" scoped>

</style>
