<x-main>
    <div class="bg-hero bg-cover bg-no-repeat lg:h-[500px] -mt-24 pt-24">
        <div class="flex flex-col mx-auto py-8 sm:px-20 md:px-24 lg:px-32 z-50 space-y-3">
            <h1 class="text-2xl md:text-2xl lg:text-4xl font-[600] md:font-[800] lg:font-[1100] text-center hero-main-text">Find The Best Products, From Top Notch Suppliers</h1>
            <h5 class="text-center font-semibold px-8 md:px-12 lg:px-52">Real African Sources is where to go to easily access raw materials and business opportunities from vetted suppliers across Africa.</h5>
            <label for="themeSwitcherThree" class="themeSwitcherThree relative inline-flex cursor-pointer select-none items-center justify-center my-2">
                <input type="checkbox" name="themeSwitcherThree" id="themeSwitcherThree" class="sr-only">

                <div class="shadow-card flex h-[40px] w-[186px] items-center justify-between rounded-full bg-white border border-orange-500" id="switch-toggle" onclick="toggleTheme()">
                    <h4 id="products-toggle" class="bg-orange-500 px-4 py-1 rounded-full text-white ml-1 transition duration-200 ease-out font-semibold">Products</h4>
                    <h4 id="vendors-toggle" class="mr-2 transition duration-200 ease-out">Vendors</h4>
                </div>
            </label>
            <div class="lg:w-3/5 mx-2 lg:mx-auto">
                <form class="">
                    <div class="flex">
                        <button id="dropdown-button" data-dropdown-toggle="store-dropdown" data-dropdown-placement="bottom" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-bold text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
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
                            <input type="search" id="search-dropdown" class="pl-10 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-200 placeholder:font-semibold focus:ring-primary-one focus:border-primary-one dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-primary-one transition duration-250" placeholder="What Are You Looking For..." required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="lg:w-3/5 mx-2 lg:mx-auto">
                <div class="flex flex-wrap justify-center lg:justify-start gap-1 lg:gap-2 mt-2">
                    @foreach ($categories as $category)
                        <x-badge class="bg-violet-100 font-semibold" text="{{ $category->name }}"></x-badge>
                    @endforeach
                    <x-badge class="bg-orange-500 text-white font-semibold" text="All Categories"></x-badge>
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
                <livewire:home-countries-view />
            </div>
        </div>
        <div class="basis-5/6 space-y-2">
            <div class="hidden md:grid md:grid-cols-1 lg:grid-cols-2 4xl:flex">
                <div class="4xl:basis-1/2">
                    <div class="md:flex gap-1">
                        <h3 class="font-semibold text-lg">New Buying Leads</h3>
                        <h4 class="font-thin text-lg">(12)</h4>
                    </div>
                    <div class="relative" id="default-carousel" data-carousel="static">
                        <div class="relative overflow-hidden rounded-lg h-40">
                            <div class="hidden" data-carousel-item>
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 rounded-md p-5 h-40 min-h-[128px]">
                                    <div class="space-y-6 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Uganda</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Buy Crude Oil</h4>
                                    </div>
                                    <div class="space-y-6 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/ng.png" srcset="https://flagcdn.com/w40/ng.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Nigeria</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Buy Refined Coconut Oil</h4>
                                    </div>
                                    <div class="space-y-6 w-32 my-auto">
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
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 rounded-md p-5 h-40 min-h-[128px]">
                                    <div class="space-y-6 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/tz.png" srcset="https://flagcdn.com/w40/tz.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Tanzania</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Buy Crude Oil</h4>
                                    </div>
                                    <div class="space-y-6 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/za.png" srcset="https://flagcdn.com/w40/za.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">South Africa</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Buy Refined Coconut Oil</h4>
                                    </div>
                                    <div class="space-y-6 w-32 my-auto">
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
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="4xl:basis-1/2">
                    <div class="flex gap-1">
                        <h3 class="font-semibold text-lg">New Selling Leads</h3>
                        <h4 class="font-thin text-lg">(387)</h4>
                    </div>
                    <div class="relative" id="default-carousel" data-carousel="static">
                        <div class="relative overflow-hidden rounded-lg h-40">
                            <div class="hidden" data-carousel-item>
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 h-40 min-h-[128px] rounded-md p-5">
                                    <div class="space-y-6 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/gh.png" srcset="https://flagcdn.com/w40/gh.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Ghana</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Sell Oil</h4>
                                    </div>
                                    <div class="space-y-6 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/cd.png" srcset="https://flagcdn.com/w40/cd.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">DRC</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Sell Diamonds</h4>
                                    </div>
                                    <div class="space-y-6 w-32 my-auto">
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
                                <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 rounded-md p-5 h-40 min-h-[128px]">
                                    <div class="space-y-6 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/rw.png" srcset="https://flagcdn.com/w40/rw.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">Rwanda</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500">We Sell Gold</h4>
                                    </div>
                                    <div class="space-y-6 pr-2 w-32 my-auto">
                                        <div class="flex gap-2">
                                            <img src="https://flagcdn.com/w40/za.png" srcset="https://flagcdn.com/w40/za.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                            <div class="my-auto">
                                                <h5 class="text-sm my-auto">South Africa</h5>
                                                <p class="text-xs text-gray-400">31-07-2023</p>
                                            </div>
                                        </div>
                                        <h4 class="text-sm text-gray-500 whitespace-normal">We Sell Bananas</h4>
                                    </div>
                                    <div class="space-y-6 w-32 my-auto">
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
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <i class="fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                @auth
                    <div class="hidden 4xl:block 4xl:basis-1/3">
                        <div class="flex gap-1">
                            <h3 class="font-semibold text-lg">Your Buying Requests</h3>
                        </div>
                        <div class="bg-gray-200 rounded-md p-2">
                            <div class="flex gap-2 w-full justify-end">
                                <h6 class="text-sm">Email:</h6>
                                <h6 class="text-sm font-bold">oolooaloo@dist.co.ke</h6>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </div>
                            <textarea name="" rows="3" class="w-full border border-gray-300 rounded-lg placeholder-gray-400" placeholder="Enter Your Message Here..."></textarea>
                            <x-primary-button class="w-full">Submit</x-primary-button>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="products">
                <div class="flex justify-between">
                    <h3 class="font-extrabold tracking-wide">Top Product Picks For You</h3>
                    <h4 class="font-semibold text-sm">See All <i class="fas fa-arrow-circle-right"></i></h4>
                </div>
                <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 4xl:grid-cols-5 gap-2 py-4">
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border-gray-200 w-full h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Gold Bars</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 20 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Diamond</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 100 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Platinum</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 50 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Iron Ore</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 10 Pieces</h5>
                            </div>
                        </a>
                    </div>
                    <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                        <a href="{{ route('product') }}">
                            <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                            <div class="">
                                <h4 class="font-extrabold text-gray-500">Blue Tanzanite</h4>
                                <h4 class="font-extrabold uppercase text-gray-700">US $ 3.80 - US $ 6.00</h4>
                                <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 50 Pieces</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="vendors hidden">
                <div class="flex justify-between">
                    <h3 class="font-extrabold tracking-wide">Top Vendors Picks For You</h3>
                    <h4 class="font-semibold text-sm">See All <i class="fas fa-arrow-circle-right"></i></h4>
                </div>
                <div class="grid md:grid-cols-1 lg:grid-cols-2 4xl:grid-cols-3 gap-4 py-4">
                    <x-card class="border-2 border-gray-400 grid md:grid-cols-2 gap-1">
                        <div>
                            <a href="{{ route('vendor.storefront') }}">
                                <div class="flex gap-1">
                                    <span class="w-12 h-12 bg-gray-300 rounded-full text-center pt-3 font-bold text-white">E</span>
                                    <div class="">
                                        <h1 class="font-bold text-sm">Enock's Mining Co.</h1>
                                        <div class="flex gap-2">
                                            <h4 class="text-xs text-gray-500">Verified</h4>
                                            <i class="fas fa-shield-alt text-sm text-red-800"></i>
                                        </div>
                                        <h5 class="text-xs text-gray-400">2 Years</h5>
                                    </div>
                                </div>
                            </a>
                            <div class="flex gap-2">
                                <h4 class="text-sm font-bold text-gray-600">Rating:</h4>
                                <div class="review__info">
                                    <div class="review__star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span style="width: 40%">
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                        </span>
                                     </div>
                                </div>
                            </div>
                            <div class="">
                                <h4 class="text-sm font-bold text-gray-600">Vendor Info:</h4>
                                <div class="flex flex-col gap-1">
                                    <span class="text-sm">
                                        <strong>HQ:</strong> Nairobi Industrial Area
                                    </span>
                                    <span class="text-sm">
                                        <strong>Products:</strong> Gold, Diamond, Platinum
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-full h-44 object-cover rounded-md">
                            <x-secondary-outline-button class="text-center bg-orange-500 text-orange-600 tracking-tighter font-thin justify-center hover:bg-orange-300 hover:border-orange-400">
                                Message Vendor
                            </x-secondary-outline-button>
                        </div>
                    </x-card>
                    <x-card class="border-2 border-gray-400 grid md:grid-cols-2">
                        <div>
                            <a href="{{ route('vendor.storefront') }}">
                                <div class="flex gap-1">
                                    <span class="w-12 h-12 bg-gray-300 rounded-full text-center pt-3 font-bold text-white">N</span>
                                    <div class="">
                                        <h1 class="font-bold text-sm">Neptune Traders.</h1>
                                        <div class="flex gap-2">
                                            <h4 class="text-xs text-gray-500">Verified</h4>
                                            <i class="fas fa-shield-alt text-sm text-red-800"></i>
                                        </div>
                                        <h5 class="text-xs text-gray-500">3 Years</h5>
                                    </div>
                                </div>
                            </a>
                            <div class="flex gap-2">
                                <h4 class="text-sm font-bold text-gray-600">Rating:</h4>
                                <div class="review__info">
                                    <div class="review__star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span style="width: 60%">
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                        </span>
                                     </div>
                                </div>
                            </div>
                            <div class="">
                                <h4 class="text-sm font-bold text-gray-600">Vendor Info:</h4>
                                <div class="flex flex-col gap-2">
                                    <span class="text-sm">
                                        <strong>HQ:</strong> Nairobi Industrial Area
                                    </span>
                                    <span class="text-sm">
                                        <strong>Products:</strong> Minerals
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <img src="{{ asset('assets/img/6CeuCO.jpg') }}" alt="" class="w-full h-44 object-cover rounded-md">
                            <x-secondary-outline-button class="text-center bg-orange-500 text-orange-600 tracking-tighter font-thin justify-center hover:bg-orange-300 hover:border-orange-400">
                                Message Vendor
                            </x-secondary-outline-button>
                        </div>
                    </x-card>
                    <x-card class="border-2 border-gray-400 grid md:grid-cols-2">
                        <div>
                            <a href="{{ route('vendor.storefront') }}">
                                <div class="flex gap-1">
                                    <span class="w-12 h-12 bg-gray-300 rounded-full text-center pt-3 font-bold text-white">E</span>
                                    <div class="">
                                        <h1 class="font-bold text-sm">Imani Fluid Co.</h1>
                                        <div class="flex gap-2">
                                            <h4 class="text-xs text-gray-500">Verified</h4>
                                            <i class="text-sm fas fa-shield-alt text-red-800"></i>
                                        </div>
                                        <h5 class="text-xs text-gray-500">1 Years</h5>
                                    </div>
                                </div>
                            </a>
                            <div class="flex gap-2">
                                <h4 class="text-sm font-bold text-gray-600">Rating:</h4>
                                <div class="review__info">
                                    <div class="review__star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span style="width: 30%">
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                        </span>
                                     </div>
                                </div>
                            </div>
                            <div class="">
                                <h4 class="text-sm font-bold text-gray-600">Vendor Info:</h4>
                                <div class="flex flex-col gap-2">
                                    <span class="text-sm">
                                        <strong>HQ:</strong> Nairobi Industrial Area
                                    </span>
                                    <span class="text-sm">
                                        <strong>Products:</strong> Gold, Mercury
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" alt="" class="w-full h-44 object-cover rounded-md">
                            <x-secondary-outline-button class="text-center bg-orange-500 text-orange-600 tracking-tighter font-thin justify-center hover:bg-orange-300 hover:border-orange-400">
                                Message Vendor
                            </x-secondary-outline-button>
                        </div>
                    </x-card>
                    <x-card class="border-2 border-gray-400 grid md:grid-cols-2">
                        <div>
                            <a href="{{ route('vendor.storefront') }}">
                                <div class="flex gap-1">
                                    <span class="w-12 h-12 bg-gray-300 rounded-full text-center pt-3 font-bold text-white">E</span>
                                    <div class="">
                                        <h1 class="font-bold text-sm">Kraken Traders</h1>
                                        <div class="flex gap-2">
                                            <h4 class="text-xs text-gray-500">Verified</h4>
                                            <i class="fas fa-shield-alt text-red-800 text-sm"></i>
                                        </div>
                                        <h5 class="text-xs text-gray-500">1.2 Years</h5>
                                    </div>
                                </div>
                            </a>
                            <div class="flex gap-2">
                                <h4 class="text-sm font-bold text-gray-600">Rating:</h4>
                                <div class="review__info">
                                    <div class="review__star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span style="width: 50%">
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                           <i class="fas fa-star"></i>
                                        </span>
                                     </div>
                                </div>
                            </div>
                            <div class="">
                                <h4 class="text-sm font-bold text-gray-600">Vendor Info:</h4>
                                <div class="flex flex-col gap-2">
                                    <span class="text-sm">
                                        <strong>HQ:</strong> Nairobi Industrial Area
                                    </span>
                                    <span class="text-sm">
                                        <strong>Products:</strong> Gold, Diamond, Platinum
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-full h-44 object-cover rounded-md">
                            <x-secondary-outline-button class="text-center bg-orange-500 text-orange-600 tracking-tighter font-thin justify-center hover:bg-orange-300 hover:border-orange-400">
                                Message Vendor
                            </x-secondary-outline-button>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
    <script>
        const switchToggle = document.querySelector('#switch-toggle');
        const productsToggle = document.querySelector('#products-toggle');
        const vendorsToggle = document.querySelector('#vendors-toggle');
        const productsList = document.querySelector('.products')
        const vendorsList = document.querySelector('.vendors')
        let isProductmode = true

        function toggleTheme (){
            isProductmode = !isProductmode
            localStorage.setItem('isProductmode', isProductmode)
            switchTheme()
        }

        function switchTheme (){
            if (isProductmode) {
                productsToggle.classList.add('bg-orange-500', 'px-4', 'py-1', 'rounded-full', 'text-white', 'ml-1', 'font-semibold');
                productsToggle.classList.remove('text-black', 'ml-2')
                vendorsToggle.classList.remove('bg-orange-500', 'px-4', 'py-1', 'rounded-full', 'text-white', 'font-semibold')
                vendorsToggle.classList.add('text-black', 'mr-2')
                productsList.classList.remove('hidden')
                vendorsList.classList.add('hidden')
            } else {
                productsToggle.classList.remove('bg-orange-500', 'px-4', 'py-1', 'rounded-full', 'ml-1', 'text-white', 'font-semibold')
                productsToggle.classList.add('text-black', 'ml-2')
                productsList.classList.add('hidden')
                vendorsToggle.classList.add('bg-orange-500', 'px-4', 'py-1', 'rounded-full', 'text-white', 'mr-1', 'font-semibold')
                vendorsToggle.classList.remove('mr-2')
                vendorsList.classList.remove('hidden')
            }
        }

        switchTheme()
    </script>
</x-main>
