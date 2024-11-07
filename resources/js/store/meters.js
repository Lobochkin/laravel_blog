import axios from 'axios';

export const meters = {
    state: () => {
        return {
            arMeters: {
                default: [],
                type: Array
            },
            page: {
                default: 1,
                type: Number
            }
        };
    },
    getters: {
        getArMeters(state){
            return state.arMeters;
        }
    },
    mutations: {
        setMeter(state, arMeters) {
            state.arMeters = arMeters;
        },
        setPage(state, page) {
            state.page = page;
        }
    },
    actions: {
        async getMeters({state,commit}){
            axios.post('/count/getData',
                {'page': state.page},
                {
                    headers: {
                        'X-CSRF-TOKEN': state.csrfToken
                    }
                }).then((response) => {
                commit('setMeter',response.data.data);
            }).finally(() => {

            });
        },
        editMeters({state,commit}, arMeters) {
            axios.post('/count/editData',
                {
                    page: state.page,
                    id: arMeters.id,
                    electric:arMeters.electric,
                    hot_water:arMeters.hot_water,
                    cold_water:arMeters.cold_water,
                    date:arMeters.date,
                    total: arMeters.total
                },
                {
                    headers: {
                        'X-CSRF-TOKEN': state.csrfToken
                    }
                }).then((response) => {
                commit('setMeter',response.data.data);
            }).finally(() => {

            });
        },
        addMeters({state,commit},arMeter){
            axios.post('/count/addData',
                arMeter,
                {
                    headers: {
                        'X-CSRF-TOKEN': state.csrfToken
                    }
                }).then((response) => {
                // console.log(response.data.data);
                commit('setMeter',response.data.data);
            }).finally(() => {

            });
        },
        deleteRow({state,commit},id){
            if (!confirm('Удалить?')) {
                return false;
            }
            axios.post('/count/delRowCount', {'id': id,'page': state.page},
                {
                    headers: {
                        'X-CSRF-TOKEN': state.csrfToken
                    }
                }).then((response) => {
                commit('setMeter',response.data.data);
            }).catch((error) => {
                console.log(error);
            })
            .finally(() => {

            });
        }

    },
    namespaced: true
};
