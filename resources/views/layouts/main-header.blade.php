<div class="sticky top-0 bg-transparent flex lg:flex-wrap lg:items-center justify-between mx-auto pt-1 py-1 lg:px-24 md:px-10 sm:px-8 z-50 duration-200" id="main-header">
    <a href="{{ url('/') }}" class="">
        <x-application-logo class="w-[10rem] object-contain" />
    </a>
    <div class="hidden lg:block md:w-[50%]">
        <livewire:home-main-search />
    </div>
    <div class="flex space-x-2">
        @auth
            <img src="{{ auth()->user()->avatar }}" alt="" class="w-8 h-8 rounded-full object-cover my-auto">
            <button id="dropdown-button" data-dropdown-toggle="account-dropdown" data-dropdown-placement="bottom" class="flex gap-2" type="button">
                <span class="font-semibold my-auto">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                <i class="fas fa-chevron-down my-auto text-sm"></i>
            </button>
            <div id="account-dropdown" class="z-10 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 font-semibold text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    @if (auth()->user()->hasRole('vendor'))
                        <li>
                            <a href="{{ route('vendor.dashboard') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('orders') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('cart') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Cart</a>
                    </li>
                    <li class="flex justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <a href="{{ route('messages') }}" class="inline-flex w-full">Messages</a>
                        <span class="inline-flex items-center justify-center px-1 py-1 my-auto h-4 text-xs text-gray-200 bg-red-900 rounded-full">{{ auth()->user()->unreadMessagesCount() }}</span>
                    </li>
                    <li class="flex justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <a href="{{ route('profile.edit') }}" class="inline-flex w-full">My Profile</a>
                    </li>
                    <li>
                        <a href="#" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change Currency</a>
                    </li>
                    <li>
                        <a href="#" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change Language</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="inline-flex w-full px-4 py-2 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <livewire:notifications-list />
            @if (auth()->user()->hasRole('buyer'))
                <a href="{{ route('cart') }}" class="text-gray-800 bg-gray-300 rounded-full w-7 h-7 my-auto lg:my-0 md:w-8 md:h-8 text-center pt-0.5 md:pt-1">
                    <i class="w-5 h-5 fas fa-shopping-bag"></i>
                </a>
            @endif
        @else
            <a href="{{ route('login') }}">
                <x-primary-button class="py-2">Login</x-primary-button>
            </a>
            {{-- <a href="{{ route('register') }}">
                <x-primary-outline-button>Register</x-primary-outline-button>
            </a> --}}
            <button id="dropdown-button" data-dropdown-toggle="actions-dropdown" data-dropdown-placement="bottom" class="flex gap-2" type="button">
                <i class="fas fa-chevron-down my-auto text-sm"></i>
            </button>
            <div id="actions-dropdown" class="z-10 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 font-semibold text-gray-700 dark:text-gray-200" aria-labelledby="actions-dropdown">
                    <li>
                        <a href="#" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change Currency</a>
                    </li>
                    <li>
                        <a href="#" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change Language</a>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</div>
