<div {{ $attributes->merge(['class' => 'sticky top-0 flex flex-wrap items-center justify-between mx-auto pt-1 py-1 px-2 md:px-8 lg:px-24 bg-white z-50']) }}>
    <a href="{{ url('/') }}" class="">
        <x-application-logo class="w-[9rem] md:w-[10rem] object-contain" />
    </a>
    @auth
        <div class="flex space-x-2">
            <img src="{{ auth()->user()->avatar }}" alt="" class="w-8 h-8 rounded-full object-cover">
            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex gap-2">
                <span class="font-bold my-auto">My Account</span>
                <i class="fas fa-chevron-down my-auto text-sm"></i>
            </button>
            {{-- <div id="dropdown" class="z-10 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    <li>
                        <a href="{{ route('vendor.dashboard') }}" class="inline-flex w-full font-semibold px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="inline-flex w-full font-semibold px-4 py-2 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div> --}}
            <div id="dropdown" class="z-10 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 font-semibold text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    @if (auth()->user()->hasRole('vendor'))
                        <li>
                            <a href="{{ route('vendor.dashboard') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                    @endif
                    @if (auth()->user()->hasRole('buyer'))
                        <li>
                            <a href="{{ route('cart') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Cart</a>
                        </li>
                    @endif
                    <li class="flex justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <a href="{{ route('messages') }}" class="inline-flex w-full">Messages</a>
                        <span class="inline-flex items-center justify-center px-1 py-1 my-auto h-4 text-xs text-gray-200 bg-red-900 rounded-full">{{ auth()->user()->unreadMessagesCount() }}</span>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="inline-flex w-full px-4 py-2 hover:cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <a href="#" class="text-gray-800 bg-gray-300 rounded-full w-7 h-7 my-auto lg:my-0 md:w-8 md:h-8 text-center pt-0.5 md:pt-1">
                <i class="w-5 h-5 fas fa-bell"></i>
            </a>
            @if(auth()->user()->hasRole('buyer'))
                <a href="{{ route('cart') }}" class="text-gray-800 bg-gray-300 rounded-full w-8 text-center pt-1">
                    <i class="w-5 h-5 fas fa-shopping-bag"></i>
                </a>
            @endif
        </div>
    @else
        <div class="flex gap-3">
            <a href="{{ route('login') }}">
                <x-primary-button class="py-2">Login</x-primary-button>
            </a>
            <a href="{{ route('register') }}">
                <x-primary-outline-button>Register</x-primary-outline-button>
            </a>
        </div>
    @endauth
</div>
