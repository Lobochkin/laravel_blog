<template>
    <div class="row">
        <div class="col-8">
            <h2>Текущий тариф</h2>
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">Вода</th>
                    <th scope="col">Нагрев воды</th>
                    <th scope="col">Электричество</th>
                    <th scope="col">Дата</th>
                    <th scope="col" class="text-right">Действие</th>
                    <th scope="col">Квартира</th>
                    <th scope="col">Интернет</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="arPrice !== null">
                    <td class="count-cell">{{ arPrice.water }} ₽</td>
                    <td class="count-cell">{{ arPrice.warming }} ₽</td>
                    <td class="count-cell">{{ arPrice.electric }} ₽</td>
                    <td class="count-cell">{{ dateFormate(arPrice.updated_at) }}</td>
                    <td>
                        <form>
                            <button @click.prevent="addPrice" class="btn btn-success me-1"><i class="fa fa-plus"
                                                                                              aria-hidden="true"></i>
                            </button>
                            <button @click.prevent="changePrice" class="btn btn-info me-1"><i class="fa fa-edit"></i>
                            </button>
                            <button @click.prevent="deletePrice(arPrice.id)" type="submit" class="btn btn-secondary"><i
                                class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                    <td class="count-cell">{{ priceFlat }} ₽</td>
                    <td class="count-cell">{{ priceInet }} ₽</td>
                </tr>
                <tr v-else>
                    <td colspan="5">Загрузка тарифа ...</td>
                </tr>
                </tbody>
            </table>
        </div>
        <popap-component v-model:show="popap">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">Вода</th>
                    <th scope="col">Нагрев воды</th>
                    <th scope="col">Электричество</th>
                    <th scope="col" class="text-right">Действие</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="arPrice !== null">
                    <td class="count-cell">
                        <input type="text" v-model="newWater" placeholder="Вода">
                    </td>
                    <td class="count-cell">
                        <input type="text" v-model="newWarming" placeholder="Нагрев воды">
                    </td>
                    <td class="count-cell">
                        <input type="text" v-model="newElectric" placeholder="Электричество">
                    </td>
                    <td>
                        <button v-if="!activeEditButton" @click.prevent="addRow" class="btn btn-info me-1"><i
                            class="fa fa-save"></i></button>
                        <button v-else @click.prevent="save(arPrice.id)" class="btn btn-info me-1"><i
                            class="fa fa-save"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </popap-component>
    </div>
</template>

<script>
import axios from 'axios';
import {mapState, mapGetters, mapMutations, mapActions} from 'vuex';

export default {
    components: {},
    data() {
        return {
            newWater: null,
            newWarming: null,
            newElectric: null,
            popap: false,
            activeEditButton: false
        };
    },
    mounted() {
        this.getPrices();
    },
    methods: {
        ...mapActions({
            getPrices: 'prices/getPrices',
            // setPrice: 'prices/setPrice'
        }),
        ...mapMutations({
            setPrice: 'prices/setPrice'
        }),
        changePrice() {
            this.popap = true;
            this.newWater = this.arPrice.water;
            this.newWarming = this.arPrice.warming;
            this.newElectric = this.arPrice.electric;
            this.activeEditButton = true;
        },
        addPrice() {
            this.popap = true;
            this.newWater = null;
            this.newWarming = null;
            this.newElectric = null;
            this.activeEditButton = false;
        },
        addRow() {
            if (!this.newWater) {
                alert('Введите тариф по воде!');

                return false;
            }
            if (!this.newWarming) {
                alert('Введите тариф по нагреву воды!');

                return false;
            }
            if (!this.newElectric) {
                alert('Введите тариф по электричеству!');

                return false;
            }
            let forData = new FormData();
            forData.append('newWater', this.newWater);
            forData.append('newWarming', this.newWarming);
            forData.append('newElectric', this.newElectric);
            forData.append('id', 0);

            axios.post('/count/setPrice', forData,
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                }).then((response) => {
                this.setPrice(response.data);
                this.newWater = null;
                this.newWarming = null;
                this.newElectric = null;
            }).finally(() => {
                this.popap = false;
            });
        },
        save(id) {
            if (!this.newWater) {
                alert('Введите тариф по воде!');

                return false;
            }
            if (!this.newWarming) {
                alert('Введите тариф по нагреву воды!');

                return false;
            }
            if (!this.newElectric) {
                alert('Введите тариф по электричеству!');

                return false;
            }
            let forData = new FormData();
            forData.append('newWater', this.newWater);
            forData.append('newWarming', this.newWarming);
            forData.append('newElectric', this.newElectric);
            forData.append('id', id);

            axios.post('/count/setPrice', forData,
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                }).then((response) => {
                this.setPrice(response.data);
                this.newWater = null;
                this.newWarming = null;
                this.newElectric = null;
            }).finally(() => {
                this.popap = false;
            });

        },
        deletePrice(id) {
            if (!confirm('Удалить?')) {
                return false;
            }
            axios.post('/count/delPrice', {'id': id},
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                }).then((response) => {
                this.setPrice(response.data);
            }).finally(() => {

            });
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
        ...mapGetters({
            getArPrices: 'prices/getArPrices'
        }),
        ...mapState({
            arPrice: state => state.prices.arPrice,
            csrfToken: state => state.prices.csrfToken,
            priceFlat: state => state.prices.priceFlat,
            priceInet: state => state.prices.priceInet
        })
    }
};
</script>

<style lang="scss" >
.count-cell {
    vertical-align: middle;
    align-content: center;
}


</style>
