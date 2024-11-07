/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.ClassicEditor = require( '@ckeditor/ckeditor5-build-classic' );
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector( '#description_short' )){
        ClassicEditor.create( document.querySelector( '#description_short' ) ).catch( error => {
            console.error( error );
        } );
    }
    if (document.querySelector( '#description' )){
        ClassicEditor.create( document.querySelector( '#description' ) ).catch( error => {
            console.error( error );
        } );
    }

})

const Vue = require('vue');
const app = Vue.createApp({})
import store from './store';
import PrimeVue from 'primevue/config';
import DatePicker from 'primevue/datepicker';
import InputNumber from 'primevue/inputnumber';
import Aura from '@primevue/themes/aura';
import Button from 'primevue/button';
import Calendar from 'primevue/calendar';
import moment from 'moment';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


app.component('chart-line-component', require('./components/ChartLineComponent.vue').default);
app.component('chart-pie-component', require('./components/ChartPieComponent.vue').default);
app.component('chart-random-component', require('./components/ChartRandomComponent.vue').default);
app.component('socket-component', require('./components/SocketComponent.vue').default);
app.component('socket-chat-component', require('./components/SocketChatComponent.vue').default);
app.component('socket-private-component', require('./components/SocketPrivateComponent.vue').default);
app.component('chat-component', require('./components/ChatComponent.vue').default);
app.component('count-component', require('./components/CountComponent.vue').default);
app.component('price-component', require('./components/PriceComponent.vue').default);
app.component('popap-component', require('./components/PopapComponent.vue').default);
app.component('tr-count', require('./components/TrCount.vue').default);
app.component('DatePicker', DatePicker);
app.component('InputNumber', InputNumber);
app.component('Button', Button);
app.component('Calendar', Calendar);
app.component('add-button', require('./components/addButton.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
app.config.globalProperties.$moment=moment;
app.use(store);
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            prefix: 'p',
            darkModeSelector: 'system',
            cssLayer: false
        }
    }
});

app.mount('#app');

