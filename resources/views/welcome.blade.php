<x-main>
    <div class="lg:px-24">
        <div class="grid lg:grid-cols-5 gap-1">
            <div class="hidden lg:block col-span-1">
                <div class="rounded-md mt-4">
                    <livewire:home-categories-view />
                </div>
            </div>
            {{-- <div class="col-span-3 bg-hero bg-[length:400px_400px] md:bg-[length:800px_600px] lg:bg-cover bg-no-repeat lg:h-[400px] mt-4"> --}}
            <div id="default-carousel" class="col-span-3 mt-4 relative w-full" data-carousel="slide">
                <div class="relative h-56 overflow-hidden rounded-lg md:h-[400px]">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/banner.png') }}" alt="" class="absolute lg:h-[400px] lg:object-cover -z-10 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="flex flex-col mx-auto py-8 px-1.5 z-50 space-y-3">
                            <h1 class="text-2xl md:text-2xl lg:text-4xl font-[600] md:font-[800] lg:font-[900] text-center hero-main-text text-gray-900">Find The Best Products, From Top Notch Suppliers</h1>
                            <h5 class="text-center font-semibold px-2">Real African Sources is where to go to easily access raw materials and business opportunities from vetted suppliers across Africa.</h5>
                        </div>
                    </div>
                    <!-- Item 1 -->
                   <div class="hidden duration-700 ease-in-out" data-carousel-item>
                       <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="absolute block lg:h-[400px] lg:object-cover w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                   </div>
                   <!-- Item 2 -->
                   <div class="hidden duration-700 ease-in-out" data-carousel-item>
                       <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="absolute block lg:h-[400px] lg:object-cover w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                   </div>
                   <!-- Item 3 -->
                   <div class="hidden duration-700 ease-in-out" data-carousel-item>
                       <img src="{{ asset('assets/img/auth-alt-five.jpg') }}" class="absolute block lg:h-[400px] lg:object-cover w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                   </div>
                   <!-- Item 4 -->
                   <div class="hidden duration-700 ease-in-out" data-carousel-item>
                       <img src="{{ asset('assets/img/auth-alt-four.jpg') }}" class="absolute block lg:h-[400px] lg:object-cover w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                   </div>
                   <!-- Item 5 -->
                   <div class="hidden duration-700 ease-in-out" data-carousel-item>
                       <img src="{{ asset('assets/img/auth-alt-six.jpg') }}" class="absolute block lg:h-[400px] lg:object-cover w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                   </div>
               </div>
               <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="5"></button>
                </div>
            </div>
            <div class="hidden lg:block col-span-1 mt-4">
                <div class="bg-primary-three rounded-md p-2">
                    <h3 class="font-bold text-xl text-slate-800">Your Buying Requests</h3>
                    <form action="" class="space-y-4">
                        @csrf
                        <!-- Email Address -->
                        <div>
                            <x-text-input id="email" class="block w-full bg-white h-14 border-none focus:border-2 placeholder-gray-400" type="text" name="email" placeholder="Your Email Address" required autocomplete="off" />
                        </div>
                        <div>
                            <x-text-input id="product_name" class="block w-full bg-white h-14 border-none focus:border-2 placeholder-gray-400" type="text" name="product_name" placeholder="Product Name" autocomplete="off" />
                        </div>
                        <textarea name="message" rows="5" class="w-full border border-gray-300 rounded-lg placeholder-gray-400" placeholder="Your Message Here, can include product description, size, etc..."></textarea>
                        <x-primary-button class="w-full py-2">Submit</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 lg:px-24 mt-14 lg:mt-5 w-full">
        <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-2">
            <div class="">
                <div class="md:flex gap-1">
                    <h3 class="font-bold text-lg text-gray-600">New Buying Leads</h3>
                    <h4 class="text-lg">(12)</h4>
                </div>
                <div class="relative" id="default-carousel" data-carousel="static">
                    <div class="relative overflow-hidden rounded-lg h-40">
                        <div class="hidden" data-carousel-item>
                            <div class="grid grid-cols-3 space-x-1 ml-2 mr-2 pl-10 border border-gray-300 rounded-md p-5 h-40 min-h-[128px]">
                                <div class="space-y-6 w-40 my-auto">
                                    <div class="flex gap-2">
                                        <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                        <div class="my-auto">
                                            <h5 class="text-sm my-auto">Uganda</h5>
                                            <p class="text-xs text-gray-400">31-07-2023</p>
                                        </div>
                                    </div>
                                    <h4 class="text-sm text-gray-500">We Buy Crude Oil</h4>
                                </div>
                                <div class="space-y-6 w-40 my-auto">
                                    <div class="flex gap-2">
                                        <img src="https://flagcdn.com/w40/ng.png" srcset="https://flagcdn.com/w40/ng.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                        <div class="my-auto">
                                            <h5 class="text-sm my-auto">Nigeria</h5>
                                            <p class="text-xs text-gray-400">31-07-2023</p>
                                        </div>
                                    </div>
                                    <h4 class="text-sm text-gray-500 whitespace-normal">We Buy Refined Coconut Oil</h4>
                                </div>
                                <div class="space-y-6 pr-2 w-40 my-auto">
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
                                <div class="space-y-6 pr-2 w-40 my-auto">
                                    <div class="flex gap-2">
                                        <img src="https://flagcdn.com/w40/tz.png" srcset="https://flagcdn.com/w40/tz.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                        <div class="my-auto">
                                            <h5 class="text-sm my-auto">Tanzania</h5>
                                            <p class="text-xs text-gray-400">31-07-2023</p>
                                        </div>
                                    </div>
                                    <h4 class="text-sm text-gray-500">We Buy Crude Oil</h4>
                                </div>
                                <div class="space-y-6 pr-2 w-40 my-auto">
                                    <div class="flex gap-2">
                                        <img src="https://flagcdn.com/w40/za.png" srcset="https://flagcdn.com/w40/za.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                        <div class="my-auto">
                                            <h5 class="text-sm my-auto">South Africa</h5>
                                            <p class="text-xs text-gray-400">31-07-2023</p>
                                        </div>
                                    </div>
                                    <h4 class="text-sm text-gray-500 whitespace-normal">We Buy Refined Coconut Oil</h4>
                                </div>
                                <div class="space-y-6 pr-2 w-40 my-auto">
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
            <div class="">
                <div class="flex gap-1">
                    <h3 class="font-bold text-lg text-gray-600">New Selling Leads</h3>
                    <h4 class="text-lg">(387)</h4>
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
                                <div class="space-y-6 w-40 my-auto">
                                    <div class="flex gap-2">
                                        <img src="https://flagcdn.com/w40/cd.png" srcset="https://flagcdn.com/w40/cd.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                        <div class="my-auto">
                                            <h5 class="text-sm my-auto">DRC</h5>
                                            <p class="text-xs text-gray-400">31-07-2023</p>
                                        </div>
                                    </div>
                                    <h4 class="text-sm text-gray-500 whitespace-normal">We Sell Diamonds</h4>
                                </div>
                                <div class="space-y-6 pr-2 w-40 my-auto">
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
                                <div class="space-y-6 pr-2 w-40 my-auto">
                                    <div class="flex gap-2">
                                        <img src="https://flagcdn.com/w40/rw.png" srcset="https://flagcdn.com/w40/rw.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                        <div class="my-auto">
                                            <h5 class="text-sm my-auto">Rwanda</h5>
                                            <p class="text-xs text-gray-400">31-07-2023</p>
                                        </div>
                                    </div>
                                    <h4 class="text-sm text-gray-500">We Sell Gold</h4>
                                </div>
                                <div class="space-y-6 pr-2 w-40 my-auto">
                                    <div class="flex gap-2">
                                        <img src="https://flagcdn.com/w40/za.png" srcset="https://flagcdn.com/w40/za.png 2x" alt="" class="w-8 h-8 rounded-full object-cover">
                                        <div class="my-auto">
                                            <h5 class="text-sm my-auto">South Africa</h5>
                                            <p class="text-xs text-gray-400">31-07-2023</p>
                                        </div>
                                    </div>
                                    <h4 class="text-sm text-gray-500 whitespace-normal">We Sell Bananas</h4>
                                </div>
                                <div class="space-y-6 pr-2 w-40 my-auto">
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
        </div>
    </div>
    <div class="px-4 lg:px-24 lg:flex gap-10 mt-5 w-full">
        <div class="space-y-2 py-2">
            <div class="flex text-sm px-2">
                <i class="fas fa-map-marker-alt my-auto text-red-600 mr-1"></i>
                <h2 class="font-extrabold text-gray-500 truncate">Show products/suppliers available in</h2>
            </div>
            <livewire:home-countries-view />
        </div>
    </div>
    <div class="px-4 lg:px-24">
        <label for="themeSwitcherThree" class="themeSwitcherThree relative inline-flex cursor-pointer select-none items-center justify-center my-2">
            <input type="checkbox" name="themeSwitcherThree" id="themeSwitcherThree" class="sr-only">
            <div class="shadow-card flex h-[40px] w-[192px] items-center justify-between gap-2" id="switch-toggle" onclick="toggleTheme()">
                <h4 id="products-toggle" class="bg-orange-200 border-2 border-primary-one px-4 py-1 rounded-full text-primary-one ml-3 transition duration-200 ease-out font-semibold">Products</h4>
                <h4 id="vendors-toggle" class="border-2 border-gray-400 px-4 py-1 rounded-full transition duration-200 ease-out mr-4">Vendors</h4>
            </div>
        </label>

        <h3 class="font-bold tracking-wide text-lg text-gray-600">Top Picks For You</h3>
    </div>
    <div class="px-4 lg:px-24 mt-5">
        <div class="products">
            <div class="flex justify-between">
                <h4 class="font-semibold text-sm">See All <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <livewire:home-products-list />
        </div>

        <div class="vendors hidden">
            <div class="flex justify-between">
                <h4 class="font-semibold text-sm">See All <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <livewire:home-vendors-list />
        </div>
    </div>

    <div class="px-2 md:px-8 lg:px-24 my-5">
        <div class="bg-black rounded-lg w-full md:h-[30%] md:flex">
            <div class="basis-1/2 flex flex-col space-y-4 p-12">
                <h3 class="text-white font-[900] text-4xl text-center md:text-left">Popular Suppliers</h3>
                <span class="text-white text-xl font-bold text-center md:text-left">Discover the best Products</span>
                <button class="bg-white rounded-full w-full lg:w-[50%] py-2 font-semibold">View More</button>
            </div>
            <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="basis-1/2 w-full md:h-[310px] lg:h-[280px] object-cover rounded-tr-lg rounded-br-lg" alt="">
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
                productsToggle.classList.add('bg-orange-200', 'border-primary-one', 'text-primary-one');
                productsList.classList.remove('hidden', 'border-gray-400')
                productsToggle.classList.remove('text-black')
                vendorsToggle.classList.remove('bg-orange-200', 'border-primary-one', 'text-primary-one')
                vendorsToggle.classList.add('text-black', 'border-gray-400')
                vendorsList.classList.add('hidden')
            } else {
                productsToggle.classList.remove('bg-orange-200', 'border-primary-one', 'text-primary-one')
                productsToggle.classList.add('text-black', 'border-gray-400')
                productsList.classList.add('hidden')
                vendorsToggle.classList.add('bg-orange-200', 'border-primary-one', 'text-primary-one')
                vendorsList.classList.remove('hidden')
            }
        }

        switchTheme()
    </script>
</x-main>
