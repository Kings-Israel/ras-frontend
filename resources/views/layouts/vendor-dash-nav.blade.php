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
                <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-12 h-12 object-cover" alt="avatar">
                <div class="pl-2">
                    <h3>Hello, {{ auth()->user()->last_name }}</h3>
                    <h4 class="font-extrabold text-lg">{{ auth()->user()->business->name }}</h4>
                </div>
            </div>
            <div>
                <h5 class="">Earnings</h5>
                <h3 class="font-extrabold text-lg">Ksh.3,794,883</h3>
            </div>
        </div>
        <ul class="md:pt-5 font-medium">
            <li>
                <x-nav-item :href="route('vendor.dashboard')" :active="request()->routeIs('vendor.dashboard')">
                    @if (request()->routeIs('vendor.dashboard'))
                        <svg class="w-5 h-5 text-orange-500 transition duration-75 dark:text-orange-500 group-hover:text-orange-500 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                    @else
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                    @endif
                    <span class="ml-3 truncate">Dashboard</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.products')" :active="request()->routeIs('vendor.products')">
                    <i class="w-5 h-5 fas fa-layer-group"></i>
                    <span class="ml-3 truncate">Products</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.orders')" :active="request()->routeIs('vendor.orders')">
                    <i class="w-5 h-5 fas fa-shopping-bag"></i>
                    <span class="flex-1 ml-3 truncate">Orders</span>
                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-200 bg-red-900 rounded-full">100</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.messages')" :active="request()->routeIs('vendor.messages')">
                    <i class="w-5 h-5 fas fa-comment"></i>
                    <span class="flex-1 ml-3 truncate">Messages</span>
                    <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-200 bg-red-900 rounded-full">3</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.warehouses')" :active="request()->routeIs('vendor.warehouses')">
                    <i class="fas fa-warehouse"></i>
                    <span class="ml-3 truncate">Warehouse Services</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.payments')" :active="request()->routeIs('vendor.payments')">
                    <i class="fas fa-money-bill-alt"></i>
                    <span class="ml-3 truncate">Payments</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.customers')" :active="request()->routeIs('vendor.customers')">
                    <i class="fas fa-user-friends"></i>
                    <span class="ml-3 truncate">Customers</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.suppliers')" :active="request()->routeIs('vendor.suppliers')">
                    <i class="fas fa-briefcase"></i>
                    <span class="ml-3 truncate">Suppliers</span>
                </x-nav-item>
            </li>
            <li>
                <x-nav-item :href="route('vendor.profile')" :active="request()->routeIs('vendor.profile')">
                    <i class="fas fa-cog"></i>
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
                <x-application-logo class="w-32 h-32 fill-current text-gray-500" />
            </a>
        </div>
    </div>
</aside>
