<div class="block lg:flex px-4 lg:px-28 p-4 gap-12">
    <div class="basis-3/4 bg-gray-50 p-2 rounded-lg">
        {{-- <div>
            <h3 class="text-3xl text-gray-600 font-bold">Shopping Cart</h3>
            <span class="flex gap-2 divide-x-2 divide-gray-300">
                <div class="flex gap-2">
                    <h3 class="text-gray-500 font-bold">Enock's Mining Co.</h3>
                    <h6 class="text-sm text-gray-500">Verified</h6>
                </div>
                <h6 class="text-sm text-gray-500 pl-2">2 Years</h6>
            </span>
        </div> --}}
        <div class="space-y-2">
            <div>
                <div class="flex justify-between border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                    <div class="flex gap-2 md:px-2 text-gray-500">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        <h2 class="font-thin text-sm">Select All Items</h2>
                    </div>
                    <i class="fas fa-trash-alt my-auto text-gray-500 hover:cursor-pointer" wire:click="deleteAll"></i>
                </div>
            </div>
            @foreach ($cart->cartItems as $item)
                @php($min_order_quantity = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[0] : 0)
                @php($max_order_quantity = $item->product->max_order_quantity ? explode(" ", $item->product->max_order_quantity)[0] : 10000000000)
                @php($min_price = $item->product->min_price ? $item->product->min_price : $item->product->price)
                @php($max_price = $item->product->max_price ? $item->product->max_price : $item->product->price)
                @php($product_measurement_unit = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[1] : 'Kilograms')
                <div>
                    <div class="flex w-full border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                        <div class="basis-4/5 grid md:flex md:justify-between gap-2 px-2 text-gray-500">
                            <div class="flex gap-3 md:min-w-fit md:mr-10">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                @if ($item->product->media->where('type', 'image')->first())
                                    <img src="{{ $item->product->media->where('type', 'image')->first()->file }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                @endif
                                <div class="flex flex-col">
                                    <a href="{{ route('product', ['slug' => $item->product->slug]) }}" class="text-gray-500 font-bold text-md my-auto hover:text-gray-700">
                                        {{ $item->product->name }}
                                    </a>
                                    <a href="{{ route('vendor.storefront', ['slug' => $item->product->business->slug]) }}" class="text-gray-400 font-semibold text-md my-auto hover:text-gray-600">
                                        {{ $item->product->business->name }}
                                    </a>
                                </div>
                            </div>
                            <div class="flex md:w-[90%] md:justify-items-center md:grid md:grid-cols-4">
                                <div class="my-auto md:col-span-2">
                                    <div class="flex gap-3">
                                        <div class="custom-number-input h-10">
                                            <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                                <button data-action="decrement" class=" bg-gray-200 mr-0.5 border-2 rounded-tl-lg rounded-bl-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                    <span class="m-auto text-xl font-thin">-</span>
                                                </button>
                                                <input type="number" id="order_quantity" data-cart-id="{{ $item->id }}" data-min-price="{{ $min_price }}" data-max-price="{{ $max_price }}" data-min-order-quantity="{{ $min_order_quantity }}" data-max-order-quantity="{{ $max_order_quantity }}" value="{{ $item->quantity }}" min="{{ $min_order_quantity }}" max="{{ $max_order_quantity }}" class="border-0 outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number" />
                                                <button data-action="increment" class="bg-gray-200 ml-0.5 border-2 rounded-tr-lg rounded-br-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                    <span class="m-auto text-xl font-thin">+</span>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="text-gray-500 text-sm font-bold my-auto mr-1">{{ $product_measurement_unit }}</span>
                                    </div>
                                    <span class="text-red-600 text-sm hidden" id="min_order_warning">Minimum order quantity is {{ $min_order_quantity }}</span>
                                    <span class="text-red-600 text-sm hidden" id="max_order_warning">Maximum order quantity is {{ $max_order_quantity }}</span>
                                </div>
                                <div class="flex gap-1 md:col-span-1">
                                    <span class="text-sm font-semibold text-gray-500 my-auto">Color:</span>
                                    <span class="text-sm font-bold my-auto">{{ $item->product->color }}</span>
                                </div>
                                <div class="my-auto md:col-span-1">
                                    @php($min_order_price = $item->product->min_price ? $item->product->min_price : $item->product->price)
                                    <span class="flex gap-1">
                                        <h3 class="font-semibold text-gray-400">{{ $item->product->currency }}</h3>
                                        <h3 class="font-bold text-gray-500" id="order_price_{{ $item->id }}">{{ number_format($item->amount) }}</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <i class="fas fa-trash-alt my-auto text-gray-500 basis-1/5 flex justify-end hover:cursor-pointer" wire:click="remove({{ $item }})"></i>
                    </div>
                </div>
            @endforeach
            @if (!$cart->cartItems->isEmpty())
                <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                        <div class="basis-1/5 flex gap-2 px-1 md:px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" checked class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm">Shipping</h2>
                        </div>
                        <div class="basis-4/5 flex justify-between">
                            <span class="flex gap-1 my-auto">
                                <i class="fas fa-map-marker-alt my-auto text-red-600"></i>
                                <p class="text-sm font-bold text-blue-500 tracking-tight underline underline-offset-2 truncate">Westlands Office Park</p>
                            </span>
                            <span class="font-semibold text-gray-600 my-auto">US$50.86</span>
                        </div>
                    </div>
                    <div class="flex justify-between mx-2">
                        <div class="hidden md:block md:basis-1/5"></div>
                        <div class="w-full md:basis-4/5 flex justify-between">
                            <div class="flex justify-between w-[60%] md:w-[40%]">
                                <div class="flex">
                                    <input id="checkbox-table-search-1" type="radio" name="shipping_address" checked class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold text-sm ml-2 truncate">Arena 1 Logistics</h2>
                                </div>
                                <span class="font-thin text-orange-400 text-sm italic">Negotiate</span>
                            </div>
                            <span class="text-gray-600 my-auto">US$6.53</span>
                        </div>
                    </div>
                    <div class="flex justify-between mx-2">
                        <div class="hidden md:block md:basis-1/5"></div>
                        <div class="w-full md:basis-4/5 flex justify-between">
                            <div class="flex justify-between w-[60%] md:w-[40%]">
                                <div class="flex">
                                    <input id="checkbox-table-search-1" type="radio" name="shipping_address" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold text-sm ml-2 truncate">Boflo Afrika</h2>
                                </div>
                                <span class="font-thin text-orange-400 text-sm italic">Negotiate</span>
                            </div>
                            <span class="text-gray-600 my-auto">US$7.04</span>
                        </div>
                    </div>
                    <div class="flex justify-between mx-2">
                        <div class="hidden md:block md:basis-1/5"></div>
                        <div class="w-full md:basis-4/5 flex justify-between">
                            <div class="flex justify-between w-[60%] md:w-[40%]">
                                <div class="flex">
                                    <input id="checkbox-table-search-1" type="radio" name="shipping_address" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold text-sm ml-2 truncate">Sare 254</h2>
                                </div>
                                <span class="font-thin text-orange-400 text-sm italic">Negotiate</span>
                            </div>
                            <span class="text-gray-600 my-auto">US$7.20</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="grid md:flex justify-between border border-gray-200 rounded-lg p-2">
                        <div class="md:basis-1/5 flex gap-2 px-1 md:px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" checked class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm my-auto">Warehousing</h2>
                        </div>
                        <div class="md:basis-4/5 flex justify-between">
                            <div class="grid md:flex justify-between gap-4 w-full">
                                <div class="flex gap-3">
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
                                    <span class="text-gray-500 text-sm font-bold my-auto mr-2">Feet</span>
                                </div>
                                <select name="" id="" class="text-sm font-bold border border-gray-400 rounded-md h-8 p-1 my-auto text-gray-400">
                                    <option value="">Closest to Destination</option>
                                </select>
                                <span class="text-gray-600 my-auto font-semibold">US$7.20</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mx-2">
                        <div class="hidden md:block md:basis-1/5"></div>
                        <div class="w-full md:basis-4/5 flex justify-between">
                            <div class="flex justify-between w-[60%] md:w-[40%]">
                                <div class="flex">
                                    <input id="checkbox-table-search-1" type="radio" name="warehouse_location" checked class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold text-sm ml-2">Sebuleni, Nairobi, Kenya</h2>
                                </div>
                                <span class="font-thin text-orange-400 text-sm italic">Negotiate</span>
                            </div>
                            <span class="text-gray-600 my-auto">US$6.53</span>
                        </div>
                    </div>
                    <div class="flex justify-between mx-2">
                        <div class="hidden md:block md:basis-1/5"></div>
                        <div class="w-full md:basis-4/5 flex justify-between">
                            <div class="flex justify-between w-[60%] md:w-[40%]">
                                <div class="flex">
                                    <input id="checkbox-table-search-1" type="radio" name="warehouse_location" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold text-sm ml-2">Sokostore, Limuru, Kenya</h2>
                                </div>
                                <span class="font-thin text-orange-400 text-sm italic">Negotiate</span>
                            </div>
                            <span class="text-gray-600 my-auto">US$7.04</span>
                        </div>
                    </div>
                    <div class="flex justify-between mx-2">
                        <div class="hidden md:block basis-1/5"></div>
                        <div class="w-full md:basis-4/5 flex justify-between">
                            <div class="flex justify-between w-[60%] md:w-[40%]">
                                <div class="flex">
                                    <input id="checkbox-table-search-1" type="radio" name="warehouse_location" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold text-sm ml-2">Bidhaa, Kitengela, Kenya</h2>
                                </div>
                                <span class="font-thin text-orange-400 text-sm italic">Negotiate</span>
                            </div>
                            <span class="text-gray-600 my-auto">US$7.20</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                        <div class="basis-1/5 flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm">Financing</h2>
                        </div>
                        <span class="basis-4/5 my-auto">
                            <p class="text-sm font-bold text-blue-500 tracking-tight">Credit Limit $6,700.00</p>
                        </span>
                    </div>
                </div>
                <div>
                    <textarea name="" rows="5" class="w-full border border-gray-300 rounded-lg placeholder-gray-400" placeholder="Additional Notes"></textarea>
                </div>
                <div>
                    <div class="flex justify-between p-2">
                        <div class="flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm">Agree to share contact information with the vendor</h2>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="basis-1/4">
        <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
            <div>
                <h4 class="text-sm font-semibold text-gray-500">Cart Subtotal:</h4>
                <div class="flex gap-1">
                    <h3 class="font-bold text-xl text-gray-600"></h3>
                    <h3 class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ $cart->cartItems->sum('amount') }}</h3>
                </div>
            </div>
            <div>
                <h4 class="text-gray-500">Delivery: <strong class="font-bold">Friday, August 18</strong></h4>
                <h5 class="font-thin text-gray-500 text-sm">Order Within: <span class="text-green-600">19h 38min</span></h5>
            </div>
            <x-primary-button class="w-full my-2 py-2">
                <span class="tracking-tight">
                    Checkout
                </span>
            </x-primary-button>
        </div>
    </div>
</div>
