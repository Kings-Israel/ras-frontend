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
                            <x-text-input class="pl-10 h-9 border-none rounded w-[99%] focus:border-b-3 focus:ring-0 transition duration-150" placeholder="Search Anything..."></x-text-input>
                        </div>
                    </form>
                    <ul class="list-none px-2 space-y-2 overflow-scroll max-h-[20rem] min-h-[20rem] md:max-h-[37rem] 4xl:h-[55rem]">
                        <li v-for="conversation in conversations" v-bind:key="conversation.id" class="hover:cursor-pointer rounded-md transition duration-150" v-on:click="getConversation(conversation.id)">
                            <div v-if="conversation.id == active_conversation" class="flex px-2 rounded-lg py-1 bg-yellow-200 hover:bg-yellow-100">
                                <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full border-2 border-orange-600 w-10 h-10 object-cover" alt="">
                                <div class="px-2 flex flex-col w-[87%]">
                                    <div class="flex justify-between">
                                        <span class="text-lg font-extrabold text-gray-900 mb-1 truncate">
                                            @{{ conversation.last_message.sender.first_name }} @{{ conversation.last_message.sender.last_name }}
                                        </span>
                                        <span class="text-xs font-bold my-auto w-16 truncate text-end">@{{ conversation.last_message.from_now }}</span>
                                    </div>
                                    <span class="font-light text-sm truncate">@{{ conversation.last_message.body }}.</span>
                                </div>
                            </div>
                            <div v-else class="flex px-2 rounded-lg py-1 hover:bg-gray-200">
                                <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full border-2 border-orange-600 w-10 h-10 object-cover" alt="">
                                <div class="px-2 flex flex-col w-[87%]">
                                    <div class="flex justify-between">
                                        <span class="text-lg font-extrabold text-gray-900 mb-1 truncate">
                                            @{{ conversation.last_message.sender.first_name }} @{{ conversation.last_message.sender.last_name }}
                                        </span>
                                        <span class="text-xs font-bold my-auto w-16 truncate text-end">@{{ conversation.last_message.from_now }}</span>
                                    </div>
                                    <span class="font-light text-sm truncate">@{{ conversation.last_message.body }}.</span>
                                </div>
                            </div>
                        </li>
                        <li class="flex px-2 rounded-lg py-1">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-10 h-10 object-cover" alt="" srcset="">
                            <div class="px-2 flex flex-col w-[87%]">
                                <div class="flex justify-between">
                                    <span class="text-lg font-extrabold text-gray-900 mb-1">
                                        Xen Ping
                                    </span>
                                    <span class="text-xs font-bold my-auto">2:35a.m</span>
                                </div>
                                <span class="font-light text-sm truncate">We will have a short group discussion and get back to you</span>
                            </div>
                        </li>
                    </ul>
                </div>
                {{-- End Chat Sidebar --}}
                {{-- Chat Messages --}}
                <div class="lg:col-span-2 border-none hidden lg:block" id="messages-box" v-if="conversation_log.length > 0" ref="messagesBox">
                    <div class="border-b-2 border-t-0 border-gray-400 w-full px-4 py-2 flex justify-between">
                        <div class="flex gap-2 lg:block">
                            <i class="fas fa-arrow-left my-auto lg:hidden hover:cursor-pointer" v-on:click="viewContacts"></i>
                            <h2 class="text-2xl font-extrabold text-gray-800">Felix Onapi</h2>
                        </div>
                        <form action="#" method="POST" class="hidden md:block my-auto">
                            <div class="relative md:w-full sm:w-full">
                                <i class="fas fa-search absolute inset-y-0 left-1 flex items-center pl-1 pointer-events-none text-md"></i>
                                <x-text-input class="pl-10 h-7 border-none rounded focus:border-b-2 focus:ring-0" placeholder="Search Chat History..."></x-text-input>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-col">
                        <div class="space-y-2 p-2 text-sm">
                            <div class="overflow-scroll h-[33rem] 4xl:h-[50rem]" id="texts-box" ref="refChatLogPS">
                                <div v-for="log in conversation_log" v-bind:key="log.id">
                                    <div class="flex flex-col mb-2 pr-2" v-if="auth_id === log.messageable_id">
                                        <div class="flex flex-row-reverse">
                                            <div class="bg-gray-300 border-none p-2 max-w-sm rounded-lg">
                                                @{{ log.body }}
                                            </div>
                                        </div>
                                        <span class="text-xs text-right">@{{ log.created_at }}</span>
                                    </div>
                                    <div v-else class="mb-2">
                                        <div class="bg-yellow-200 border-none p-2 max-w-sm rounded-lg">
                                            @{{ log.body }}
                                        </div>
                                        <span class="text-xs">@{{ log.created_at }}</span>
                                    </div>
                                </div>
                                {{-- <div>
                                    <div class="bg-yellow-200 border-none p-2 max-w-sm rounded-lg">
                                        Hi Oloo. I need 200 bags of Dangote cement delivered to Kilifi. Can we have this delivered before 25th?
                                    </div>
                                    <span class="text-xs">9:50am</span>
                                </div> --}}
                            </div>
                        </div>
                        <div class="pb-2 lg:pb-0 lg:fixed lg:bottom-6 w-[94%] lg:w-[40%] 4xl:w-[42%]">
                            <form action="#" method="POST" class="mx-3 lg:my-2 w-full lg:w-[96%] flex gap-1">
                                <x-text-input class="w-[98%] md:w-full border-2 border-gray-400 rounded focus:border-b-3 focus:ring-0" placeholder="Type Your Message Here..." autofocus></x-text-input>
                                <i class="fas fa-paperclip text-gray-400 text-xl my-auto w-[5%]"></i>
                                <button type="submit" class="bg-orange-500 text-white rounded-full md:mx-auto my-auto w-[15%] md:w-12 h-10">
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
            const conversations = JSON.parse({!! json_encode($test) !!})
            const auth_id = 1
            var messages = new Vue({
                el: '#messages-container',
                data() {
                    return {
                        message: 'Test',
                        conversations: [],
                        active_conversation: '2',
                        conversation_log: [],
                        auth_id: ''
                    }
                },
                mounted() {
                    this.conversations = conversations
                    this.auth_id = auth_id
                },
                methods: {
                    async getConversation(id) {
                        const response = await axios.get('/vendor/messages/chat')
                        this.conversation_log = JSON.parse(response.data.conversations)
                        this.$nextTick(() => {
                            var container = this.$refs.refChatLogPS
                            container.scrollTop = container.scrollHeight;
                            if (window.innerWidth < 1536) {
                                this.$refs.messagesSidebar.classList.add('hidden')
                                this.$refs.messagesBox.classList.remove('hidden')
                            }
                        })
                    },
                    viewContacts() {
                        this.$refs.messagesSidebar.classList.remove('hidden')
                        this.$refs.messagesBox.classList.add('hidden')
                    }
                }
            })
        </script>
    @endpush
</x-app-layout>
