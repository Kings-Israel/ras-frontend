<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="default-sidebar" class="fixed top-2 left-3 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-[98%] px-4 py-2 grid grid-cols-1 divide-gray-400 divide-y-2 overflow-y-auto rounded-xl bg-gray-200 dark:bg-gray-800">
        <div>
            <div class="flex pt-4 md:pb-5">
                <img src="{{ auth()->user()->avatar }}" class="rounded-full w-12 h-12 object-cover" alt="avatar">
                <div class="pl-2">
                    <h3>Hello, {{ auth()->user()->last_name }}</h3>
                    <h4 class="font-bold text-lg">{{ auth()->user()->business->name }}</h4>
                </div>
            </div>
            <div>
                <h5 class="">Earnings</h5>
                <h3 class="font-bold text-lg">Ksh.3,794,883</h3>
            </div>
        </div>
        <ul class="md:pt-5 font-medium">
            <li>
                <x-nav-item :href="route('vendor.dashboard')" :active="request()->routeIs('vendor.dashboard')">
                    {{-- @if (request()->routeIs('vendor.dashboard'))
                        <svg class="w-5 h-5 text-orange-500 transition duration-75 dark:text-orange-500 group-hover:text-orange-500 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                    @else
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                    @endif --}}
                    @if (request()->routeIs('vendor.dashboard'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="26" viewBox="0 0 26 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_9);
                                }

                                .dashboard {
                                    fill: #ee5d31;
                                    stroke: #ee5d31;
                                }
                            </style>
                            <clipPath id="clip-_1_9">
                                <rect width="26" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_9" data-name="1 – 9" class="cls-1">
                            <path id="Icon_awesome-buromobelexperte" data-name="Icon awesome-buromobelexperte" class="dashboard" d="M0,2.25V7.775H5.526V2.25ZM5.18,7.43H.345V2.6H5.18ZM6.907,2.25V7.775h5.526V2.25Zm5.18,5.18H7.252V2.6h4.835Zm1.727-5.18V7.775h5.526V2.25Zm5.18,5.18H14.159V2.6h4.835ZM0,9.157v5.525H5.526V9.157Zm5.18,5.18H.345V9.5H5.18Zm1.727-5.18v5.525h5.526V9.157Zm5.18,5.18H7.252V9.5h4.835Zm1.727-5.18v5.525h5.526V9.157Zm5.18,5.18H14.159V9.5h4.835ZM0,16.064v5.525H5.526V16.064Zm5.18,5.18H.345V16.409H5.18Zm1.727-5.18v5.525h5.526V16.064Zm5.18,5.18H7.252V16.409h4.835Zm1.727-5.18v5.525h5.526V16.064Z" transform="translate(3.33 1.081)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="26" viewBox="0 0 26 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_9);
                                }

                                .dashboard {
                                    fill: #4f4f4f;
                                    stroke: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_9">
                                <rect width="26" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_9" data-name="1 – 9" class="cls-1">
                            <path id="Icon_awesome-buromobelexperte" data-name="Icon awesome-buromobelexperte" class="dashboard" d="M0,2.25V7.775H5.526V2.25ZM5.18,7.43H.345V2.6H5.18ZM6.907,2.25V7.775h5.526V2.25Zm5.18,5.18H7.252V2.6h4.835Zm1.727-5.18V7.775h5.526V2.25Zm5.18,5.18H14.159V2.6h4.835ZM0,9.157v5.525H5.526V9.157Zm5.18,5.18H.345V9.5H5.18Zm1.727-5.18v5.525h5.526V9.157Zm5.18,5.18H7.252V9.5h4.835Zm1.727-5.18v5.525h5.526V9.157Zm5.18,5.18H14.159V9.5h4.835ZM0,16.064v5.525H5.526V16.064Zm5.18,5.18H.345V16.409H5.18Zm1.727-5.18v5.525h5.526V16.064Zm5.18,5.18H7.252V16.409h4.835Zm1.727-5.18v5.525h5.526V16.064Z" transform="translate(3.33 1.081)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Dashboard</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.products')" :active="request()->routeIs('vendor.products') || request()->routeIs('vendor.products.*')">
                    {{-- <i class="w-5 h-5 fas fa-layer-group"></i> --}}
                    @if (request()->routeIs('vendor.products') || request()->routeIs('vendor.products.*'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_1);
                                }

                                .products {
                                fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_1">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_1" data-name="1 – 1" class="cls-1">
                            <path id="Icon_awesome-buffer" data-name="Icon awesome-buffer" class="products" d="M20.4,16.485l-9.185,3.994a.986.986,0,0,1-.686,0L1.346,16.485c-.187-.082-.187-.216,0-.3l2.2-.955a.988.988,0,0,1,.687,0l6.3,2.735a.981.981,0,0,0,.686,0l6.3-2.735a.987.987,0,0,1,.686,0l2.2.957C20.591,16.27,20.591,16.4,20.4,16.485Zm0-5.574-2.2-.957a.987.987,0,0,0-.686,0l-6.3,2.739a.99.99,0,0,1-.686,0l-6.3-2.739a.988.988,0,0,0-.687,0l-2.2.957c-.187.082-.187.216,0,.3L10.531,15.2a.986.986,0,0,0,.686,0L20.4,11.209c.189-.082.189-.216,0-.3ZM1.346,6.268,10.53,9.954a1.066,1.066,0,0,0,.686,0L20.4,6.268c.187-.076.187-.2,0-.275L11.216,2.307a1.055,1.055,0,0,0-.686,0L1.346,5.993c-.189.076-.189.2,0,.275Z" transform="translate(2.797 2.46)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_1);
                                }

                                .products {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_1">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_1" data-name="1 – 1" class="cls-1">
                            <path id="Icon_awesome-buffer" data-name="Icon awesome-buffer" class="products" d="M20.4,16.485l-9.185,3.994a.986.986,0,0,1-.686,0L1.346,16.485c-.187-.082-.187-.216,0-.3l2.2-.955a.988.988,0,0,1,.687,0l6.3,2.735a.981.981,0,0,0,.686,0l6.3-2.735a.987.987,0,0,1,.686,0l2.2.957C20.591,16.27,20.591,16.4,20.4,16.485Zm0-5.574-2.2-.957a.987.987,0,0,0-.686,0l-6.3,2.739a.99.99,0,0,1-.686,0l-6.3-2.739a.988.988,0,0,0-.687,0l-2.2.957c-.187.082-.187.216,0,.3L10.531,15.2a.986.986,0,0,0,.686,0L20.4,11.209c.189-.082.189-.216,0-.3ZM1.346,6.268,10.53,9.954a1.066,1.066,0,0,0,.686,0L20.4,6.268c.187-.076.187-.2,0-.275L11.216,2.307a1.055,1.055,0,0,0-.686,0L1.346,5.993c-.189.076-.189.2,0,.275Z" transform="translate(2.797 2.46)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Products</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.orders')" :active="request()->routeIs('vendor.orders') || request()->routeIs('vendor.orders.*')">
                    {{-- <i class="w-5 h-5 fas fa-shopping-bag"></i> --}}
                    @if (request()->routeIs('vendor.orders') || request()->routeIs('vendor.orders.*'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_2);
                                }

                                .basket {
                                fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_2">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_2" data-name="1 – 2" class="cls-1">
                            <path id="Icon_awesome-shopping-bag" data-name="Icon awesome-shopping-bag" class="basket" d="M14.816,6.735V5.388a5.388,5.388,0,0,0-10.775,0V6.735H0V18.183a3.367,3.367,0,0,0,3.367,3.367H15.49a3.367,3.367,0,0,0,3.367-3.367V6.735ZM6.735,5.388a2.694,2.694,0,1,1,5.388,0V6.735H6.735Zm6.735,5.051a1.01,1.01,0,1,1,1.01-1.01A1.01,1.01,0,0,1,13.469,10.439Zm-8.082,0A1.01,1.01,0,1,1,6.4,9.428,1.01,1.01,0,0,1,5.388,10.439Z" transform="translate(4.482 3.12)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_2);
                                }

                                .basket {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_2">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_2" data-name="1 – 2" class="cls-1">
                            <path id="Icon_awesome-shopping-bag" data-name="Icon awesome-shopping-bag" class="basket" d="M14.816,6.735V5.388a5.388,5.388,0,0,0-10.775,0V6.735H0V18.183a3.367,3.367,0,0,0,3.367,3.367H15.49a3.367,3.367,0,0,0,3.367-3.367V6.735ZM6.735,5.388a2.694,2.694,0,1,1,5.388,0V6.735H6.735Zm6.735,5.051a1.01,1.01,0,1,1,1.01-1.01A1.01,1.01,0,0,1,13.469,10.439Zm-8.082,0A1.01,1.01,0,1,1,6.4,9.428,1.01,1.01,0,0,1,5.388,10.439Z" transform="translate(4.482 3.12)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="flex-1 ml-3 truncate">Orders</span>
                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-200 bg-red-900 rounded-full">{{ auth()->user()->pendingOrders() }}</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.quotation.requests')" :active="request()->routeIs('vendor.quotation.requests') || request()->routeIs('vendor.quotation.requests.*')">
                    {{-- <i class="w-5 h-5 fas fa-shopping-bag"></i> --}}
                    @if (request()->routeIs('vendor.quotation.requests') || request()->routeIs('vendor.quotation.requests.*'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_2);
                                }

                                .basket-2 {
                                fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_2">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_2" data-name="1 – 2" class="cls-1">
                            <path id="Icon_awesome-shopping-bag" data-name="Icon awesome-shopping-bag" class="basket-2" d="M14.816,6.735V5.388a5.388,5.388,0,0,0-10.775,0V6.735H0V18.183a3.367,3.367,0,0,0,3.367,3.367H15.49a3.367,3.367,0,0,0,3.367-3.367V6.735ZM6.735,5.388a2.694,2.694,0,1,1,5.388,0V6.735H6.735Zm6.735,5.051a1.01,1.01,0,1,1,1.01-1.01A1.01,1.01,0,0,1,13.469,10.439Zm-8.082,0A1.01,1.01,0,1,1,6.4,9.428,1.01,1.01,0,0,1,5.388,10.439Z" transform="translate(4.482 3.12)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_2);
                                }

                                .basket-2 {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_2">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_2" data-name="1 – 2" class="cls-1">
                            <path id="Icon_awesome-shopping-bag" data-name="Icon awesome-shopping-bag" class="basket-2" d="M14.816,6.735V5.388a5.388,5.388,0,0,0-10.775,0V6.735H0V18.183a3.367,3.367,0,0,0,3.367,3.367H15.49a3.367,3.367,0,0,0,3.367-3.367V6.735ZM6.735,5.388a2.694,2.694,0,1,1,5.388,0V6.735H6.735Zm6.735,5.051a1.01,1.01,0,1,1,1.01-1.01A1.01,1.01,0,0,1,13.469,10.439Zm-8.082,0A1.01,1.01,0,1,1,6.4,9.428,1.01,1.01,0,0,1,5.388,10.439Z" transform="translate(4.482 3.12)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="flex-1 ml-3 truncate">Quotation Requests</span>
                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-200 bg-red-900 rounded-full">{{ auth()->user()->quotationRequests() }}</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('messages')" :active="request()->routeIs('messages')">
                    {{-- <i class="w-5 h-5 fas fa-comment"></i> --}}
                    @if (request()->routeIs('messages'))
                        <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="0 0 24 24">
                            <defs>
                            <style>
                                .cls-1 {
                                    clip-path: url(#clip-_1_3);
                                }

                                .message {
                                    fill: #EE5D32;
                                }

                                .cls-3 {
                                    fill: none;
                                    stroke: #f1f2f6;
                                }
                            </style>
                            <clipPath id="clip-_1_3">
                                <rect width="26" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_3" data-name="1 – 3" class="cls-1">
                            <g id="Group_877" data-name="Group 877">
                                <g id="Group_389" data-name="Group 389" transform="translate(-19.518 -585.743)">
                                <path id="Vector" class="message" d="M2.825,2.832A9.651,9.651,0,0,0,1,13.938L.554,17.519a1.14,1.14,0,0,0,1.268,1.268l3.567-.432A9.676,9.676,0,1,0,2.825,2.832Z" transform="translate(23 589.393)"/>
                                </g>
                                <line id="Line_58" data-name="Line 58" class="cls-3" x2="9" transform="translate(8.652 12.324)"/>
                                <line id="Line_59" data-name="Line 59" class="cls-3" x2="4.33" transform="translate(8.652 15.324)"/>
                            </g>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="26" viewBox="0 0 26 26">
                            <defs>
                            <style>
                                .cls-1 {
                                    clip-path: url(#clip-_1_3);
                                }

                                .message {
                                    fill: #4f4f4f;
                                }

                                .cls-3 {
                                    fill: none;
                                    stroke: #f1f2f6;
                                }
                            </style>
                            <clipPath id="clip-_1_3">
                                <rect width="26" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_3" data-name="1 – 3" class="cls-1">
                            <g id="Group_877" data-name="Group 877">
                                <g id="Group_389" data-name="Group 389" transform="translate(-19.518 -585.743)">
                                <path id="Vector" class="message" d="M2.825,2.832A9.651,9.651,0,0,0,1,13.938L.554,17.519a1.14,1.14,0,0,0,1.268,1.268l3.567-.432A9.676,9.676,0,1,0,2.825,2.832Z" transform="translate(23 589.393)"/>
                                </g>
                                <line id="Line_58" data-name="Line 58" class="cls-3" x2="9" transform="translate(8.652 12.324)"/>
                                <line id="Line_59" data-name="Line 59" class="cls-3" x2="4.33" transform="translate(8.652 15.324)"/>
                            </g>
                            </g>
                        </svg>
                    @endif
                    <span class="flex-1 ml-3 truncate">Messages</span>
                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-200 bg-red-900 rounded-full">{{ auth()->user()->unreadMessagesCount() }}</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.warehouses')" :active="request()->routeIs('vendor.warehouses')">
                    {{-- <i class="fas fa-warehouse"></i> --}}
                    @if (request()->routeIs('vendor.warehouses'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="26" viewBox="0 0 26 26">
                            <defs>
                            <style>
                                .cls-1 {
                                    clip-path: url(#clip-_1_4);
                                }

                                .warehouse {
                                    fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_4">
                                <rect width="26" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_4" data-name="1 – 4" class="cls-1">
                            <path id="Icon_awesome-warehouse" data-name="Icon awesome-warehouse" class="warehouse" d="M15.479,10.812H4.189a.246.246,0,0,0-.246.246l0,1.474a.246.246,0,0,0,.246.246H15.479a.246.246,0,0,0,.246-.246V11.057A.246.246,0,0,0,15.479,10.812Zm0,2.948H4.18a.246.246,0,0,0-.246.246l0,1.474a.246.246,0,0,0,.246.246h11.3a.246.246,0,0,0,.246-.246V14.006A.246.246,0,0,0,15.479,13.76Zm0-5.9H4.2a.246.246,0,0,0-.246.246l0,1.474a.246.246,0,0,0,.246.246H15.479a.246.246,0,0,0,.246-.246V8.109A.246.246,0,0,0,15.479,7.863ZM18.75,3.594,10.393.115a1.479,1.479,0,0,0-1.133,0L.906,3.594A1.478,1.478,0,0,0,0,4.955V15.48a.246.246,0,0,0,.246.246H2.7a.246.246,0,0,0,.246-.246V7.863a.994.994,0,0,1,1-.983H15.706a.994.994,0,0,1,1,.983V15.48a.246.246,0,0,0,.246.246H19.41a.246.246,0,0,0,.246-.246V4.955A1.478,1.478,0,0,0,18.75,3.594Z" transform="translate(3.171 5.136)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="26" viewBox="0 0 26 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_4);
                                }

                                .warehouse {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_4">
                                <rect width="26" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_4" data-name="1 – 4" class="cls-1">
                            <path id="Icon_awesome-warehouse" data-name="Icon awesome-warehouse" class="warehouse" d="M15.479,10.812H4.189a.246.246,0,0,0-.246.246l0,1.474a.246.246,0,0,0,.246.246H15.479a.246.246,0,0,0,.246-.246V11.057A.246.246,0,0,0,15.479,10.812Zm0,2.948H4.18a.246.246,0,0,0-.246.246l0,1.474a.246.246,0,0,0,.246.246h11.3a.246.246,0,0,0,.246-.246V14.006A.246.246,0,0,0,15.479,13.76Zm0-5.9H4.2a.246.246,0,0,0-.246.246l0,1.474a.246.246,0,0,0,.246.246H15.479a.246.246,0,0,0,.246-.246V8.109A.246.246,0,0,0,15.479,7.863ZM18.75,3.594,10.393.115a1.479,1.479,0,0,0-1.133,0L.906,3.594A1.478,1.478,0,0,0,0,4.955V15.48a.246.246,0,0,0,.246.246H2.7a.246.246,0,0,0,.246-.246V7.863a.994.994,0,0,1,1-.983H15.706a.994.994,0,0,1,1,.983V15.48a.246.246,0,0,0,.246.246H19.41a.246.246,0,0,0,.246-.246V4.955A1.478,1.478,0,0,0,18.75,3.594Z" transform="translate(3.171 5.136)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Warehouse Services</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.payments')" :active="request()->routeIs('vendor.payments')">
                    {{-- <i class="fas fa-money-bill-alt"></i> --}}
                    @if (request()->routeIs('vendor.payments'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_5);
                                }

                                .cls-2 {
                                fill: #fff;
                                }

                                .cls-3 {
                                fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_5">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_5" data-name="1 – 5" class="cls-1">
                            <g id="Group_467" data-name="Group 467" transform="translate(4.071 7.119)">
                                <rect id="Rectangle_1133" data-name="Rectangle 1133" class="cls-2" width="18" height="11" transform="translate(0.25 0.441)"/>
                                <path id="Icon_awesome-money-bill-alt" data-name="Icon awesome-money-bill-alt" class="cls-3" d="M10.371,11.1H9.9V8.507a.236.236,0,0,0-.236-.236h-.4a.706.706,0,0,0-.392.119l-.452.3a.236.236,0,0,0-.065.327l.262.392a.236.236,0,0,0,.327.065l.014-.009V11.1H8.486a.236.236,0,0,0-.236.236v.471a.236.236,0,0,0,.236.236h1.886a.236.236,0,0,0,.236-.236v-.471A.236.236,0,0,0,10.371,11.1Zm7.543-6.6H.943A.943.943,0,0,0,0,5.443v9.428a.943.943,0,0,0,.943.943H17.914a.943.943,0,0,0,.943-.943V5.443A.943.943,0,0,0,17.914,4.5Zm-16.5,9.9V12.514A1.886,1.886,0,0,1,3.3,14.4Zm0-6.6V5.914H3.3A1.886,1.886,0,0,1,1.414,7.8Zm8.014,5.657a3.092,3.092,0,0,1-2.829-3.3,3.092,3.092,0,0,1,2.829-3.3,3.092,3.092,0,0,1,2.829,3.3A3.092,3.092,0,0,1,9.428,13.457Zm8.014.943H15.557a1.886,1.886,0,0,1,1.886-1.886Zm0-6.6a1.886,1.886,0,0,1-1.886-1.886h1.886Z" transform="translate(0 -4.276)"/>
                            </g>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_5);
                                }

                                .dollar-bill {
                                fill: #fff;
                                }

                                .cls-3 {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_5">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_5" data-name="1 – 5" class="cls-1">
                            <g id="Group_467" data-name="Group 467" transform="translate(4.071 7.119)">
                                <rect id="Rectangle_1133" data-name="Rectangle 1133" class="dollar-bill" width="18" height="11" transform="translate(0.25 0.441)"/>
                                <path id="Icon_awesome-money-bill-alt" data-name="Icon awesome-money-bill-alt" class="cls-3" d="M10.371,11.1H9.9V8.507a.236.236,0,0,0-.236-.236h-.4a.706.706,0,0,0-.392.119l-.452.3a.236.236,0,0,0-.065.327l.262.392a.236.236,0,0,0,.327.065l.014-.009V11.1H8.486a.236.236,0,0,0-.236.236v.471a.236.236,0,0,0,.236.236h1.886a.236.236,0,0,0,.236-.236v-.471A.236.236,0,0,0,10.371,11.1Zm7.543-6.6H.943A.943.943,0,0,0,0,5.443v9.428a.943.943,0,0,0,.943.943H17.914a.943.943,0,0,0,.943-.943V5.443A.943.943,0,0,0,17.914,4.5Zm-16.5,9.9V12.514A1.886,1.886,0,0,1,3.3,14.4Zm0-6.6V5.914H3.3A1.886,1.886,0,0,1,1.414,7.8Zm8.014,5.657a3.092,3.092,0,0,1-2.829-3.3,3.092,3.092,0,0,1,2.829-3.3,3.092,3.092,0,0,1,2.829,3.3A3.092,3.092,0,0,1,9.428,13.457Zm8.014.943H15.557a1.886,1.886,0,0,1,1.886-1.886Zm0-6.6a1.886,1.886,0,0,1-1.886-1.886h1.886Z" transform="translate(0 -4.276)"/>
                            </g>
                            </g>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Payments</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.customers')" :active="request()->routeIs('vendor.customers')">
                    {{-- <i class="fas fa-user-friends"></i> --}}
                    @if (request()->routeIs('vendor.customers'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_6);
                                }

                                .customers {
                                fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_6">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_6" data-name="1 – 6" class="cls-1">
                            <path id="Icon_material-people" class="customers" data-name="Icon material-people" class="cls-2" d="M14.357,12.643a2.571,2.571,0,1,0-2.571-2.571A2.561,2.561,0,0,0,14.357,12.643Zm-6.857,0a2.571,2.571,0,1,0-2.571-2.571A2.561,2.561,0,0,0,7.5,12.643Zm0,1.714c-2,0-6,1-6,3V19.5h12V17.357C13.5,15.36,9.5,14.357,7.5,14.357Zm6.857,0c-.249,0-.531.017-.831.043a3.617,3.617,0,0,1,1.689,2.957V19.5h5.143V17.357C20.356,15.36,16.354,14.357,14.357,14.357Z" transform="translate(2.571 -0.5)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_6);
                                }

                                .customers {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_6">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_6" data-name="1 – 6" class="cls-1">
                            <path id="Icon_material-people" class="customers" data-name="Icon material-people" class="cls-2" d="M14.357,12.643a2.571,2.571,0,1,0-2.571-2.571A2.561,2.561,0,0,0,14.357,12.643Zm-6.857,0a2.571,2.571,0,1,0-2.571-2.571A2.561,2.561,0,0,0,7.5,12.643Zm0,1.714c-2,0-6,1-6,3V19.5h12V17.357C13.5,15.36,9.5,14.357,7.5,14.357Zm6.857,0c-.249,0-.531.017-.831.043a3.617,3.617,0,0,1,1.689,2.957V19.5h5.143V17.357C20.356,15.36,16.354,14.357,14.357,14.357Z" transform="translate(2.571 -0.5)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Customers</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.suppliers')" :active="request()->routeIs('vendor.suppliers')">
                    {{-- <i class="fas fa-briefcase"></i> --}}
                    @if (request()->routeIs('vendor.suppliers'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_7);
                                }

                                .supplier {
                                fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_7">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_7" data-name="1 – 7" class="cls-1">
                            <path id="Icon_material-business-center" data-name="Icon material-business-center" class="supplier" d="M10.736,17.07V16.1H3.977l-.01,3.868A1.927,1.927,0,0,0,5.9,21.905H19.438a1.927,1.927,0,0,0,1.934-1.934V16.1H14.6v.967Zm9.67-8.7H16.528V6.434L14.594,4.5H10.726L8.792,6.434V8.368H4.934A1.94,1.94,0,0,0,3,10.3v2.9a1.927,1.927,0,0,0,1.934,1.934h5.8V13.2H14.6v1.934h5.8A1.94,1.94,0,0,0,22.339,13.2V10.3A1.94,1.94,0,0,0,20.405,8.368Zm-5.8,0H10.736V6.434H14.6Z" transform="translate(0.83 -0.203)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_7);
                                }

                                .supplier {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_7">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_7" data-name="1 – 7" class="cls-1">
                            <path id="Icon_material-business-center" data-name="Icon material-business-center" class="supplier" d="M10.736,17.07V16.1H3.977l-.01,3.868A1.927,1.927,0,0,0,5.9,21.905H19.438a1.927,1.927,0,0,0,1.934-1.934V16.1H14.6v.967Zm9.67-8.7H16.528V6.434L14.594,4.5H10.726L8.792,6.434V8.368H4.934A1.94,1.94,0,0,0,3,10.3v2.9a1.927,1.927,0,0,0,1.934,1.934h5.8V13.2H14.6v1.934h5.8A1.94,1.94,0,0,0,22.339,13.2V10.3A1.94,1.94,0,0,0,20.405,8.368Zm-5.8,0H10.736V6.434H14.6Z" transform="translate(0.83 -0.203)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Suppliers</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.profile')" :active="request()->routeIs('vendor.profile')">
                    {{-- <i class="fas fa-cog"></i> --}}
                    @if (request()->routeIs('vendor.profile'))
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_8);
                                }

                                .settings {
                                fill: #EE5D32;
                                }
                            </style>
                            <clipPath id="clip-_1_8">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_8" data-name="1 – 8" class="cls-1">
                            <path id="Icon_material-settings" data-name="Icon material-settings" class="settings" d="M20.038,13.643a6.683,6.683,0,0,0,0-1.9l2.045-1.6a.489.489,0,0,0,.116-.62L20.261,6.17a.487.487,0,0,0-.591-.213l-2.414.969a7.082,7.082,0,0,0-1.638-.95L15.25,3.407A.473.473,0,0,0,14.775,3H10.9a.473.473,0,0,0-.475.407l-.368,2.569a7.447,7.447,0,0,0-1.638.95L6,5.956a.473.473,0,0,0-.591.213L3.473,9.523a.478.478,0,0,0,.116.62l2.045,1.6a7.687,7.687,0,0,0-.068.95,7.687,7.687,0,0,0,.068.95l-2.045,1.6a.489.489,0,0,0-.116.62l1.939,3.354A.487.487,0,0,0,6,19.429l2.414-.969a7.082,7.082,0,0,0,1.638.95l.368,2.569a.473.473,0,0,0,.475.407h3.877a.473.473,0,0,0,.475-.407l.368-2.569a7.447,7.447,0,0,0,1.638-.95l2.414.969a.473.473,0,0,0,.591-.213L22.2,15.862a.489.489,0,0,0-.116-.62l-2.045-1.6Zm-7.2,2.443a3.392,3.392,0,1,1,3.392-3.392A3.4,3.4,0,0,1,12.836,16.085Z" transform="translate(0.665 0.307)"/>
                            </g>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="26" viewBox="0 0 27 26">
                            <defs>
                            <style>
                                .cls-1 {
                                clip-path: url(#clip-_1_8);
                                }

                                .settings {
                                fill: #4f4f4f;
                                }
                            </style>
                            <clipPath id="clip-_1_8">
                                <rect width="27" height="26"/>
                            </clipPath>
                            </defs>
                            <g id="_1_8" data-name="1 – 8" class="cls-1">
                            <path id="Icon_material-settings" data-name="Icon material-settings" class="settings" d="M20.038,13.643a6.683,6.683,0,0,0,0-1.9l2.045-1.6a.489.489,0,0,0,.116-.62L20.261,6.17a.487.487,0,0,0-.591-.213l-2.414.969a7.082,7.082,0,0,0-1.638-.95L15.25,3.407A.473.473,0,0,0,14.775,3H10.9a.473.473,0,0,0-.475.407l-.368,2.569a7.447,7.447,0,0,0-1.638.95L6,5.956a.473.473,0,0,0-.591.213L3.473,9.523a.478.478,0,0,0,.116.62l2.045,1.6a7.687,7.687,0,0,0-.068.95,7.687,7.687,0,0,0,.068.95l-2.045,1.6a.489.489,0,0,0-.116.62l1.939,3.354A.487.487,0,0,0,6,19.429l2.414-.969a7.082,7.082,0,0,0,1.638.95l.368,2.569a.473.473,0,0,0,.475.407h3.877a.473.473,0,0,0,.475-.407l.368-2.569a7.447,7.447,0,0,0,1.638-.95l2.414.969a.473.473,0,0,0,.591-.213L22.2,15.862a.489.489,0,0,0-.116-.62l-2.045-1.6Zm-7.2,2.443a3.392,3.392,0,1,1,3.392-3.392A3.4,3.4,0,0,1,12.836,16.085Z" transform="translate(0.665 0.307)"/>
                            </g>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Settings</span>
                </x-nav-item>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-item :href="route('logout')" :active="request()->routeIs('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <span class="flex-1 ml-3 truncate">Sign Out</span>
                    </x-nav-item>
                </form>
                {{-- <x-nav-item :href="route('logout')" :active="request()->routeIs('logout')">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                    </svg>
                    <span class="flex-1 ml-3 truncate">Sign Out</span>
                </x-nav-item> --}}
            </li>
        </ul>
        <div class="flex justify-center">
            <a href="{{ url('/') }}">
                <x-application-logo class="w-[10rem] object-contain pt-3" />
            </a>
        </div>
    </div>
</aside>
