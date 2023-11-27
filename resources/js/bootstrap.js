/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
import Pusher from 'pusher-js'
import Echo from 'laravel-echo'
import {createApp} from "vue/dist/vue.esm-bundler"

// window.axios = axios;

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'W4R6LA.GZ7-qw',
//     wsHost: 'realtime-pusher.ably.io',
//     wsPort: 443,
//     disableStats: true,
//     encrypted: true,
//     cluster: 'eu',
// });

import ChatComponent from './components/ChatComponent.vue'
import OrderChatComponent from './components/OrderChatComponent.vue'

const EchoInstance = new Echo({
    broadcaster: 'pusher',
    key: 'cMtiHg.XV1L5g',
    wsHost: 'realtime-pusher.ably.io',
    wsPort: 443,
    disableStats: true,
    encrypted: true,
    cluster: 'eu',
})

const app = createApp({})

app.component('ChatComponent', ChatComponent)
app.component('OrderChatComponent', OrderChatComponent)

app.provide('echo', EchoInstance)

app.mount("#app");
