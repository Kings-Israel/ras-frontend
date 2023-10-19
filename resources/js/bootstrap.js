/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

const HOST = process.env.NODE_ENV == 'production' ? '194.163.129.200' : '127.0.0.1';

console.log(HOST)

window.Echo = new Echo({
    // Laravel Websockets Config
    broadcaster: 'pusher',
    key: 'local',
    wsHost: HOST,
    wsPort: 80,
    wssPort: 80,
    cluster : 'mt1',
    forceTLS: false,
    encrypted: true,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],

    // // Ably config
    // broadcaster: 'pusher',
    // key: 'W4R6LA.GZ7-qw',
    // wsHost: window.location.hostname,
    // wssHost: window.location.hostname,
    // wsPort: 6001,
    // wssPort: 6001,
    // disableStats: true,
    // encrypted: true,
    // cluster: 'eu',
    // enabledTransports: ['ws', 'wss'],
});
