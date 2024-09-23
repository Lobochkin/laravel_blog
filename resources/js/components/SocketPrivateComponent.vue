<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row mb-3 g-2">
                    <div class="form-floating  col-sm-4">
                        <select style="height: 200px" multiple class="form-select" id="floatingSelect" v-model="userSelect">
                            <option v-for="user in users" :value="'news-action.' + user.id">{{ user.email }}</option>
                        </select>
                        <label for="floatingSelect">Users</label>
                    </div>
                    <div class="form-floating  col-sm-8">
                        <textarea style="height: 200px" readonly class="form-control" id="textAria">{{ dataMessages.join('\n')}}</textarea>
                        <label for="textAria">Comments</label>
                    </div>
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
            message: '',
            userSelect: [],
        };
    },
    props: ['users','user'],
    mounted() {
        const socket = io('http://laravel-blog.lobochkin.ru:3000');
        socket.on('news-action.'+ this.user.id + ':App\\Events\\PrivateMessage', function(data) {
            console.log(data.message);
            this.dataMessages.push(data.message.user + ': ' + data.message.message);
        }.bind(this));
        socket.on('news-action.:App\\Events\\PrivateMessage', function(data) {
            console.log(data.message);
            this.dataMessages.push(data.message.user + ': ' + data.message.message);
        }.bind(this));
    },
    methods: {
        sendMessage() {
            if (!this.message) {
                return;
            }
            if (!this.userSelect.length){
                this.userSelect.push('news-action.');
            }
            axios({
                url: '/start/send-private-message',
                method: 'GET',
                params: { channels: this.userSelect ,message: this.message , user: this.user.email}
            }).then((response) => {
                this.message = '';
            });
        }
    }
};
</script>

<style scoped>

</style>
