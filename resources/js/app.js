import './bootstrap';
import {createApp} from "vue/dist/vue.esm-bundler"
import Echo from 'laravel-echo'
// eslint-disable-next-line no-unused-vars
import Pusher from 'pusher-js'

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import ChatComponent from './components/ChatComponent.vue'

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

app.provide('echo', EchoInstance)

app.mount("#app");
