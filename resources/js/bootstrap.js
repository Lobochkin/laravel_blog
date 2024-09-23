window._ = require('lodash');
window.io = require('socket.io-client');
/*!
 * Bootstrap  v5.3.2 (https://getbootstrap.com/)
 * Copyright 2011-2023 The Bootstrap Authors
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
    require('owl.carousel');
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items:1,
            loop:false,
            margin:10,
            URLhashListener:true,
            autoplayHoverPause:true,
            startPosition: 'URLHash'
        });
    });
} catch (e) {
    console.error('Ошибка ' + e.name + ":" + e.message + "\n" + e.stack);
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';
// window.Echo = new Echo({
//     broadcaster: 'socket.io',
//     host: window.location.hostname+':6001'
// });

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
