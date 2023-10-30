<x-main>
    <div class="bg-hero bg-[length:400px_400px] md:bg-[length:800px_600px] lg:bg-cover bg-no-repeat lg:h-[500px] -mt-24 pt-24">
        <div class="flex flex-col mx-auto py-8 sm:px-20 md:px-24 lg:px-32 z-50 space-y-3">
            <h1 class="text-2xl md:text-2xl lg:text-4xl font-[600] md:font-[800] lg:font-[1100] text-center hero-main-text text-gray-900">Find The Best Products, From Top Notch Suppliers</h1>
            <h5 class="text-center font-semibold px-8 md:px-12 lg:px-52">Real African Sources is where to go to easily access raw materials and business opportunities from vetted suppliers across Africa.</h5>
            <label for="themeSwitcherThree" class="themeSwitcherThree relative inline-flex cursor-pointer select-none items-center justify-center my-2">
                <input type="checkbox" name="themeSwitcherThree" id="themeSwitcherThree" class="sr-only">

                <div class="shadow-card flex h-[40px] w-[192px] items-center justify-between rounded-full bg-white border border-primary-one p-1" id="switch-toggle" onclick="toggleTheme()">
                    <h4 id="products-toggle" class="bg-primary-one px-4 py-1 rounded-full text-white ml-3 transition duration-200 ease-out font-semibold">Products</h4>
                    <h4 id="vendors-toggle" class="transition duration-200 ease-out mr-4">Vendors</h4>
                </div>
            </label>
            <div class="lg:w-3/5 mx-2 lg:mx-auto relative">
                <livewire:home-main-search />
                {{-- <form class="">
                    <div class="flex">
                        <button id="dropdown-button" data-dropdown-toggle="store-dropdown" data-dropdown-placement="bottom" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-semibold text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
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
                </form> --}}
            </div>
            <div class="lg:w-3/5 mx-2 lg:mx-auto">
            {{-- <div class="lg:w-3/5 mx-2 lg:mx-auto hidden md:block absolute top-[22rem] left-0 lg:top-[17rem] lg:left-[26rem] lg:max-w-[50%]"> --}}
                <div class="flex flex-wrap justify-center lg:justify-start gap-1 lg:gap-2 mt-2">
                    @foreach ($categories as $category)
                        <x-badge class="bg-violet-100 font-semibold" text="{{ $category->name }}"></x-badge>
                    @endforeach
                    <x-badge class="bg-primary-one text-white font-semibold" text="All Categories"></x-badge>
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
                        <h3 class="font-bold text-lg text-gray-600">New Buying Leads</h3>
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
                        <h3 class="font-bold text-lg text-gray-600">New Selling Leads</h3>
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
                    <h3 class="font-bold tracking-wide text-lg text-gray-600">Top Product Picks For You</h3>
                    <h4 class="font-semibold text-sm">See All <i class="fas fa-arrow-circle-right"></i></h4>
                </div>
                <livewire:home-products-list />
            </div>

            <div class="vendors hidden">
                <div class="flex justify-between">
                    <h3 class="font-bold tracking-wide text-lg text-gray-600">Top Vendors Picks For You</h3>
                    <h4 class="font-semibold text-sm">See All <i class="fas fa-arrow-circle-right"></i></h4>
                </div>
                <livewire:home-vendors-list />
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
                productsToggle.classList.add('bg-primary-one', 'px-4', 'py-1', 'rounded-full', 'text-white', 'ml-3', 'font-semibold');
                productsToggle.classList.remove('text-black', 'ml-3')
                vendorsToggle.classList.remove('bg-primary-one', 'px-4', 'py-1', 'rounded-full', 'text-white', 'font-semibold')
                vendorsToggle.classList.add('text-black', 'mr-4')
                productsList.classList.remove('hidden')
                vendorsList.classList.add('hidden')
            } else {
                productsToggle.classList.remove('bg-primary-one', 'px-4', 'py-1', 'rounded-full', 'ml-3', 'text-white', 'font-semibold')
                productsToggle.classList.add('text-black', 'ml-3')
                productsList.classList.add('hidden')
                vendorsToggle.classList.add('bg-primary-one', 'px-4', 'py-1', 'rounded-full', 'text-white', 'font-semibold', 'mr-4')
                vendorsToggle.classList.remove('mr-4')
                vendorsList.classList.remove('hidden')
            }
        }

        switchTheme()
    </script>
</x-main>
