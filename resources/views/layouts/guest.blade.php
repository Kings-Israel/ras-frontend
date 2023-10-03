<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,1100&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('css')
        <style>
            @layer base {
                input[type="number"]::-webkit-inner-spin-button,
                input[type="number"]::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @php($random = ['auth-alt', 'auth-alt-three', 'auth-alt-four', 'auth-alt-five'])
        @php($key = array_rand($random))
        <div class="min-h-screen bg-alt-three bg-no-repeat bg-cover">
            <x-guest-nav>
                <div>
                    <a href="{{ url('/') }}" class="">
                        <img src="{{ asset('assets/img/logo-alt.png') }}" class="w-[10rem] h-[10rem] object-contain -my-12" alt="">
                    </a>
                </div>
                @guest
                    @if (Route::is('login') || Route::is('verify-phone'))
                        <a href="{{ route('register') }}">
                            <x-secondary-button class="px-8">
                                Sign Up
                            </x-secondary-button>
                        </a>
                        @elseif (Route::is('register'))
                        <div class="flex">
                            <a href="{{ route('select-type') }}">
                                <h2 class="mr-3 text-white mt-2 md:my-auto font-bold lg:text-2xl md:text-lg md:mt-2 sm:mt-10">Switch User</h2>
                            </a>
                            <a href="{{ route('login') }}">
                                <x-secondary-button class="px-8">
                                    Login
                                </x-secondary-button>
                            </a>
                        </div>
                    @elseif (Route::is('select-type'))
                        <a href="{{ route('register') }}">
                            <x-secondary-button class="px-8">
                                Sign Up
                            </x-secondary-button>
                        </a>
                    @endif
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <x-secondary-button class="px-8">
                                Sign Out
                            </x-secondary-button>
                        </a>
                    </form>
                @endguest
            </x-guest-nav>
            <div {!! $attributes->merge(['class' => 'px-6 py-4 bg-white overflow-hidden sm:rounded-lg mx-auto rounded-md']) !!}>
                {{ $slot }}
            </div>
            {{-- <div class="flex flex-col sm:justify-center items-center lg:mt-10 pt-6 sm:pt-0 bg-transparent">
            </div> --}}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
        @stack('scripts')
    </body>
</html>
