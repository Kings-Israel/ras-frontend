<x-main>
    <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-20 z-30">
        <form class="md:w-2/5 md:my-auto">
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="store-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-800 space-x-3" type="button">
                    <i class="fas fa-bars"></i>
                    <span class="">
                        Categories
                    </span>
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
            </div>
        </form>
    </div>
    <div class="mx-auto px-4 md:px-10 lg:px-40 my-5">
        <span class="flex gap-2 text-sm">
            <p class="text-gray-400">Home ></p>
            <p class="text-gray-400">Natural Resources ></p>
            <p class="text-gray-400">Minerals ></p>
            <p class="text-gray-600">Gold</p>
        </span>
        <div class="md:grid md:grid-cols-2 lg:flex gap-3 mt-3">
            <div class="bg-gray-50 p-2">
                <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-[290px] h-[350px] mx-auto md:w-[390px] md:h-[450px] md:mx-0 object-cover rounded-md">
                <div class="flex justify-between mt-2 mx-8 md:mx-0">
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-20 h-20 lg:w-28 lg:h-28 object-cover rounded-md border border-orange-400">
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-20 h-20 lg:w-28 lg:h-28 object-cover rounded-md border border-orange-400">
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-20 h-20 lg:w-28 lg:h-28 object-cover rounded-md border border-orange-400">
                </div>
            </div>
            <div class="space-y-4 bg-gray-50 p-2 rounded-md">
                <h2 class="text-xl font-bold text-gray-600">24K Gold Plated Customized Metal Bar</h2>
                <div class="border-b-2 space-y-2 lg:space-y-5 pb-6">
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Rating:</h4>
                        <div class="review__info">
                            <div class="review__star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span style="width: 40%">
                                   <i class="fa fa-star"></i>
                                   <i class="fa fa-star"></i>
                                   <i class="fa fa-star"></i>
                                   <i class="fa fa-star"></i>
                                   <i class="fa fa-star"></i>
                                </span>
                             </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Brand:</h4>
                        <div class="flex gap-3">
                            <h4 class="text-sm font-semibold text-blue-500">Raw Material</h4>
                            <h4 class="text-sm font-bold text-gray-400">I</h4>
                            <h4 class="text-sm font-semibold text-blue-500">Similar Products from Enock's Mining Co.</h4>
                        </div>
                    </div>
                    <div class="border border-gray-300 p-3 px-5 rounded-lg mt-2 bg-white">
                        <div class="flex gap-2 justify-between">
                            <div class="flex flex-col gap-1">
                                <h4 class="font-semibold text-gray-400">10 - 39 Pieces</h4>
                                <h5 class="font-bold text-gray-600">$5.03</h5>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h4 class="font-semibold text-gray-400">40 - 69 Pieces</h4>
                                <h5 class="font-bold text-gray-600">$3.40</h5>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h4 class="font-semibold text-gray-400">70 Pieces</h4>
                                <h5 class="font-bold text-gray-600">$2.38</h5>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Benefits:</h4>
                        <div class="flex gap-1">
                            <h4 class="text-sm font-semibold text-gray-500">Quick Refunds on Orders Under</h4>
                            <h4 class="text-sm font-semibold text-blue-500">$500.</h4>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Color:</h4>
                        <div class="flex gap-3">
                            <h4 class="text-sm font-semibold text-gray-500">Gold</h4>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Samples:</h4>
                        <div class="flex gap-1">
                            <h4 class="text-sm font-semibold text-gray-500">$20.00/piece</h4>
                            <h4 class="text-sm font-semibold text-gray-500">Min. Order: 1 Piece</h4>
                            <h4 class="text-sm font-semibold text-blue-500">Buy Samples</h4>
                        </div>
                    </div>
                </div>
                <div class="space-y-2 lg:space-y-5">
                    <h3 class="text-bold text-gray-600">Purchase Details</h3>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Payments:</h4>
                        <div class="flex gap-1">
                            <h4 class="text-sm font-semibold text-blue-500">VISA</h4>
                            <h4 class="text-sm font-semibold text-blue-500">MASTERCARD</h4>
                            <h4 class="text-sm font-semibold text-blue-500">MPESA</h4>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Delivery Time:</h4>
                        <div class="flex flex-col gap-1">
                            <h4 class="text-sm font-semibold text-gray-500">Express: 6 - 8 Days</h4>
                            <h4 class="text-sm font-semibold text-gray-500">Standard: 10 - 16 Days</h4>
                        </div>
                    </div>
                    <div class="flex">
                        <h4 class="text-sm font-bold text-gray-600">Returns And Refunds:</h4>
                        <h4 class="text-sm font-semibold text-gray-500">
                            For Returns, Refunds and Other Product Issues
                            <span class="text-sm font-semibold text-blue-500">Click Here</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 rounded-lg p-4 lg:h-[30%] col-span-2 sm:block md:flex gap-4 lg:block">
                <div class="sm:border-b md:border-none lg:border-b border-gray-300 pb-5">
                    <h5 class="font-semibold text-gray-500">Total Cost:</h5>
                    <h3 class="font-bold text-xl">US$55.86</h3>
                    <h4 class="font-semibold text-gray-400">No Import Fees Deposit & $23.64 Shipping to Kenya</h4>
                    <h4 class="text-gray-500">Delivery: <strong class="font-bold">Friday, August 18</strong></h4>
                    <h5 class="font-thin text-gray-500 text-sm">Order Within: <span class="text-green-600">19h 38min</span></h5>
                    <x-primary-button class="w-full my-2 py-1">Place Order</x-primary-button>
                    <x-primary-outline-button class="w-full my-2 py-1 text-orange-400 justify-center gap-1">
                        {{-- <i class="fas fa-plus text-sm"></i> --}}
                        <span class="tracking-tight">
                            Add To Cart
                        </span>
                    </x-primary-outline-button>
                    <x-primary-outline-button class="w-full my-2 py-1 text-orange-400 justify-center gap-1">
                        <span class="tracking-tight">
                            Get Quotation
                        </span>
                    </x-primary-outline-button>
                </div>
                <div class="sm:pt-5 md:pt-0 lg:pt-0 sm:w-full md:w-1/2 lg:w-full">
                    <h5 class="sm:text-sm md:text-lg lg:text-sm sm:font-semibold md:font-bold lg:font-semibold sm:text-gray-500 md:text-gray-700 lg:text-gray-500">Vendor:</h5>
                    <h3 class="text-2xl text-gray-500 font-bold underline-offset-2">Enock's Mining Co.</h3>
                    <h6 class="text-sm text-gray-400">Verified</h6>
                    <h5 class="font-semibold text-gray-500 text-sm">Response Time: <span class="text-gray-700 font-bold">2h</span></h5>
                    <h5 class="font-semibold text-gray-500 text-sm">Order Fulfilment: <span class="text-gray-700 font-bold">98%</span></h5>
                    <x-primary-outline-button class="w-full my-2 py-1 text-orange-500 justify-center bg-orange-300">
                        <span class="tracking-tight">
                            Message Vendor
                        </span>
                    </x-primary-outline-button>
                </div>
            </div>
        </div>
    </div>
</x-main>
