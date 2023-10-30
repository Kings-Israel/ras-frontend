<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Real African Sources') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:200,400,500,600,700,800,900,1100&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=Century:200,400,500,600,700,800,900,1100&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
        {{-- <script type = "text/javascript" src = "https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
        <script type = "text/javascript" src = "{{ asset('assets/js/vue.min.js') }}"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body {{ $attributes->merge(['class' => 'antialiased']) }}>
        @include('layouts.main-header')
        {{ $slot }}
        @include('layouts.footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js" integrity="sha512-64O4TSvYybbO2u06YzKDmZfLj/Tcr9+oorWhxzE3yDnmBRf7wvDgQweCzUf5pm2xYTgHMMyk5tW8kWU92JENng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            $(window).scroll(function () {
                const scroll = $(window).scrollTop();

                let scrollThreshold = 0.5;

                if (scroll > scrollThreshold) {
                    // Apply the background color to the body element
                    $('#main-header').css('background-color', '#ffffff');
                    $('#main-header').css('border-bottom', '2px solid #EE5D32');
                } else {
                    $('#main-header').css('background-color', 'transparent');
                    $('#main-header').css('border-bottom', 'none');
                }
            });
        </script>
        @stack('scripts')
        @livewireScripts
    </body>
</html>
