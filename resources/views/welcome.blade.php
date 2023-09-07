<x-main>
    <div class="bg-hero bg-cover bg-no-repeat lg:h-[500px] -mt-24 pt-24">
        <div class="flex flex-col mx-auto py-8 sm:px-20 md:px-24 lg:px-32 z-50 space-y-3">
            <h1 class="text-2xl md:text-2xl lg:text-4xl font-[600] md:font-[800] lg:font-[1100] text-center hero-main-text">Find The Best Products, From Top Notch Suppliers</h1>
            <h5 class="text-center px-8 md:px-12 lg:px-52">Real African Sources is where to go to easily access raw materials and business opportunities from vetted suppliers across Africa.</h5>
            <label for="themeSwitcherThree" class="themeSwitcherThree relative inline-flex cursor-pointer select-none items-center justify-center my-2">
                <input type="checkbox" name="themeSwitcherThree" id="themeSwitcherThree" class="sr-only">

                <div class="shadow-card flex h-[32px] w-[172px] items-center justify-between rounded-full bg-white border border-orange-500" id="switch-toggle" onclick="toggleTheme()">
                    <h4 id="products-toggle" class="bg-orange-500 px-3 rounded-full text-white ml-1 transition duration-200 ease-out font-semibold">Products</h4>
                    <h4 id="vendors-toggle" class="mr-2 transition duration-200 ease-out font-semibold">Vendors</h4>
                </div>
            </label>
            <div class="lg:w-3/5 mx-2 lg:mx-auto">
                <form class="">
                    <div class="flex">
                        <button id="dropdown-button" data-dropdown-toggle="store-dropdown" data-dropdown-placement="bottom" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
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
            <div class="lg:w-3/5 mx-2 lg:mx-auto">
                <div class="flex flex-wrap justify-center lg:justify-start gap-1 lg:gap-2 mt-2">
                    <x-badge class="bg-violet-100 font-thin" text="Minerals"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Natural"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Wines"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Fruits"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Seedlings"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Ornaments"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Building Material"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Automobile"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Paint"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Stationery"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Machinery"></x-badge>
                    <x-badge class="bg-violet-100 font-thin" text="Animal Food"></x-badge>
                    <x-badge class="bg-orange-500 text-white font-thin" text="All Categories"></x-badge>
                </div>
            </div>
        </div>
    </div>
    <div class="px-2 md:px-8 lg:px-24 lg:flex gap-10 mt-5">
        <div class="basis-1/6">
            <div class="border border-gray-300 rounded-md flex flex-col space-y-2 py-2 sticky top-24">
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
        <div class="basis-5/6 space-y-2">
            <div class="hidden md:grid md:grid-cols-1 lg:grid-cols-2 4xl:grid-cols-3">
                <div>
                    <div class="md:flex gap-1">
                        <h3 class="font-semibold text-lg">New Buying Leads</h3>
                        <h4 class="font-thin text-lg">(12)</h4>
                    </div>
                    <div class="relative" id="default-carousel" data-carousel="static">
                        <div class="relative overflow-hidden rounded-lg h-32">
                            <div class="hidden" data-carousel-item>
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 rounded-md p-5 min-h-[128px]">
                                    <div class="space-y-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Uganda</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Buy Crude Oil</h4>
                                    </div>
                                    <div class="space-y-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/ng.png" srcset="https://flagcdn.com/w40/ng.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Nigeria</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Buy Refined Coconut Oil</h4>
                                    </div>
                                    <div class="space-y-2 w-32 my-auto">
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
                            <div class="hidden" data-carousel-item>
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 rounded-md p-5 min-h-[128px]">
                                    <div class="space-y-2 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/tz.png" srcset="https://flagcdn.com/w40/tz.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Tanzania</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Buy Crude Oil</h4>
                                    </div>
                                    <div class="space-y-2 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/za.png" srcset="https://flagcdn.com/w40/za.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">South Africa</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Buy Refined Coconut Oil</h4>
                                    </div>
                                    <div class="space-y-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/et.png" srcset="https://flagcdn.com/w40/et.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Ethiopia</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Buy Palm Oil</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div>
                    <div class="flex gap-1">
                        <h3 class="font-semibold text-lg">New Selling Leads</h3>
                        <h4 class="font-thin text-lg">(387)</h4>
                    </div>
                    <div class="relative" id="default-carousel" data-carousel="static">
                        <div class="relative overflow-hidden rounded-lg h-32">
                            <div class="hidden" data-carousel-item>
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 min-h-[128px] rounded-md p-5">
                                    <div class="space-y-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/gh.png" srcset="https://flagcdn.com/w40/gh.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Ghana</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Sell Oil</h4>
                                    </div>
                                    <div class="space-y-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/cd.png" srcset="https://flagcdn.com/w40/cd.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">DRC</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Sell Diamonds</h4>
                                    </div>
                                    <div class="space-y-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/na.png" srcset="https://flagcdn.com/w40/na.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Namibia</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Sell Palm Oil</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden" data-carousel-item>
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 rounded-md p-5 min-h-[128px]">
                                    <div class="space-y-2 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/rw.png" srcset="https://flagcdn.com/w40/rw.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Rwanda</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Sell Gold</h4>
                                    </div>
                                    <div class="space-y-2 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/za.png" srcset="https://flagcdn.com/w40/za.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">South Africa</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Sell Bananas</h4>
                                    </div>
                                    <div class="space-y-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/et.png" srcset="https://flagcdn.com/w40/et.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Ethiopia</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Sell Palm Oil</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                {{-- <div class="">
                    <div class="flex gap-1">
                        <h3 class="font-semibold text-lg">Your Buying Requests</h3>
                    </div>
                    <x-card class="bg-gray-300 rounded-md">
                        <div class="flex gap-2 w-full justify-end">
                            <h6 class="text-sm">Email</h6>
                            <h6 class="text-sm">oolooaloo@dist.co.ke</h6>
                        </div>
                    </x-card>
                </div> --}}
            </div>

            <div class="">
                <div class="flex justify-between">
                    <h3 class="font-extrabold tracking-wide">Top Picks For You</h3>
                    <h4 class="font-semibold text-sm">See All <i class="fas fa-arrow-circle-right"></i></h4>
                </div>
                <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-4">
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border-gray-200 w-full lg:w-60 h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Gold Bars</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 20 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-full lg:w-60 h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Diamond</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 100 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-full lg:w-60 h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Platinum</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 50 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-full lg:w-60 h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Iron Ore</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 10 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-full lg:w-60 h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Blue Tanzanite</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 3.80 - US $ 6.00</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 50 Pieces</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </script>
</x-main>
