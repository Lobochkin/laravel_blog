<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button @click="update" class="btn btn-outline-secondary mb-1" v-if="!isRefresh">Обновить {{id}}...</button>
                <span class="badge badge-primary mb-1" v-if="isRefresh">Обновление ...</span>
                <table class="table table-striped ">
                    <thead>
                    <tr class="table-success">
                        <th>
                            Наименование
                        </th>
                        <th>
                            URL
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="url in urlData">
                        <td>{{ url.title }}</td>
                        <td>{{ url.url }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';

export default {
    data: function() {
        return {
            urlData: [],
            isRefresh: false,
            id: 0
        };
    } ,
    mounted() {
        this.update();
    },
    methods: {
        update() {
            this.isRefresh = true;
            axios.get('/start/get-json').then((response)=>{
                this.urlData = response.data;
                this.isRefresh = false;
                this.id++;
            })
        },
    }
};
</script>

<style scoped>

</style>
