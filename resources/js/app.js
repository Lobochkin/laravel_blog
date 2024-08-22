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
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


app.component('example-component', require('./components/ExampleComponent.vue').default);
app.component('prop-component', require('./components/PropComponent.vue').default);
app.component('ajax-component', require('./components/AjaxComponent.vue').default);
app.component('chart-line-component', require('./components/ChartLineComponent.vue').default);
app.component('chart-pie-component', require('./components/ChartPieComponent.vue').default);
app.component('chart-random-component', require('./components/ChartRandomComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });


app.mount('#app');

