<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <div class="min-h-screen bg-auth bg-no-repeat bg-cover">
            <x-guest-nav>
                <div>
                    <a href="{{ url('/') }}">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
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
                                <h2 class="mr-3 text-white lg:my-auto font-bold lg:text-2xl md:text-lg md:mt-2 sm:mt-10">Switch User</h2>
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
            <div class="flex flex-col sm:justify-center items-center lg:mt-20 pt-6 sm:pt-0 bg-transparent">
                <div class="lg:w-1/4 sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
    @stack('scripts')
</html>
