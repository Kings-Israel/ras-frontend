<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Messages" sub-title="All Customer Messages Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x md:h-[43rem] 4xl:h-[61rem]">
        <div class="md:col-span-3 lg:mx-3 sm:ml-3 mt-2 border-2 border-gray-300 rounded-lg">
            <div class="lg:grid lg:grid-cols-3 h-full" id="messages-container">
                {{-- Chat Sidebar --}}
                <div class="lg:col-span-1 pb-0 border-r-2 border-gray-300" id="messages-sidebar" ref="messagesSidebar">
                    <form action="#" method="POST" class="m-3">
                        <div class="relative md:w-full sm:w-full">
                            <i class="fas fa-search absolute inset-y-0 left-1 flex items-center pl-1 pointer-events-none text-2xl"></i>
                            <x-text-input class="pl-10 h-9 border-none rounded w-[99%] focus:border-b-3 focus:ring-0 transition duration-150" v-model="searchContacts" placeholder="Search Contacts..."></x-text-input>
                        </div>
                    </form>
                    <ul class="list-none px-2 space-y-2 overflow-scroll max-h-[20rem] min-h-[20rem] md:max-h-[37rem] 4xl:h-[55rem]">
                        <div v-if="conversations.length > 0">
                            <li v-for="conversation in conversations" v-bind:key="conversation.id" class="hover:cursor-pointer rounded-md transition duration-150" v-on:click="getConversation(conversation.id)">
                                <div v-for="participant in conversation.participants">
                                    <div v-if="participant.messageable.id != {{ auth()->id() }}">
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
                                                            @{{ participant.messageable.business.name }}
                                                        </span>
                                                    </div>
                                                    <div v-else>
                                                        <span class="text-lg font-bold text-gray-900 mb-1 truncate">
                                                            @{{ participant.messageable.first_name }} @{{ participant.messageable.last_name }}
                                                        </span>
                                                    </div>
                                                    <span class="text-xs font-bold my-auto w-16 truncate text-end">@{{ conversation.last_message.from_now }}</span>
                                                </div>
                                                <div v-if="(conversation.last_message && conversation.last_message.body) || (conversation.last_message && conversation.last_message.data && conversation.last_message.data.length > 0)">
                                                    <div class="flex justify-between truncate">
                                                        <span v-if="conversation.last_message.body && conversation.last_message.body !== 'files_only_message'" class="text-sm truncate">@{{ conversation.last_message.body }}.</span>
                                                        <span v-else class="text-sm truncate">File: @{{ conversation.last_message.data[conversation.last_message.data.length - 1].file_name }}</span>
                                                        <span v-if="conversation.last_message.sender.id != {{ auth()->id() }} && conversation.unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                            @{{ conversation.unread_count }}
                                                        </span>
                                                        <span v-if="conversation.last_message.sender.id != {{ auth()->id() }} && conversation.receiver_unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                            @{{ conversation.receiver_unread_count }}
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
                                                <div class="flex justify-between truncate">
                                                    <div v-if="participant.messageable.business">
                                                        <span class="text-lg font-bold text-gray-900 mb-1 truncate">
                                                            @{{ participant.messageable.business.name }}
                                                        </span>
                                                    </div>
                                                    <div v-else>
                                                        <span class="text-lg font-bold text-gray-900 mb-1 truncate">
                                                            @{{ participant.messageable.first_name }} @{{ participant.messageable.last_name }}
                                                        </span>
                                                    </div>
                                                    <span class="text-xs font-bold my-auto w-24 truncate text-end">@{{ conversation.last_message.from_now }}</span>
                                                </div>
                                                <div v-if="(conversation.last_message && conversation.last_message.body) || (conversation.last_message && conversation.last_message.data && conversation.last_message.data.length > 0)">
                                                    <div class="flex justify-between truncate">
                                                        <span v-if="conversation.last_message.body && conversation.last_message.body !== 'files_only_message'" class="text-sm truncate">@{{ conversation.last_message.body }}.</span>
                                                        <span v-else class="text-sm truncate">File: @{{ conversation.last_message.data[conversation.last_message.data.length - 1].file_name }}</span>
                                                        <span v-if="conversation.last_message.sender.id != {{ auth()->id() }} && conversation.unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                            @{{ conversation.unread_count }}
                                                        </span>
                                                        <span v-if="conversation.last_message.sender.id != {{ auth()->id() }} && conversation.receiver_unread_count > 0" class="px-2 py-0.5 rounded-xl text-sm bg-primary-one text-white" v-bind:ref="conversation.id">
                                                            @{{ conversation.receiver_unread_count }}
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
                {{-- End Chat Sidebar --}}
                {{-- Chat Messages --}}
                <div class="lg:col-span-2 border-none hidden lg:block" id="messages-box" v-if="receiver != null" ref="messagesBox">
                    <div class="border-b-2 border-t-0 border-gray-400 w-full px-4 py-2 flex justify-between">
                        <div class="flex gap-2 lg:block">
                            <i class="fas fa-arrow-left my-auto lg:hidden hover:cursor-pointer" v-on:click="viewContacts"></i>
                            <h2 v-if="receiver.business" class="text-2xl font-bold text-gray-800">@{{ receiver.business.name }}</h2>
                            <h2 v-else class="text-2xl font-bold text-gray-800">@{{ receiver.first_name }} @{{ receiver.last_name }}</h2>
                        </div>
                        {{-- <form action="#" method="POST" class="hidden md:block my-auto">
                            <div class="relative md:w-full sm:w-full">
                                <i class="fas fa-search absolute inset-y-0 left-1 flex items-center pl-1 pointer-events-none text-md"></i>
                                <x-text-input class="pl-10 h-7 border-none rounded focus:border-b-2 focus:ring-0" placeholder="Search Chat History..."></x-text-input>
                            </div>
                        </form> --}}
                    </div>
                    <div class="flex flex-col">
                        <div class="space-y-2 p-2 text-sm">
                            <div class="overflow-scroll h-[33rem] 4xl:h-[50rem]" id="texts-box" ref="refChatLogPS">
                                <div v-if="conversation_log.length > 0">
                                    <div v-for="log in conversation_log" v-bind:key="log.id">
                                        <div class="flex flex-col mb-2 pr-2" v-if="auth_id === log.sender.id">
                                            <div class="flex flex-row-reverse">
                                                <div class="bg-gray-300 border-none p-2 max-w-lg rounded-lg">
                                                    <div v-if="log.data.length > 0">
                                                        <div v-for="(data, index) in log.data" v-bind:key="index" class="p-2 bg-gray-200 rounded-lg my-1">
                                                            <p @click.prevent="downloadFile(data)" class="text-gray-600 hover:cursor-pointer flex gap-2">@{{ data.file_name }}</p> <p class="text-gray-400">@{{ formatBytes(data.file_size) }}</p>
                                                        </div>
                                                    </div>
                                                    <p v-if="log.body != 'files_only_message'">@{{ log.body }}</p>
                                                </div>
                                            </div>
                                            <span class="text-xs text-right">@{{ log.created_at }}</span>
                                        </div>
                                        <div v-else class="mb-2">
                                            <div class="bg-yellow-200 w-fit max-w-sm border-none p-2 rounded-lg">
                                                <div v-if="log.data.length > 0">
                                                    <div v-for="(data, index) in log.data" v-bind:key="index" class="p-2 bg-gray-200 max-w-sm rounded-lg my-1">
                                                        <p @click.prevent="downloadFile(data)" class="text-gray-600 hover:cursor-pointer flex gap-2">@{{ data.file_name }}</p> <p class="text-gray-400">@{{ formatBytes(data.file_size) }}</p>
                                                    </div>
                                                </div>
                                                <p v-if="log.body != 'files_only_message'">@{{ log.body }}</p>
                                            </div>
                                            <span class="text-xs">@{{ log.created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 relative">
                            <div v-if="files.length > 0" class="absolute bottom-16 right-6 border-2 border-gray-500 bg-gray-300 z-20 rounded-lg transition duration-300 ease-in-out">
                                <ul class="list-none flex flex-col px-2 space-y-1">
                                    <li v-for="file in files">@{{ file.name }}</li>
                                </ul>
                            </div>
                            <form action="#" method="POST" class="mx-3 lg:my-2 w-full lg:w-[96%] flex gap-1" id="send-message-form" enctype="multipart/form-data" ref="sendMessageForm">
                                @csrf
                                <x-text-input class="w-[98%] md:w-full border-2 border-gray-400 rounded focus:border-b-3 focus:ring-0" id="send-message-input" autocomplete="off" placeholder="Type Your Message Here..." ref="refMessageTextInput"></x-text-input>
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
                    <img src="{{ asset('assets/img/talking.png') }}" alt="" class="ml-40">
                </div>
                {{-- End Chat Messages --}}
            </div>
        </div>
        <x-right-side-bar />
    </div>
    @push('scripts')
        <script type="text/javascript">
            const conversations = {!! json_encode($conversations) !!}
            const conversation = {!! json_encode($conversation) !!}
            const base_url = {!! json_encode(config('app.url')) !!}
            const auth_id = {!! auth()->id() !!}
            let email = {!! json_encode(auth()->user()->email) !!}
            var messages = new Vue({
                el: '#messages-container',
                data() {
                    return {
                        conversations: [],
                        const_conversations: [],
                        active_conversation: '',
                        conversation_log: [],
                        auth_id: '',
                        receiver: null,
                        files: [],
                        searchContacts: ''
                    }
                },
                watch: {
                    searchContacts(newQuery, oldQuery) {
                        let new_conversations = []
                        if (this.conversations.length > 0 && newQuery.length > 0) {
                            new_conversations = this.conversations.filter(conversation => {
                                return conversation.participants.find(participant => {
                                    if (participant.messageable.business) {
                                        return participant.messageable.first_name.toLowerCase().includes(newQuery.toLowerCase()) || participant.messageable.last_name.toLowerCase().includes(newQuery.toLowerCase()) || participant.messageable.business.name.toLowerCase().includes(newQuery.toLowerCase())
                                    } else {
                                        return participant.messageable.first_name.toLowerCase().includes(newQuery.toLowerCase()) || participant.messageable.last_name.toLowerCase().includes(newQuery.toLowerCase())
                                    }
                                })
                            })
                        } else if (newQuery.length == 0) {
                            new_conversations = this.const_conversations
                        }
                        this.conversations = new_conversations
                    }
                },
                mounted() {
                    this.conversations = conversations
                    this.const_conversations = conversations
                    this.auth_id = auth_id
                    if (conversation.user) {
                        this.active_conversation = conversation.conversation_id
                        this.receiver = conversation.user
                        this.conversation_log = conversation.messages
                        this.$nextTick(() => {
                            var container = this.$refs.refChatLogPS
                            container.scrollTop = container.scrollHeight;
                            if (window.innerWidth < 1536) {
                                this.$refs.messagesSidebar.classList.add('hidden')
                                this.$refs.messagesBox.classList.remove('hidden')
                            }
                            this.$refs.refMessageTextInput.focus()
                            if (this.$refs[this.active_conversation]) {
                                this.$refs[this.active_conversation][0].classList.add('hidden');
                            }
                        })
                    }
                    window.addEventListener('load', () => {
                        Echo
                            .channel(email)
                            .listen('.new.message', (e) => {
                                if (e.message.conversation_id === this.active_conversation) {
                                    this.conversation_log.push(e.message)
                                    this.$nextTick(() => {
                                        var container = this.$refs.refChatLogPS
                                        container.scrollTop = container.scrollHeight;
                                    })
                                } else {
                                    // Check if conversation exists
                                    let index = this.conversations.findIndex(conversation => conversation.id === e.conversation.id)
                                    if (index >= 0) {
                                        this.conversations.forEach((conversation, key) => {
                                            if (conversation.id === e.conversation.id) {
                                                this.conversations.splice(key, 1)
                                                this.conversations.unshift(e.conversation)
                                            }
                                        })
                                    } else {
                                        // If Conversation does not exist, create new and add to list of conversations
                                        this.conversations.unshift(e.conversation)
                                    }
                                }
                            });
                    })
                },
                methods: {
                    async getConversation(id) {
                        this.active_conversation = id
                        const response = await axios.get(base_url+'/messages/chat/'+id)
                        this.conversation_log = response.data.conversations.messages
                        this.receiver = response.data.conversations.user
                        this.$nextTick(() => {
                            var container = this.$refs.refChatLogPS
                            container.scrollTop = container.scrollHeight;
                            if (window.innerWidth < 1536) {
                                this.$refs.messagesSidebar.classList.add('hidden')
                                this.$refs.messagesBox.classList.remove('hidden')
                            }
                            this.$refs.refMessageTextInput.focus()
                            if (this.$refs[id]) {
                                this.$refs[id][0].classList.add('hidden');
                            }
                        })
                    },
                    viewContacts() {
                        this.$refs.messagesSidebar.classList.remove('hidden')
                        this.$refs.messagesBox.classList.add('hidden')
                        if (this.$refs[this.active_conversation]) {
                            this.$refs[this.active_conversation][0].classList.add('hidden');
                        }
                        this.active_conversation = ''
                    },
                    async sendMessage() {
                        const formData = new FormData()
                        formData.append('receiver_id', this.receiver.id)
                        formData.append('message', this.$refs.refMessageTextInput.value)
                        // Read selected files
                        Array.from(this.files).forEach((file, index) => {
                            formData.append('files['+index+']', file)
                        })
                        const response = await axios.post(base_url+'/messages/send', formData);
                        this.conversation_log.push(response.data.data)
                        this.$refs.refMessageTextInput.value = ''
                        this.files = []
                        this.$nextTick(() => {
                            var container = this.$refs.refChatLogPS
                            container.scrollTop = container.scrollHeight;
                            if (window.innerWidth < 1536) {
                                this.$refs.messagesSidebar.classList.add('hidden')
                                this.$refs.messagesBox.classList.remove('hidden')
                            }
                        })
                    },
                    uploadFile() {
                        this.$refs.docsInput.click()
                    },
                    uploadFiles(e) {
                        this.files = e.target.files
                    },
                    downloadFile(file) {
                        axios.get(file.file_url, { responseType: 'blob' })
                            .then(response => {
                                const blob = new Blob([response.data], { type: file.file_type });
                                const link = document.createElement('a')
                                link.href = URL.createObjectURL(blob)
                                link.download = file.file_name
                                link.click()
                                URL.revokeObjectURL(link.href)
                            }).catch(console.error)
                    },
                    formatBytes(bytes, decimals = 2) {
                        if (!+bytes) return '0 Bytes'

                        const k = 1024
                        const dm = decimals < 0 ? 0 : decimals
                        const sizes = ['Bytes', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB']

                        const i = Math.floor(Math.log(bytes) / Math.log(k))

                        return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
                    }
                }
            })
        </script>
    @endpush
</x-app-layout>
