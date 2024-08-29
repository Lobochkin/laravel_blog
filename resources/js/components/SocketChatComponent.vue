<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="from-group mb-3">
                    <textarea rows="6" readonly class="form-control" >{{ dataMessages.join('\n')}}</textarea>
                </div>
                <div class="input-group mb-3">

                        <input type="text" class="form-control" placeholder="Input text, please" v-model="message">
                        <button @click="sendMessage" class="btn btn-primary" type="button">Send text</button>
                </div>

            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios';

export default {
    components: {},
    data() {
        return {
            dataMessages: [],
            message: ''
        };
    },
    mounted() {
        const socket = io('http://laravel-blog.lobochkin.ru:3000');
        socket.on('news-action:App\\Events\\NewMessage', function(data) {
            console.log(data.message);
            this.dataMessages.push(data.message);
        }.bind(this));
    },
    methods: {
        sendMessage() {
            axios({
                url: '/start/send-message',
                method: 'GET',
                params: { message: this.message}
            }).then((response) => {
                this.message = '';
            });
        }
    }
};
</script>

<style scoped>

</style>
