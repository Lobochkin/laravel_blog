<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row mb-3 g-2">
                    <div class="form-floating">
                        <textarea style="height: 200px" readonly class="form-control" id="textAria">{{ dataMessages.join('\n')}}</textarea>
                        <label for="textAria">Comments</label>
                    </div>
                </div>

                <div class="input-group mb-3">

                    <input type="text" class="form-control" placeholder="Input text, please" v-model.trim="message">
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
        window.Echo.channel('chat').listen('Message', ({message}) => { //message название переменной в классе события
            this.dataMessages.push(message);
        }); // Message название класса события

    },
    methods: {
        sendMessage() {
            if (!this.message) {
                return;
            }

            axios.post('/start/message', {
                body: this.message
            },
                {
                    headers: {
                        "X-Socket-Id": Echo.socketId(),
                    }
                }).then((response) => {

            }).finally(() => {
                this.dataMessages.push(this.message);
                this.message = '';
            });

        }
    }
};
</script>

<style scoped>

</style>
