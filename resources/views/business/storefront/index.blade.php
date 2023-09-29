<x-vendor>
    <x-storefront-header :business="$business"></x-storefront-header>
    <div>
        <img src="{{ $business->primary_cover_image }}" alt="" class="h-96 w-full object-cover">
    </div>
    <div class="flex gap-3 px-2 md:px-8 lg:px-28 py-4">
        @if ($business->secondary_cover_image)
            <div class="hidden lg:block lg:basis-1/4">
                <img src="{{ $business->secondary_cover_image }}" class="w-96 h-96 rounded-lg object-cover" alt="">
            </div>
        @endif
        <div class="w-full text-center lg:text-start lg:basis-3/4">
            <h1 class="text-3xl font-bold text-slate-700">We Strive to Ship the Best Products Globally</h1>
            <div class="flex gap-2 justify-center lg:justify-start">
                <h2 class="text-sm my-auto">15 Years Experience</h2>
                <span class="uppercase text-gray-400 text-xl">I</span>
                <h2 class="text-sm my-auto">Releasing Over 2000 products per year</h2>
            </div>
            <div class="space-y-4">
                <span class="text-sm">Avg Response Time: <span class="text-green-400">&#60;24Hrs</span></span>
                <div class="flex justify-center lg:justify-start space-x-3">
                    <button class="font-semibold px-10 py-0.5 bg-primary-one border border-primary-one text-white rounded-full hover:bg-orange-800 hover:border-orange-800">Make Inquiry</button>
                    <button class="font-semibold px-10 py-0.5 border border-primary-one text-primary-one rounded-full hover:bg-orange-200">Chat</button>
                </div>
            </div>
            <div class="mt-10">
                <h4 class="text-sm font-bold">Our Advantages</h4>
                <p class="text-xs mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt optio vitae quam corrupti eius fuga, sunt sint magni, atque sapiente eos sequi veritatis porro nisi totam dolore numquam tenetur minus. Quos velit maiores, ea numquam reiciendis veniam voluptatum blanditiis, aut ratione mollitia omnis minus nisi vero incidunt, tenetur tempora sed?</p>
            </div>
            <div class="mt-10">
                <h4 class="text-sm font-bold">Contact Us</h4>
                <p class="text-xs mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium, eos repellendus autem voluptas maxime magni velit facere eum, doloremque ab quam excepturi labore laboriosam sapiente accusantium accusamus corporis nobis dignissimos.</p>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        <div class="px-2 md:px-8 lg:px-28">
            <div class="flex justify-between">
                <h3 class="font-bold tracking-wide">Product Groups</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="block md:flex md:justify-between bg-rose-100 gap-2 px-4 py-4 rounded-lg">
                <div>
                    <img src="{{ asset('assets/img/Logo.png') }}" class="rounded-full w-36 h-36 md:w-28 md:h-28 lg:w-36 lg:h-36 object-cover mx-auto md:mx-0" alt="">
                    <h4 class="font-bold text-center text-gray-800">Gold</h4>
                </div>
                <div>
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded-full w-36 h-36 md:w-28 md:h-28 lg:w-36 lg:h-36 object-cover mx-auto md:mx-0" alt="">
                    <h4 class="font-bold text-center text-gray-800">Diamond</h4>
                </div>
                <div>
                    <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded-full w-36 h-36 md:w-28 md:h-28 lg:w-36 lg:h-36 object-cover mx-auto md:mx-0" alt="">
                    <h4 class="font-bold text-center text-gray-800">Gemstone</h4>
                </div>
                <div class="hidden md:block">
                    <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded-full w-36 h-36 md:w-28 md:h-28 lg:w-36 lg:h-36 object-cover mx-auto md:mx-0" alt="">
                    <h4 class="font-bold text-center text-gray-800">Tanzanite</h4>
                </div>
                <div class="hidden md:block">
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded-full w-36 h-36 md:w-28 md:h-28 lg:w-36 lg:h-36 object-cover mx-auto md:mx-0" alt="">
                    <h4 class="font-bold text-center text-gray-800">Mercury</h4>
                </div>
                <div class="hidden lg:block">
                    <img src="{{ asset('assets/img/Logo.png') }}" class="rounded-full w-36 h-36 md:w-28 md:h-28 lg:w-36 lg:h-36 object-cover mx-auto md:mx-0" alt="">
                    <h4 class="font-bold text-center text-gray-800">Platinum</h4>
                </div>
            </div>
        </div>
        <div class="px-2 md:px-8 lg:px-28">
            <div class="flex justify-between">
                <h3 class="font-bold tracking-wide">Best Sellers</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-4">
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Gold Bars</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 20 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Diamond</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 100 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Platinum</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Iron Ore</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 10 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Blue Tanzanite</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 3.80 - US $ 6.00</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2 md:px-8 lg:px-28">
            <div class="flex justify-between">
                <h3 class="font-bold tracking-wide">New Products</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-4">
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Gold Bars</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 20 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Uranium</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 100 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Platinum</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Iron Ore</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 10 Pieces</h5>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-full h-52 object-cover" alt="">
                    <div class="">
                        <h4 class="font-bold text-gray-500">Blue Tanzanite</h4>
                        <h4 class="font-bold uppercase text-gray-700">US $ 3.80 - US $ 6.00</h4>
                        <h5 class="text-sm text-gray-500 font-bold">Minimum Order: 50 Pieces</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-vendor>
