<template>
    <!-- <div class="lg:mx-60 lg:my-10 mt-2 border-2 border-gray-300 rounded-lg bg-white">
    </div> -->
    <div class="lg:grid lg:grid-cols-3 h-full" id="messages-container">
        <!-- Chat Sidebar -->
        <div class="lg:col-span-1 pb-0 border-r-2 border-gray-300" id="messages-sidebar" ref="messagesSidebar">
            <form action="#" method="POST" class="m-3">
                <div class="relative md:w-full sm:w-full">
                    <i class="fas fa-search absolute inset-y-0 left-1 flex items-center pl-1 pointer-events-none text-2xl"></i>
                    <input class="pl-10 h-9 border-2 border-gray-300 rounded-lg w-[99%] focus:border-3 focus:border-primary-one focus:ring-0 transition duration-150" v-model="searchContacts" placeholder="Search Contacts..." />
                </div>
            </form>
            <ul class="list-none px-2 space-y-2 overflow-scroll max-h-[20rem] min-h-[20rem] md:min-h-[32rem] md:max-h-[37rem] 4xl:h-[55rem]">
                <div v-if="conversations.length > 0">
                    <li v-for="conversation in conversations" v-bind:key="conversation.id" class="hover:cursor-pointer rounded-md transition duration-150" v-on:click="getConversation(conversation.id)">
                        <div v-for="participant in conversation.participants" :key="participant.id">
                            <div v-if="participant.messageable.id != auth_id">
                                <div v-if="conversation.id == active_conversation" class="flex px-2 rounded-lg py-1 bg-yellow-200 hover:bg-yellow-100">
                                    <div v-if="participant.messageable.business">
                                        <img v-bind:src="participant.messageable.business.primary_cover_image" class="rounded-full border-2 border-orange-600 w-10 h-10 object-cover" alt="">
                                    </div>
                                    <div v-else>
                                        <img v-bind:src="participant.messageable.avatar" class="rounded-full border-2 border-orange-600 w-10 h-10 object-cover" alt="">
                                    </div>
                                    <div class="px-2 flex flex-col w-[87%]">
                                        <div class="flex justify-between">
                                            <div v-if="participant.messageable.business">
                                                <span class="text-lg font-bold text-gray-900 mb-1 truncate">
                                                    {{ participant.messageable.business.name }}
                                                </span>
                                            </div>
                                            <div v-else>
                                                <span class="text-lg font-bold text-gray-900 mb-1 truncate">
                                                    {{ participant.messageable.first_name }} {{ participant.messageable.last_name }}
                                                </span>
                                            </div>
                                            <span v-if="conversation.last_message && conversation.last_message.created_at" class="text-xs font-bold my-auto w-16 truncate text-end">{{ moment(conversation.last_message.created_at).fromNow() }}</span>
                                        </div>
                                        <div v-if="(conversation.last_message && conversation.last_message.body) || (conversation.last_message && conversation.last_message.data && conversation.last_message.data.length > 0)">
                                            <div class="flex justify-between truncate">
                                                <span v-if="conversation.last_message.body && conversation.last_message.body !== 'files_only_message'" class="text-sm truncate">{{ conversation.last_message.body }}.</span>
                                                <span v-else class="text-sm truncate">File: {{ conversation.last_message.data[conversation.last_message.data.length - 1].file_name }}</span>
                                                <span v-if="conversation.last_message.sender.id != auth_id && conversation.unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                    {{ conversation.unread_count }}
                                                </span>
                                                <span v-if="conversation.last_message.sender.id != auth_id && conversation.receiver_unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                    {{ conversation.receiver_unread_count }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-else class="flex px-2 rounded-lg py-1 hover:bg-gray-200">
                                    <div v-if="participant.messageable.business">
                                        <img v-bind:src="participant.messageable.business.primary_cover_image" class="rounded-full w-10 h-10 object-cover" alt="">
                                    </div>
                                    <div v-else>
                                        <img v-bind:src="participant.messageable.avatar" class="rounded-full w-10 h-10 object-cover" alt="">
                                    </div>
                                    <div class="px-2 flex flex-col w-[87%]">
                                        <div class="flex justify-between">
                                            <div v-if="participant.messageable.business">
                                                <span class="text-lg font-bold text-gray-900 mb-1 truncate">
                                                    {{ participant.messageable.business.name }}
                                                </span>
                                            </div>
                                            <div v-else>
                                                <span class="text-lg font-bold text-gray-900 mb-1 truncate">
                                                    {{ participant.messageable.first_name }} {{ participant.messageable.last_name }}
                                                </span>
                                            </div>
                                            <span v-if="conversation.last_message && conversation.last_message.created_at" class="text-xs font-bold my-auto w-16 truncate text-end">{{ moment(conversation.last_message.created_at).fromNow() }}</span>
                                        </div>
                                        <div v-if="(conversation.last_message && conversation.last_message.body) || (conversation.last_message && conversation.last_message.data && conversation.last_message.data.length > 0)">
                                            <div class="flex justify-between truncate">
                                                <span v-if="conversation.last_message.body && conversation.last_message.body !== 'files_only_message'" class="text-sm truncate">{{ conversation.last_message.body }}.</span>
                                                <span v-else class="text-sm truncate">File: {{ conversation.last_message.data[conversation.last_message.data.length - 1].file_name }}</span>
                                                <span v-if="conversation.last_message.sender.id != auth_id && conversation.unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                    {{ conversation.unread_count }}
                                                </span>
                                                <span v-if="conversation.last_message.sender.id != auth_id && conversation.receiver_unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                    {{ conversation.receiver_unread_count }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
        <!-- End Chat Sidebar -->
        <!-- Chat Messages -->
        <div class="lg:col-span-2 border-none hidden lg:block" id="messages-box" v-if="receiver != null" ref="messagesBox">
            <div class="border-b-2 border-t-0 border-gray-400 w-full px-4 py-2 flex justify-between">
                <div class="flex gap-2 lg:block">
                    <i class="fas fa-arrow-left my-auto lg:hidden hover:cursor-pointer" v-on:click="viewContacts"></i>
                    <h2 v-if="receiver.business" class="text-2xl font-bold text-gray-800">{{ receiver.business.name }}</h2>
                    <h2 v-else class="text-2xl font-bold text-gray-800">{{ receiver.first_name }} {{ receiver.last_name }}</h2>
                </div>
                <!-- <form action="#" method="POST" class="hidden md:block my-auto">
                    <div class="relative md:w-full sm:w-full">
                        <i class="fas fa-search absolute inset-y-0 left-1 flex items-center pl-1 pointer-events-none text-md"></i>
                        <x-text-input class="pl-10 h-7 border-none rounded focus:border-b-2 focus:ring-0" placeholder="Search Chat History..."></x-text-input>
                    </div>
                </form> -->
            </div>
            <div class="flex flex-col">
                <div class="space-y-2 p-2 text-sm">
                    <div class="overflow-scroll h-[33rem] 4xl:h-[50rem]" id="texts-box" ref="refChatLogPS">
                        <div v-if="conversation_log.length > 0">
                            <div v-for="log in conversation_log" v-bind:key="log.id">
                                <div class="flex flex-col mb-2 pr-2" v-if="auth_id === log.sender.id">
                                    <div class="flex flex-row-reverse">
                                        <div class="bg-gray-300 border-none p-2 max-w-sm rounded-lg">
                                            <div v-if="log.data && log.data.length > 0">
                                                <div v-for="(data, index) in log.data" v-bind:key="index" class="p-2 bg-gray-200 rounded-lg my-1">
                                                    <p @click.prevent="downloadFile(data)" class="text-gray-600 font-semibold hover:cursor-pointer flex gap-2">{{ data.file_name }}</p> <p class="text-gray-400">{{ formatBytes(data.file_size) }}</p>
                                                </div>
                                            </div>
                                            <p v-if="log.body != 'files_only_message'">{{ log.body }}</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-right">{{ log.created_at }}</span>
                                </div>
                                <div v-else class="mb-2">
                                    <div class="bg-yellow-200 w-fit max-w-sm border-none p-2 rounded-lg">
                                        <div v-if="log.data && log.data.length > 0">
                                            <div v-for="(data, index) in log.data" v-bind:key="index" class="p-2 bg-gray-200 max-w-sm rounded-lg my-1">
                                                <p @click.prevent="downloadFile(data)" class="text-gray-600 font-semibold hover:cursor-pointer flex gap-2">{{ data.file_name }}</p> <p class="text-gray-400">{{ formatBytes(data.file_size) }}</p>
                                            </div>
                                        </div>
                                        <p v-if="log.body != 'files_only_message'">{{ log.body }}</p>
                                    </div>
                                    <span class="text-xs">{{ log.created_at }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-2 relative" v-show="receiver != null">
                    <div v-if="files.length > 0" class="absolute bottom-16 right-6 border-2 border-gray-500 bg-gray-300 z-20 rounded-lg transition duration-300 ease-in-out">
                        <ul class="list-none flex flex-col px-2 space-y-1">
                            <li v-for="file in files" :key="file">{{ file.name }}</li>
                        </ul>
                    </div>
                    <form action="#" method="POST" class="mx-3 lg:my-2 w-full lg:w-[96%] flex gap-1" id="send-message-form" enctype="multipart/form-data" ref="sendMessageForm">
                        <input class="w-[98%] md:w-full border-2 border-gray-400 rounded-lg focus:border-3 focus:border-primary-one focus:ring-0" id="send-message-input" autocomplete="off" placeholder="Type Your Message Here..." ref="refMessageTextInput" v-model="refMessageText" />
                        <i class="fas fa-paperclip text-gray-400 text-xl my-auto w-[5%] hover:cursor-pointer" id="upload-files" ref="uploadFilesBtn" @click.prevent="uploadFile"></i>
                        <input type="file" class="hidden" v-on:change="uploadFiles" multiple name="docs[]" id="docs-input" ref="docsInput">
                        <button class="bg-primary-one text-white rounded-full md:mx-auto my-auto w-[15%] md:w-12 h-10 hover:bg-orange-600" id="send-message-btn" ref="refMessageSubmit" @click.prevent="sendMessage">
                            <svg class="mx-auto pl-1" xmlns="http://www.w3.org/2000/svg" width="25.5" height="20" viewBox="0 0 31.5 27">
                                <path id="send_icon" d="M3.015,31.5,34.5,18,3.015,4.5,3,15l22.5,3L3,21Z" transform="translate(-3 -4.5)" fill="#fff"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div v-else class="hidden lg:block w-full my-auto mx-auto">
            <img src="../../../rsa/public/assets/img/talking.png" alt="" class="ml-40">
        </div>
        <!-- End Chat Messages -->
    </div>
</template>

<script>
import { onMounted, ref, watch, nextTick, inject } from 'vue';
import moment from 'moment';
import axios from 'axios';
export default {
    name: "ChatComponent",
    props: ['email', 'user'],
    setup(props) {
        const conversations = ref([])
        const const_conversations = ref([])
        const active_conversation = ref('')
        const conversation_log = ref([])
        const auth_id = ref('')
        const receiver = ref(null)
        const files = ref([])
        const searchContacts = ref('')
        const refChatLogPS = ref('')
        const messagesSidebar = ref('')
        const refMessageTextInput = ref('')
        const refMessageText = ref('')
        const messagesBox = ref('')
        const docsInput = ref('')
        const email = ref('')
        const conversation_ids = ref([])

        const echo = inject('echo')

        watch(searchContacts, (newQuery, oldQuery) => {
            let new_conversations = []
            if (conversations.value.length > 0 && newQuery.length > 0) {
                new_conversations = conversations.value.filter(conversation => {
                    return conversation.participants.find(participant => {
                        if (participant.messageable.business) {
                            return participant.messageable.first_name.toLowerCase().includes(newQuery.toLowerCase()) || participant.messageable.last_name.toLowerCase().includes(newQuery.toLowerCase()) || participant.messageable.business.name.toLowerCase().includes(newQuery.toLowerCase())
                        } else {
                            return participant.messageable.first_name.toLowerCase().includes(newQuery.toLowerCase()) || participant.messageable.last_name.toLowerCase().includes(newQuery.toLowerCase())
                        }
                    })
                })
            } else if (newQuery.length == 0) {
                new_conversations = const_conversations.value
            }
            conversations.value = new_conversations
        })

        const getConversations = async (user_id) => {
            let new_conversations
            if (user_id != null) {
                new_conversations = await axios.get('/rsa/conversations/'+user_id)
            } else {
                new_conversations = await axios.get('/rsa/conversations')
            }
            conversations.value = new_conversations.data.conversations
            const_conversations.value = new_conversations.data.conversations
            const_conversations.value.forEach(conversation => {
                conversation_ids.value.push(conversation.id)
            })
            auth_id.value = new_conversations.data.auth_id
            if (new_conversations.data.conversation && new_conversations.data.conversation.user) {
                active_conversation.value = new_conversations.data.conversation.conversation_id
                receiver.value = new_conversations.data.conversation.user
                conversation_log.value = new_conversations.data.conversation.messages
                nextTick(() => {
                    var container = refChatLogPS.value
                    container.scrollTop = container.scrollHeight;
                    if (window.innerWidth < 1536) {
                        messagesSidebar.value.classList.add('hidden')
                        messagesBox.value.classList.remove('hidden')
                    }
                    refMessageTextInput.value.focus()
                    if (conversation_ids.value[active_conversation.value]) {
                        conversation_ids.value[active_conversation.value].classList.add('hidden');
                    }
                })
            }
        }

        onMounted(() => {
            email.value = props.email
            getConversations(props.user)
            echo
                .channel(email.value)
                .listen('.new.message', (e) => {
                    if (active_conversation.value && (e.message.conversation_id === active_conversation.value)) {
                        conversation_log.value.push(e.message)
                        nextTick(() => {
                            var container = refChatLogPS.value
                            container.scrollTop = container.scrollHeight;
                        })
                    } else {
                        // Check if conversation exists
                        let index = conversations.value.findIndex(conversation => conversation.id === e.conversation.id)
                        if (index >= 0) {
                            conversations.value.forEach((conversation, key) => {
                                if (conversation.id === e.conversation.id) {
                                    conversations.value.splice(key, 1)
                                    conversations.value.unshift(e.conversation)
                                }
                            })
                        } else {
                            // If Conversation does not exist, create new and add to list of conversations
                            conversations.value.unshift(e.conversation)
                        }
                    }
                });
        })

        const getConversation = async (id) => {
            active_conversation.value = id
            const response = await axios.get('/rsa/messages/chat/'+id)
            conversation_log.value = response.data.conversations.messages
            receiver.value = response.data.conversations.user
            nextTick(() => {
                var container = refChatLogPS.value
                container.scrollTop = container.scrollHeight;
                if (window.innerWidth < 1536) {
                    messagesSidebar.value.classList.add('hidden')
                    messagesBox.value.classList.remove('hidden')
                }
                refMessageTextInput.value.focus()
                if (conversation_ids.value[id]) {
                    conversation_ids.value[id].classList.add('hidden');
                }
            })
        }

        const viewContacts = () => {
            messagesSidebar.value.classList.remove('hidden')
            messagesBox.value.classList.add('hidden')
            if (conversation_ids[active_conversation.value]) {
                conversation_ids[active_conversation.value].classList.add('hidden');
            }
            active_conversation.value = ''
        }

        const sendMessage = async () => {
            const formData = new FormData()
            formData.append('receiver_id', receiver.value.id)
            formData.append('message', refMessageText.value)
            // Read selected files
            Array.from(files.value).forEach((file, index) => {
                formData.append('files['+index+']', file)
            })
            const response = await axios.post('/messages/send', formData)
            conversation_log.value.push(response.data.data)
            refMessageText.value = ''
            files.value = []
            nextTick(() => {
                var container = refChatLogPS.value
                container.scrollTop = container.scrollHeight;
                if (window.innerWidth < 1536) {
                    messagesSidebar.value.classList.add('hidden')
                    messagesBox.value.classList.remove('hidden')
                }
            })
        }

        const uploadFile = () => {
            docsInput.value.click()
        }

        const uploadFiles = (e) => {
            files.value = e.target.files
        }
        const downloadFile = (file) => {
            axios.get(file.file_url, { responseType: 'blob' })
                .then(response => {
                    const blob = new Blob([response.data], { type: file.file_type });
                    const link = document.createElement('a')
                    link.href = URL.createObjectURL(blob)
                    link.download = file.file_name
                    link.click()
                    URL.revokeObjectURL(link.href)
                }).catch(console.error)
        }
        const formatBytes = (bytes, decimals = 2) => {
            if (!+bytes) return '0 Bytes'

            const k = 1024
            const dm = decimals < 0 ? 0 : decimals
            const sizes = ['Bytes', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB']

            const i = Math.floor(Math.log(bytes) / Math.log(k))

            return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
        }

        return {
            refChatLogPS,
            messagesSidebar,
            messagesBox,
            refMessageTextInput,
            refMessageText,
            docsInput,

            conversations,
            const_conversations,
            active_conversation,
            conversation_log,
            auth_id,
            receiver,
            files,
            searchContacts,

            getConversation,
            viewContacts,
            sendMessage,
            uploadFile,
            uploadFiles,
            downloadFile,
            formatBytes,

            moment,
        }
    }
}
</script>
