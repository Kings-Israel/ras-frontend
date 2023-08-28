<x-vendor>
    <div class="mx-auto px-32 py-6 border-t-2 border-gray-200">
        <div class="h-10 flex justify-between">
            <div class="flex gap-1">
                <span class="w-12 h-12 bg-gray-300 rounded-full text-center pt-3 font-bold text-white">E</span>
                <div class="-space-y-1">
                    <h1 class="font-bold text-sm">Enock's Mining Co.</h1>
                    <h4 class="text-sm text-gray-400">Verified</h4>
                    <h5 class="text-sm text-gray-500">2 Years</h5>
                </div>
            </div>
            <form class="w-2/5 my-auto">
                <div class="flex">
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                        This Store
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
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
                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 transition duration-250" placeholder="What Are You Looking For..." required>
                        <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-orange-400 rounded-r-lg border border-orange-400 hover:bg-orange-400 focus:ring-2 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                            <span>Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-red-800 mx-auto px-32 py-2">
        <div class="h-8 flex">
            <ul class="list-desc flex gap-8 text-white font-sans my-auto">
                <li class="font-bold">Home</li>
                <li>Products</li>
                <li>Compliance Documents</li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
    <div>
        <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="h-96 w-full object-cover">
    </div>
    <div class="flex gap-3 px-28 py-4">
        <div class="basis-1/4">
            <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="w-96 h-96 rounded-lg object-cover" alt="">
        </div>
        <div class="basis-3/4">
            <h1 class="font-black text-2xl text-gray-700">We Strive to Ship the Best Products Globally</h1>
            <div class="flex gap-2">
                <h2 class="text-sm my-auto">15 Years Experience</h2>
                <span class="uppercase text-gray-400 text-xl">I</span>
                <h2 class="text-sm my-auto">Releasing Over 2000 products per year</h2>
            </div>
            <div>
                <span class="text-sm">Avg Response Time: <span class="text-green-400">&#60;24Hrs</span></span>
                <div class="flex space-x-3">
                    <x-primary-button class="h-5 font-extralight tracking-tighter px-20 -pt-2 pb-6 bg-orange-400 border border-orange-400 text-white rounded-full hover:bg-orange-800 hover:border-orange-800">Make Inquiry</x-primary-button>
                    <x-primary-outline-button class="h-5 font-extralight tracking-tighter px-20 py-3 text-orange-400 rounded-3xl">Chat</x-primary-outline-button>
                </div>
            </div>
            <div class="mt-10">
                <h4 class="text-sm font-extrabold">Our Advantages</h4>
                <p class="text-xs mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt optio vitae quam corrupti eius fuga, sunt sint magni, atque sapiente eos sequi veritatis porro nisi totam dolore numquam tenetur minus. Quos velit maiores, ea numquam reiciendis veniam voluptatum blanditiis, aut ratione mollitia omnis minus nisi vero incidunt, tenetur tempora sed?</p>
            </div>
            <div class="mt-10">
                <h4 class="text-sm font-extrabold">Contact Us</h4>
                <p class="text-xs mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium, eos repellendus autem voluptas maxime magni velit facere eum, doloremque ab quam excepturi labore laboriosam sapiente accusantium accusamus corporis nobis dignissimos.</p>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        <div class="px-28">
            <div class="flex justify-between">
                <h3 class="font-extrabold tracking-wide">Product Groups</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="flex justify-between bg-rose-100 gap-2 px-4 py-4 rounded-lg">
                <div>
                    <img src="{{ asset('assets/img/Logo.png') }}" class="rounded-full w-36 h-36 object-cover" alt="">
                    <h4 class="font-extrabold text-center text-gray-800">Gold</h4>
                </div>
                <div>
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-36 h-36 object-cover" alt="">
                    <h4 class="font-extrabold text-center text-gray-800">Diamond</h4>
                </div>
                <div>
                    <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded-full w-36 h-36 object-cover" alt="">
                    <h4 class="font-extrabold text-center text-gray-800">Gemstone</h4>
                </div>
                <div>
                    <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded-full w-36 h-36 object-cover" alt="">
                    <h4 class="font-extrabold text-center text-gray-800">Tanzanite</h4>
                </div>
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded-full w-36 h-36 object-cover" alt="">
                    <h4 class="font-extrabold text-center text-gray-800">Mercury</h4>
                </div>
                <div>
                    <img src="{{ asset('assets/img/Logo.png') }}" class="rounded-full w-36 h-36 object-cover" alt="">
                    <h4 class="font-extrabold text-center text-gray-800">Platinum</h4>
                </div>
            </div>
        </div>
        <div class="px-28">
            <div class="flex justify-between">
                <h3 class="font-extrabold tracking-wide">Best Sellers</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="flex justify-between gap-2 py-4">
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Gold Bars</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 20 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Diamond</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 100 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Platinum</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Iron Ore</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 10 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Blue Tanzanite</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 3.80 - US $ 6.00</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-28">
            <div class="flex justify-between">
                <h3 class="font-extrabold tracking-wide">New Products</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="flex justify-between gap-2 py-4">
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Gold Bars</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 20 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Uranium</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 100 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Platinum</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Iron Ore</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 10 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-56 h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-extrabold text-gray-500">Blue Tanzanite</h4>
                        <h4 class="font-extrabold uppercase text-gray-700">US $ 3.80 - US $ 6.00</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-vendor>
