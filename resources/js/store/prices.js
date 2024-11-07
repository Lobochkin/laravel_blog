import axios from 'axios';

export const prices = {
    state: () => {
        return {
            arPrice: {
                default: [],
                type: Array
            },
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    getters: {
        getArPrices(state){
            return state.arPrice;
        }
    },
    mutations: {
        setPrice(state, arPrice) {
            state.arPrice = arPrice;
        }
    },
    actions: {
        async getPrices({state,commit}){
            await axios.post('/count/getPrice', {}
                ,
                {
                    headers: {
                        'X-CSRF-TOKEN': state.csrfToken
                    }
                }
            ).then((response) => {
                commit('setPrice',response.data);
            }).finally(() => {

            });
        }
    },
    namespaced: true
};
