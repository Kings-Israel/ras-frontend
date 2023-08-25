<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Messages" sub-title="All Customer Messages Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x mt-2 h-[98%]">
        <div class="md:col-span-3 lg:mx-3 border-2 border-gray-300 rounded-lg">
            <div class="grid grid-cols-3 h-full">
                <div class="col-span-1 pb-0 border-r-2 border-gray-300">
                    <form action="#" method="POST" class="m-3">
                        <div class="relative md:w-full sm:w-full">
                            <i class="fas fa-search absolute inset-y-0 left-1 flex items-center pl-1 pointer-events-none text-2xl"></i>
                            <x-text-input class="pl-10 h-9 border-none rounded w-[99%] focus:border-b-3 focus:ring-0 transition duration-150" placeholder="Search Anything..."></x-text-input>
                        </div>
                    </form>
                    <ul class="list-disc">
                        <li class="flex px-2 bg-yellow-200 mx-3 rounded-lg py-2">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full border-2 border-orange-600 w-12 h-12 object-cover" alt="" srcset="">
                            <div class="px-2 flex flex-col w-[87%]">
                                <div class="flex justify-between">
                                    <span class="text-lg font-extrabold text-gray-900 mb-1">
                                        Felix Onapi
                                    </span>
                                    <span class="text-xs font-bold my-auto">7:15p.m</span>
                                </div>
                                <span class="font-light text-sm truncate">I need 20 bags of Dangote Cement. I am currently in Nairobi.</span>
                            </div>
                        </li>
                        <li class="flex px-2 mx-3 rounded-lg py-2">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-14 h-14 object-cover" alt="" srcset="">
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
                        <li class="flex px-2 mx-3 rounded-lg py-2">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-14 h-14 object-cover" alt="" srcset="">
                            <div class="px-2 flex flex-col w-[87%]">
                                <div class="flex justify-between">
                                    <span class="text-lg font-extrabold text-gray-900 mb-1">
                                        Wence Connor
                                    </span>
                                    <span class="text-xs font-bold my-auto">4:45a.m</span>
                                </div>
                                <span class="font-light text-sm truncate">Hi. Did you get my email. Please reach out ASAP</span>
                            </div>
                        </li>
                        <li class="flex px-2 mx-3 rounded-lg py-2">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-14 h-14 object-cover" alt="" srcset="">
                            <div class="px-2 flex flex-col w-[87%]">
                                <div class="flex justify-between">
                                    <span class="text-lg font-extrabold text-gray-900 mb-1">
                                        Martha Munene
                                    </span>
                                    <span class="text-xs font-bold my-auto">5:23p.m</span>
                                </div>
                                <span class="font-light text-sm truncate">Good Morning. Is it possible to change warehouse?</span>
                            </div>
                        </li>
                        <li class="flex px-2 mx-3 rounded-lg py-2">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-14 h-14 object-cover" alt="" srcset="">
                            <div class="px-2 flex flex-col w-[87%]">
                                <div class="flex justify-between">
                                    <span class="text-lg font-extrabold text-gray-900 mb-1">
                                        ALice Liu
                                    </span>
                                    <span class="text-xs font-bold my-auto">2:23a.m</span>
                                </div>
                                <span class="font-light text-sm truncate">We are yet to receive the shipment. Is the trakcing number correct?</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 border-none">
                    <div class="border-b-2 border-t-0 border-gray-400 w-full px-4 py-2 flex justify-between">
                        <h2 class="text-2xl font-extrabold text-gray-800">Felix Onapi</h2>
                        <form action="#" method="POST" class="my-auto">
                            <div class="relative md:w-full sm:w-full">
                                <i class="fas fa-search absolute inset-y-0 left-1 flex items-center pl-1 pointer-events-none text-md"></i>
                                <x-text-input class="pl-10 h-7 border-none rounded focus:border-b-2 focus:ring-0 transition duration-150" placeholder="Search Chat History..."></x-text-input>
                            </div>
                        </form>
                    </div>
                    <div class="h-full flex flex-col justify-between">
                        <ul class="list-none space-y-3 p-2">
                            <li class="bg-yellow-200 border-none p-2 max-w-sm rounded-lg">
                                <span class="">
                                    Hi Oloo. I need 200 bags of Dangote cement delivered to Kilifi. Can we have this delivered before 25th?
                                </span>
                            </li>
                            <li class="bg-gray-300 border-none p-2 max-w-sm rounded-lg float-right">
                                Hi Oloo. I need 200 bags of Dangote cement delivered to Kilifi. Can we have this delivered before 25th?
                            </li>
                        </ul>
                        <div class="">
                            <form action="#" method="POST" class="mx-3 my-16 flex">
                                <div class="md:w-full sm:w-full">
                                    <x-text-input class="border-2 border-gray-400 rounded w-[98%] focus:border-b-3 focus:ring-0 transition duration-150" placeholder="Type Your Message Here..."></x-text-input>
                                </div>
                                <i class="fas fa-paperclip text-gray-400 text-xl my-auto mr-2"></i>
                                <button type="submit" class="text-xl bg-orange-500 text-white rounded-full mx-auto my-auto w-12 h-10">
                                    <i class="fas fa-paper-plane mx-auto"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-right-side-bar />
    </div>
    @push('scripts')

    @endpush
</x-app-layout>
