<x-main>
    <style>
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }
    </style>
    <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-16 z-30">
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
                        @foreach ($categories as $category)
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <div class="mx-auto px-4 md:px-10 lg:px-28 my-5">
        <span class="flex gap-2 text-sm">
            <p class="text-gray-400">Home ></p>
            <p class="text-gray-400">{{ $product->category->name }} ></p>
            <p class="text-gray-600">{{ $product->name }}</p>
        </span>
        <div class="md:grid md:grid-cols-2 lg:flex gap-3 mt-3">
            <div class="bg-gray-50 p-2">
                @if ($product->media->first()->type === 'image')
                    <img src="{{ $product->media->first()->file }}" alt="" class="w-[290px] h-[350px] mx-auto md:w-[390px] md:h-[450px] md:mx-0 object-cover rounded-md">
                @endif
                <div class="flex justify-between mt-2 mx-8 md:mx-0">
                    @foreach ($product->media as $media)
                        @if ($media->type == 'image')
                            <img src="{{ $media->file }}" alt="" class="w-20 h-20 lg:w-24 lg:h-24 object-cover rounded-md border border-primary-one">
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="space-y-4 bg-gray-50 p-2 rounded-md">
                <h2 class="text-xl font-bold text-gray-600">{{ $product->name }}</h2>
                <div class="border-b-2 space-y-2 lg:space-y-5 pb-6">
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Rating:</h4>
                        <div class="review__info">
                            <div class="review__star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span style="width: 75%">
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                   <i class="fas fa-star"></i>
                                </span>
                             </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Brand:</h4>
                        <div class="flex gap-3">
                            <h4 class="text-sm font-semibold text-blue-500">Raw Material</h4>
                            <h4 class="text-sm font-bold text-gray-400">I</h4>
                            <h4 class="text-sm font-semibold text-blue-500">Similar Products from {{ $product->business->name }}</h4>
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
                                <h4 class="font-semibold text-gray-400">70 Pieces <i class="far fa-arrow-alt-circle-up"></i></h4>
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
                            <h4 class="text-sm font-semibold text-gray-500">{{ $product->color }}</h4>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600 my-auto">Your Order:</h4>
                        <div class="custom-number-input h-10 w-32">
                            <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                <button data-action="decrement" class=" bg-gray-200 mr-0.5 border-2 rounded-tl-lg rounded-bl-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-xl font-thin">-</span>
                                </button>
                                <input type="number" class="border-0 outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number" value="2" />
                                <button data-action="increment" class="bg-gray-200 ml-0.5 border-2 rounded-tr-lg rounded-br-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h3 class="font-bold text-gray-500">US$50.86</h3>
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
                        <h4 class="text-sm font-bold text-gray-600 my-auto">Payments:</h4>
                        <div class="flex gap-1">
                            <img src="{{ asset('assets/img/visa_icon.png') }}" alt="" class="w-14 h-10 object-contain">
                            <img src="{{ asset('assets/img/mastercard_payment_icon.png') }}" alt="" class="w-14 h-10 object-contain">
                            <h4 class="text-sm font-semibold text-blue-500 my-auto">MPESA</h4>
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
                            <span class="text-sm font-semibold text-blue-500 underline underline-offset-2">Click Here</span>
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
                    <x-primary-button class="w-full my-2 py-2 tracking-wide">Place Order</x-primary-button>
                    <x-primary-outline-button class="w-full my-2 py-1 text-orange-400 justify-center gap-1">
                        <i class="fas fa-plus text-sm"></i>
                        <span class="tracking-tight">
                            Add To Cart
                        </span>
                    </x-primary-outline-button>
                    <x-primary-outline-button class="w-full my-2 py-1 text-orange-400 justify-center gap-1" data-modal-target="get-quote-modal" data-modal-toggle="get-quote-modal">
                        <span class="tracking-tight">
                            Get Quotation
                        </span>
                    </x-primary-outline-button>
                    <x-modal modal_id="get-quote-modal">
                        <div class="relative w-full max-w-4xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="get-quote-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6">
                                    <div class="lg:col-span-2 border-none lg:block md:hidden sm:hidden">
                                        <div class="w-full py-2 flex flex-col justify-between">
                                            <h2 class="text-2xl font-extrabold text-gray-800">Request Quotation</h2>
                                            <span class="flex gap-2 divide-x-2 divide-gray-300">
                                                <div class="flex gap-2">
                                                    <h3 class="text-gray-500 font-bold">{{ $product->business->name }}</h3>
                                                    <h6 class="text-sm text-gray-500">Verified</h6>
                                                </div>
                                                <h6 class="text-sm text-gray-500 pl-2">{{ $product->business->created_at->diffForHumans() }}</h6>
                                            </span>
                                        </div>
                                        <form action="#" method="POST" class="flex flex-col justify-between space-y-4">
                                            <div class="flex flex-col border-2 border-gray-400 rounded-lg">
                                                <div class="flex gap-2 border-b-2 border-gray-400">
                                                    <div class="flex gap-3 p-4">
                                                        <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                                        <span class="text-gray-500 text-sm my-auto">{{ $product->name }}</span>
                                                    </div>
                                                    <div class="flex gap-3 p-4 w-[30%]">
                                                        <div class="custom-number-input h-10 w-32 my-auto">
                                                            <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                                                <button data-action="decrement" class=" bg-gray-200 mr-0.5 border-2 rounded-tl-lg rounded-bl-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                                    <span class="m-auto text-xl font-thin">-</span>
                                                                </button>
                                                                <input type="number" class="border-0 outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number" value="2" />
                                                                <button data-action="increment" class="bg-gray-200 ml-0.5 border-2 rounded-tr-lg rounded-br-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                                    <span class="m-auto text-xl font-thin">+</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span class="text-gray-500 text-sm font-bold my-auto mr-1">Pieces</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <textarea name="quote_message" id="" rows="5" class="w-full border-none focus:ring-0 placeholder-gray-300" placeholder="Enter your Message Here, you can include size, color, materials and other requirements"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <x-input-label class="font-thin">Your Email Address</x-input-label>
                                                <x-text-input class="w-full bg-gray-50" name="quote_email"></x-text-input>
                                            </div>
                                            <div>
                                                <div class="flex gap-2 md:px-2 text-gray-500">
                                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    <h2 class="font-thin text-sm">Save Message as a template</h2>
                                                </div>
                                            </div>
                                            <x-primary-button class="md:w-[40%] py-1">Request Quotation</x-primary-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                </div>
                <div class="sm:pt-5 md:pt-0 lg:pt-0 sm:w-full md:w-1/2 lg:w-full">
                    <h5 class="sm:text-sm md:text-lg lg:text-sm sm:font-semibold md:font-bold lg:font-semibold sm:text-gray-500 md:text-gray-700 lg:text-gray-500">Vendor:</h5>
                    <a href="{{ route('vendor.storefront', ['slug' => $product->business->slug]) }}">
                        <h3 class="text-2xl text-gray-500 font-bold underline-offset-2 hover:text-gray-600 transition duration-150 ease-in">{{ $product->business->name }}</h3>
                    </a>
                    <div class="flex gap-2">
                        <h6 class="text-sm text-gray-500">Verified</h6>
                        <i class="text-sm fas fa-shield-alt text-red-800"></i>
                    </div>
                    <h5 class="font-semibold text-gray-500 text-sm">Response Time: <span class="text-gray-700 font-bold">2h</span></h5>
                    <h5 class="font-semibold text-gray-500 text-sm">Order Fulfilment: <span class="text-gray-700 font-bold">98%</span></h5>
                    <x-primary-outline-button class="w-full my-2 py-1 text-orange-500 justify-center bg-orange-300" data-modal-target="message_vendor_modal" data-modal-toggle="message_vendor_modal">
                        <span class="tracking-tight">
                            Message Vendor
                        </span>
                    </x-primary-outline-button>
                    <x-modal modal_id="message_vendor_modal" modal_placement="bottom-right" class="">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="message_vendor_modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-2 py-2 lg:px-4">
                                    <div class="lg:col-span-2 border-none">
                                        <div class="border-b-2 border-t-0 border-gray-400 w-full px-4 py-2 flex justify-between">
                                            <h2 class="text-2xl font-extrabold text-gray-800">{{ $product->business->name }}</h2>
                                        </div>
                                        <div class="overflow-scroll h-[33rem] 4xl:h-[50rem] mb-12">
                                            <div class="space-y-2 p-2 text-sm" id="messages">
                                                <div>
                                                    <div class="bg-yellow-200 border-none p-2 max-w-sm rounded-lg">
                                                        Hi Oloo. I need 200 bags of Dangote cement delivered to Kilifi. Can we have this delivered before 25th?
                                                    </div>
                                                    <span class="text-xs">7:35am</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <div class="flex flex-row-reverse">
                                                        <div class="bg-gray-300 border-none p-2 max-w-sm rounded-lg">
                                                            Hi. I can ship a maximum of 180 bags. Can we make a deal? Please reach through email
                                                        </div>
                                                    </div>
                                                    <span class="text-xs text-right">8:40am</span>
                                                </div>
                                                <div>
                                                    <div class="bg-yellow-200 border-none p-2 max-w-sm rounded-lg">
                                                        Hi Oloo. I need 200 bags of Dangote cement delivered to Kilifi. Can we have this delivered before 25th?
                                                    </div>
                                                    <span class="text-xs">9:50am</span>
                                                </div>
                                                <div>
                                                    <div class="bg-yellow-200 border-none p-2 max-w-sm rounded-lg">
                                                        Hi Oloo. I need 200 bags of Dangote cement delivered to Kilifi. Can we have this delivered before 25th? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, fugit!
                                                    </div>
                                                    <span class="text-xs">9:50am</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <div class="flex flex-row-reverse">
                                                        <div class="bg-gray-300 border-none p-2 max-w-sm rounded-lg">
                                                            Hi. I can ship a maximum of 180 bags. Can we make a deal? Please reach through email. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, porro?
                                                        </div>
                                                    </div>
                                                    <span class="text-xs text-right">8:50am</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <div class="flex flex-row-reverse">
                                                        <div class="bg-gray-300 border-none p-2 max-w-sm rounded-lg">
                                                            Hi. I can ship a maximum of 180 bags. Can we make a deal? Please reach through email. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, porro?
                                                        </div>
                                                    </div>
                                                    <span class="text-xs text-right">8:50am</span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <div class="flex flex-row-reverse">
                                                        <div class="bg-gray-300 border-none p-2 max-w-sm rounded-lg">
                                                            Hi. I can ship a maximum of 180 bags. Can we make a deal? Please reach through email. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, porro?
                                                        </div>
                                                    </div>
                                                    <span class="text-xs text-right">8:50am</span>
                                                </div>
                                                <div>
                                                    <div class="bg-yellow-200 border-none p-2 max-w-sm rounded-lg">
                                                        Hi Oloo. I need 200 bags of Dangote cement delivered to Kilifi. Can we have this delivered before 25th? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, fugit!
                                                    </div>
                                                    <span class="text-xs">9:50am</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-2 lg:pb-0 lg:fixed lg:bottom-6 w-[94%] lg:w-[42%] 4xl:w-[42%]">
                                        <form action="#" method="POST" class="mx-3 lg:my-2 w-full lg:w-[96%] flex gap-1">
                                            <x-text-input class="w-[98%] md:w-full border-2 border-gray-400 rounded focus:border-b-3 focus:ring-0" placeholder="Type Your Message Here..." autofocus></x-text-input>
                                            <i class="fas fa-paperclip text-gray-400 text-xl my-auto w-[5%]"></i>
                                            <button type="submit" class="bg-orange-500 text-white rounded-full md:mx-auto my-auto w-[15%] md:w-12 h-10">
                                                <svg class="mx-auto pl-1" xmlns="http://www.w3.org/2000/svg" width="25.5" height="20" viewBox="0 0 31.5 27">
                                                    <path id="send_icon" d="M3.015,31.5,34.5,18,3.015,4.5,3,15l22.5,3L3,21Z" transform="translate(-3 -4.5)" fill="#fff"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-[70%]">
            <div class="flex gap-4">
                <h4 class="text-lg font-semibold text-gray-600 p-2 bg-gray-100">Product Details</h4>
                <h4 class="text-lg font-semibold text-gray-600 p-2">Vendor Details</h4>
                <h4 class="text-lg font-semibold text-gray-600 p-2">Customer Reviews</h4>
            </div>
            <div class="bg-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 md:divide-x md:divide-gray-400 p-2">
                    <div class="space-y-3">
                        <h5 class="text-sm font-bold text-gray-700">Overview</h5>
                        <p class="text-sm text-gray-600">Material: <strong class="text-sm text-gray-700">Gold</strong></p>
                        <p class="text-sm text-gray-600">Type: <strong class="text-sm text-gray-700">Mineral</strong></p>
                        <p class="text-sm text-gray-600">Product Type: <strong class="text-sm text-gray-700">Badge & Emblem</strong></p>
                        <p class="text-sm text-gray-600">Technique: <strong class="text-sm text-gray-700">Carving</strong></p>
                        <p class="text-sm text-gray-600">Style: <strong class="text-sm text-gray-700">Natural</strong></p>
                        <p class="text-sm text-gray-600">Use: <strong class="text-sm text-gray-700">Business Gift</strong></p>
                        <p class="text-sm text-gray-600">Theme: <strong class="text-sm text-gray-700">Patriotism</strong></p>
                        <p class="text-sm text-gray-600">Regional Feature: <strong class="text-sm text-gray-700">Africa</strong></p>
                    </div>
                    <div class="space-y-3 md:px-4 lg:px-8 pt-2 md:pt-8">
                        <p class="text-sm text-gray-600">Place of Origin: <strong class="text-sm text-gray-700">{{ $product->place_of_origin }}</strong></p>
                        <p class="text-sm text-gray-600">Brand Name: <strong class="text-sm text-gray-700">{{ $product->brand }}</strong></p>
                        <p class="text-sm text-gray-600">Model Number: <strong class="text-sm text-gray-700">#{{ $product->model_number }}</strong></p>
                        <p class="text-sm text-gray-600">Usage: <strong class="text-sm text-gray-700">Home Decoration Gift</strong></p>
                        <p class="text-sm text-gray-600">Product Name: <strong class="text-sm text-gray-700">Natural</strong></p>
                        <p class="text-sm text-gray-600">Plating: <strong class="text-sm text-gray-700">None</strong></p>
                        <p class="text-sm text-gray-600">Shaping: <strong class="text-sm text-gray-700">Rectangle</strong></p>
                        <p class="text-sm text-gray-600">Design: <strong class="text-sm text-gray-700">100% Custom Made</strong></p>
                    </div>
                    <div class="space-y-3 md:px-4 lg:px-8 pt-2 md:pt-8">
                        <p class="text-sm text-gray-600">Color: <strong class="text-sm text-gray-700">{{ $product->color }}</strong></p>
                        <p class="text-sm text-gray-600">MOQ: <strong class="text-sm text-gray-700">{{ $product->min_order_quantity }}</strong></p>
                        <p class="text-sm text-gray-600">Payment: <strong class="text-sm text-gray-700">T/T</strong></p>
                    </div>
                </div>
                <div class="p-2 space-y-3">
                    <h5 class="text-sm font-bold text-gray-700">Supply Ability</h5>
                    <p class="text-sm text-gray-600">Supply Ability: <strong class="text-sm text-gray-700">20,000 Piece/Pieces Per Month</strong></p>
                </div>
                <div class="p-2 space-y-3">
                    <h5 class="text-sm font-bold text-gray-700">Packaging & Delivery</h5>
                    <div class="border border-gray-300 p-1 px-2 rounded-lg mt-2 bg-white md:w-[50%]">
                        <div class="flex justify-between divide-x divide-gray-300">
                            <div class="flex flex-col gap-1 -mr-10">
                                <h4 class="font-semibold text-gray-400">10 - 39 Pieces</h4>
                                <h5 class="font-bold text-gray-600">$5.03</h5>
                            </div>
                            <div class="flex flex-col gap-1 pl-4 -mr-10">
                                <h4 class="font-semibold text-gray-400">40 - 69 Pieces</h4>
                                <h5 class="font-bold text-gray-600">$3.40</h5>
                            </div>
                            <div class="flex flex-col gap-1 px-2">
                                <h4 class="font-semibold text-gray-400">70 Pieces <i class="far fa-arrow-alt-circle-up"></i></h4>
                                <h5 class="font-bold text-gray-600">$2.38</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 space-y-3">
                    <h5 class="text-sm font-bold text-gray-700">Product Images</h5>
                    <div class="md:flex gap-2">
                        <img src="{{ asset('assets/img/6CeuCO.jpg') }}" alt="" class="w-96 h-60 object-contain mb-3 md:mb-0">
                        <div class="grid grid-cols-2 gap-3">
                            @foreach ($product->media as $media)
                                @if ($media->type === 'image')
                                    <img src="{{ $media->file }}" alt="" class="w-40 h-28 object-cover">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="p-2 space-y-3">
                    <h5 class="text-sm font-bold text-gray-700">Product Videos</h5>
                </div>
                <div class="p-2 space-y-3">
                    <h5 class="text-sm font-bold text-gray-700">Related Items</h5>
                    <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-2">
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Gold Bars</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 20 Pieces</h5>
                                </div>
                            </a>
                        </div>
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Diamond</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 100 Pieces</h5>
                                </div>
                            </a>
                        </div>
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Platinum</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 50 Pieces</h5>
                                </div>
                            </a>
                        </div>
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Iron Ore</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 10 Pieces</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-2 space-y-3">
                    <h5 class="text-sm font-bold text-gray-700">Vendor's Popular Products</h5>
                    <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-2">
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/6CeuCO.jpg') }}" class="rounded border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Gold Bars</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 20 Pieces</h5>
                                </div>
                            </a>
                        </div>
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/3skZmX.jpg') }}" class="rounded border border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Diamond</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 10.20 - US $ 400.37</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 100 Pieces</h5>
                                </div>
                            </a>
                        </div>
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="rounded border border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Platinum</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 100 - US $ 2000</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 50 Pieces</h5>
                                </div>
                            </a>
                        </div>
                        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
                            <a href="#">
                                <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" class="rounded border border-gray-200 w-full h-36 object-cover" alt="">
                                <div class="">
                                    <h4 class="font-bold text-gray-500">Iron Ore</h4>
                                    <h4 class="font-bold uppercase text-gray-700">US $ 2.20 - US $ 3.37</h4>
                                    <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: 10 Pieces</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function decrement(e) {
          const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
          );
          const target = btn.nextElementSibling;
          let value = Number(target.value);
          value--;
          target.value = value;
        }

        function increment(e) {
          const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
          );
          const target = btn.nextElementSibling;
          let value = Number(target.value);
          value++;
          target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
          `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
          `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
          btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
          btn.addEventListener("click", increment);
        });
        var container = document.getElementById("messages");
        console.log(container);
        container.scrollTop = container.scrollHeight
      </script>
</x-main>
