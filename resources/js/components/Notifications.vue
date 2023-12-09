<template>
    <div class="relative">
        <div class="text-gray-800 bg-gray-300 rounded-full w-7 h-7 my-auto lg:my-0 md:w-8 md:h-8 pt-0.5 md:pt-1 text-center">
            <span v-if="notifications_count > 0" class="font-semibold hover:cursor-pointer" id="dropdown-button" @click="show = !show" data-dropdown-toggle="notifications-dropdown" data-dropdown-placement="bottom">{{ notifications_count }}</span>
            <i v-else class="fas fa-bell"></i>
        </div>
        <div v-if="notifications_count > 0" v-show="show" id="notifications-dropdown" class="absolute z-40 bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700">
            <ul v-for="notification in notifications" :key="notification.id" class="py-2 text-sm text-gray-700 dark:text-gray-200 space-y-2" aria-labelledby="dropdown-button">
                <li v-if="notification.type == 'App\\Notifications\\NewOrder'" class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300" @click="viewNotification(notification.id)">
                    <span class="font-semibold">You have a new order <strong>{{ notification['data']['order']['order_id'] }}</strong></span>
                </li>
                <li v-if="notification.type == 'App\\Notifications\\UpdatedOrder'" class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300">
                    <span class="font-semibold">Your order, <strong>{{ notification['data']['order']['order_id'] }}</strong>, was updated</span>
                </li>
                <li v-if="notification.type == 'App\\Notifications\\QuotationAdded'" class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300">
                    <span class="font-semibold">New Quotation added for the order <strong>{{ notification['data']['order_item']['order']['order_id'] }}</strong></span>
                </li>
                <li v-if="notification.type == 'App\\Notifications\\FinancingRequestUpdated'" class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300">
                    <span class="font-semibold">Financing Request Updated for the order <strong>{{ notification['data']['invoice']['invoice_id'] }}</strong></span>
                </li>
            </ul>
            <button class="bg-primary-one px-2 py-1 text-center text-white mt-2 rounded mx-2 mb-2 w-[94%]" @click="markAllAsRead()">Mark All as Read</button>
        </div>
    </div>
</template>
<script>
import { onMounted, ref, inject } from 'vue';
import { useToast } from "vue-toastification";
import axios from 'axios';
export default {
    name: 'Notifications',
    props: ['email'],
    setup(props) {
        const email = ref('')
        // Get toast interface
        const toast = useToast();
        const echo = inject('echo')
        const notifications = ref([])
        const notifications_count = ref(0)

        const show = ref(false)

        const getNotifications = async () => {
            let new_notifications = await axios.get('/notifications')
            notifications.value = new_notifications.data.notifications
            notifications_count.value = new_notifications.data.notifications_count
        }

        const viewNotification = async (notification) => {
            await axios.get('/notification/'+notification)
                .then(response => {
                    if (response.data.route != '') {
                        window.location.href = response.data.route
                    }
                })
                .catch(err => {
                    toast.error(err.response.data.message)
                })
                .finally(() => {
                    getNotifications()
                })
        }

        const markAllAsRead = async () => {
            await axios.get('/notifications/read/all')
                .then(() => {
                    getNotifications()
                })
                .catch(err => {
                    toast.error(err.response.data.message)
                })
        }

        onMounted(() => {
            email.value = props.email
            getNotifications()
            echo
                .channel(email.value)
                .listen('.new.notification', (e) => {
                    getNotifications()
                });
        })

        return {
            notifications,
            notifications_count,

            show,

            viewNotification,
            markAllAsRead,
        }
    }
}
</script>
<style>
    #notifications-dropdown {
        right: -10px;
        margin-top: 5px;
    }
</style>
