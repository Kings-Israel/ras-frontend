<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Real African Sources</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="bg-hero bg-cover bg-no-repeat h-[450px]">
            <div class="sticky top-0 flex flex-wrap items-center justify-between mx-auto pt-2 py-2 px-32 z-50">
                <img src="{{ asset('assets/img/Logo.png') }}" alt="" class="w-12 h-12 object-fill rounded-lg">
                <div class="flex space-x-2">
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex gap-2">
                        <span class="font-bold my-auto">My Account</span>
                        <i class="fas fa-chevron-down my-auto text-sm"></i>
                    </button>
                    <div id="dropdown" class="z-10 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <a href="{{ route('vendor.dashboard') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                    <div class="text-gray-800 bg-gray-300 rounded-full w-8 text-center pt-1">
                        <i class="w-5 h-5 fas fa-bell"></i>
                    </div>
                    <div class="text-gray-800 bg-gray-300 rounded-full w-8 text-center pt-1">
                        <i class="w-5 h-5 fas fa-shopping-bag"></i>
                    </div>
                </div>
            </div>
            <div class="flex flex-col mx-auto py-16 px-32 z-50">
                <h1 class="text-4xl font-extrabold text-center hero-main-text">Find The Best Products, From Top Notch Suppliers</h1>
                <h5 class="text-center px-68">Real African Sources is where to go to easily access raw materials and business opportunities from vetted suppliers across Africa.</h5>
                <label for="themeSwitcherThree" class="themeSwitcherThree relative inline-flex cursor-pointer select-none items-center justify-center my-2">
                    <input type="checkbox" name="themeSwitcherThree" id="themeSwitcherThree" class="sr-only">

                    <div class="shadow-card flex h-[32px] w-[172px] items-center justify-between rounded-full bg-white border border-orange-500" id="switch-toggle" onclick="toggleTheme()">
                        <h4 id="products-toggle" class="bg-orange-500 px-3 rounded-full text-white ml-1 transition duration-200 ease-out font-bold">Products</h4>
                        <h4 id="vendors-toggle" class="mr-2 transition duration-200 ease-out font-bold">Vendors</h4>
                    </div>
                </label>
                <div class="w-3/5 mx-auto">
                    <form class="">
                        <div class="flex">
                            <button id="dropdown-button" data-dropdown-toggle="store-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                                All Items
                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <div id="store-dropdown" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Diamonds</button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tanzanite</button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gold</button>
                                    </li>
                                    <li>
                                        <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Uranium</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="relative w-full">
                                <i class="fas fa-search absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none text-xl"></i>
                                <input type="search" id="search-dropdown" class="pl-10 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 transition duration-250" placeholder="What Are You Looking For..." required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-3/5 mx-auto">
                    <div class="flex flex-wrap gap-2 mt-2">
                        <x-badge class="bg-violet-100 font-bold" text="Minerals"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Natural"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Wines"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Fruits"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Seedlings"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Ornaments"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Building Material"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Automobile"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Paint"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Stationery"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Machinery"></x-badge>
                        <x-badge class="bg-violet-100 font-bold" text="Animal Food"></x-badge>
                        <x-badge class="bg-orange-500 text-white font-bold" text="All Categories"></x-badge>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-32 flex gap-10 mt-5">
            <div class="basis-1/6 w-32">
                <div class="border border-gray-300 rounded-md flex flex-col space-y-2 py-2">
                    <div class="flex text-sm px-2">
                        <i class="fas fa-map-marker-alt my-auto text-red-600 mr-1"></i>
                        <h2 class="font-extrabold text-gray-500 truncate">Show products/suppliers available in</h2>
                    </div>
                    <form class="">
                        <div class="flex px-1">
                            <div class="relative w-full">
                                <i class="fas fa-search absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none text-xl"></i>
                                <input type="search" id="search-dropdown" class="pl-8 shadow-md block w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-md border-2 border-gray-200 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-orange-500 transition duration-250" placeholder="Search Location" required>
                            </div>
                        </div>
                    </form>
                    <div class="flex gap-2 px-2 text-gray-500">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        <h2 class="font-bold">Kenya</h2>
                    </div>
                    <div class="flex gap-2 px-2 text-gray-600 text-sm">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        <h2 class="font-bold">Ethiopia</h2>
                    </div>
                    <div class="flex gap-2 px-2 text-gray-600 text-sm">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        <h2 class="font-bold">Rwanda</h2>
                    </div>
                    <div class="flex gap-2 px-2 text-gray-600 text-sm">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        <h2 class="font-bold">South Africa</h2>
                    </div>
                    <div class="flex gap-2 px-2 text-gray-600 text-sm">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        <h2 class="font-bold">Ghana</h2>
                    </div>
                    <div class="flex gap-2 px-1 text-gray-600 text-sm">
                        <a
                            href="#"
                            class="text-sm font-semibold inline-flex items-center rounded-lg text-orange-400 hover:text-orange-500 dark:hover:text-orange-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-1">
                            Show More
                        </a>
                    </div>
                </div>
            </div>
            <div class="basis-5/6">
                <div class="flex">
                    <div>
                        <div class="flex">
                            <h3 class="font-extrabold text-lg">New Buying Leads</h3>
                            <h4 class="font-thin text-lg">(12)</h4>
                        </div>
                        <div class="grid grid-cols-3 space-x-4 border border-gray-300 rounded-md p-5">
                            <div class="space-y-2 border-r border-gray-300 pr-2 w-32">
                                <div class="flex gap-2">
                                    <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <div class="my-auto">
                                        <h5 class="text-sm my-auto">Uganda</h5>
                                        <p class="text-xs text-gray-400">31-07-2023</p>
                                    </div>
                                </div>
                                <h4 class="text-sm text-gray-500">We Buy Crude Oil</h4>
                            </div>
                            <div class="space-y-2 border-r border-gray-300 pr-2 w-32">
                                <div class="flex gap-2">
                                    <img src="https://flagcdn.com/w40/ng.png" srcset="https://flagcdn.com/w40/ng.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <div class="my-auto">
                                        <h5 class="text-sm my-auto">Nigeria</h5>
                                        <p class="text-xs text-gray-400">31-07-2023</p>
                                    </div>
                                </div>
                                <h4 class="text-sm text-gray-500 whitespace-normal">We Buy Refined Coconut Oil</h4>
                            </div>
                            <div class="space-y-2 w-32">
                                <div class="flex gap-2">
                                    <img src="https://flagcdn.com/w40/ke.png" srcset="https://flagcdn.com/w40/ke.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <div class="my-auto">
                                        <h5 class="text-sm my-auto">Kenya</h5>
                                        <p class="text-xs text-gray-400">31-07-2023</p>
                                    </div>
                                </div>
                                <h4 class="text-sm text-gray-500">We Buy Palm Oil</h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="border border-gray-300 rounded-md flex space-y-2 py-2">
                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative overflow-hidden rounded-lg">
                            <!-- Item 1 -->
                            <div class="duration-700 ease-in-out" data-carousel-item>
                                <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <h5 class="text-sm mt-5">Uganda</h5>
                                </div>
                                <h4>We Buy Crude Oil</h4>
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <h5 class="text-sm mt-5">Uganda</h5>
                                </div>
                                <h4>We Buy Crude Oil</h4>
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <h5 class="text-sm mt-5">Uganda</h5>
                                </div>
                                <h4>We Buy Crude Oil</h4>
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <h5 class="text-sm mt-5">Uganda</h5>
                                </div>
                                <h4>We Buy Crude Oil</h4>
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                    <h5 class="text-sm mt-5">Uganda</h5>
                                </div>
                                <h4>We Buy Crude Oil</h4>
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
        <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js" integrity="sha512-64O4TSvYybbO2u06YzKDmZfLj/Tcr9+oorWhxzE3yDnmBRf7wvDgQweCzUf5pm2xYTgHMMyk5tW8kWU92JENng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                productsToggle.classList.remove('bg-orange-500', 'px-3', 'rounded-full', 'ml-1')
                productsToggle.classList.add('text-black', 'ml-2')
                vendorsToggle.classList.add('bg-orange-500', 'px-3', 'rounded-full', 'text-white', 'mr-1')
                vendorsToggle.classList.remove('mr-2', 'text-black')
              } else {
                productsToggle.classList.add('bg-orange-500', 'px-3', 'rounded-full', 'text-white', 'ml-1');
                productsToggle.classList.remove('text-black', 'ml-2')
                vendorsToggle.classList.remove('bg-orange-500', 'px-3', 'rounded-full')
                vendorsToggle.classList.add('text-black', 'mr-2')
              }
            }

            switchTheme()
            </script>
    </body>
</html>
