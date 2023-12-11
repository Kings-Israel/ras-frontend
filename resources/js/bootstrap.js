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
import NotificationsComponent from './components/Notifications.vue'
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const EchoInstance = new Echo({
    broadcaster: 'pusher',
    key: 'cMtiHg.XV1L5g',
    wsHost: 'realtime-pusher.ably.io',
    wsPort: 443,
    disableStats: true,
    encrypted: true,
    cluster: 'eu',
})

const options = {
    // You can set your default options here
};

const app = createApp({})
// Show chat in confirmed order section
const app_orders = createApp({})
// Show Chat in paid order section
const app_paid_orders = createApp({})
// Notifications
const notifications = createApp({})

app.component('ChatComponent', ChatComponent)
app.component('OrderChatComponent', OrderChatComponent)
app_orders.component('OrderChatComponent', OrderChatComponent)
app_paid_orders.component('OrderChatComponent', OrderChatComponent)
notifications.component('NotificationsComponent', NotificationsComponent)

app.provide('echo', EchoInstance)
app_orders.provide('echo', EchoInstance)
app_paid_orders.provide('echo', EchoInstance)
notifications.provide('echo', EchoInstance)
notifications.use(Toast, options);

app.mount("#app");
app_orders.mount("#app-orders");
app_paid_orders.mount("#app-paid-orders");
notifications.mount("#notifications");
