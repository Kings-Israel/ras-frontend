<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Real African Sources') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600,900,1100&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @include('layouts.main-header')
        {{ $slot }}
        @include('layouts.footer')
        <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js" integrity="sha512-64O4TSvYybbO2u06YzKDmZfLj/Tcr9+oorWhxzE3yDnmBRf7wvDgQweCzUf5pm2xYTgHMMyk5tW8kWU92JENng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <script>
            const switchToggle = document.querySelector('#switch-toggle');
            const productsToggle = document.querySelector('#products-toggle');
            const vendorsToggle = document.querySelector('#vendors-toggle');
            let isProductmode = false

            function toggleTheme (){
              isProductmode = !isProductmode
              localStorage.setItem('isProductmode', isProductmode)
              switchTheme()
            }

            function switchTheme (){
            if (isProductmode) {
                productsToggle.classList.remove('bg-orange-500', 'px-3', 'rounded-full', 'ml-1', 'text-white')
                productsToggle.classList.add('text-black', 'ml-2')
                vendorsToggle.classList.add('bg-orange-500', 'px-3', 'rounded-full', 'text-white', 'mr-1')
                vendorsToggle.classList.remove('mr-2')
              } else {
                productsToggle.classList.add('bg-orange-500', 'px-3', 'rounded-full', 'text-white', 'ml-1');
                productsToggle.classList.remove('text-black', 'ml-2')
                vendorsToggle.classList.remove('bg-orange-500', 'px-3', 'rounded-full', 'text-white')
                vendorsToggle.classList.add('text-black', 'mr-2')
              }
            }

            switchTheme()

            $(window).scroll(function () {
                const scroll = $(window).scrollTop();

                let scrollThreshold = 20;

                if (scroll > scrollThreshold) {
                    // Apply the background color to the body element
                    $('#main-header').css('background-color', '#ffffff');
                    $('#main-header').css('border-bottom', '2px solid #ea580c');
                } else {
                    $('#main-header').css('background-color', 'transparent');
                    $('#main-header').css('border-bottom', 'none');
                }
            });
        </script>
        @stack('scripts')
    </body>
</html>
