<div>
    <form action="{{ route('order.store') }}" method="post" id="submit-cart-form" class="block lg:flex px-4 lg:px-28 p-4 gap-12">
        @csrf
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
                            {{-- <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-thin text-sm">Select All Items</h2> --}}
                        </div>
                        <i class="fas fa-trash-alt my-auto text-gray-500 hover:cursor-pointer" wire:click="deleteAll"></i>
                    </div>
                </div>
                @foreach ($cart->cartItems as $key => $item)
                    @php($min_order_quantity = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[0] : 0)
                    @php($max_order_quantity = $item->product->max_order_quantity ? explode(" ", $item->product->max_order_quantity)[0] : 10000000000)
                    @php($min_price = $item->product->min_price ? $item->product->min_price : $item->product->price)
                    @php($max_price = $item->product->max_price ? $item->product->max_price : $item->product->price)
                    @php($product_measurement_unit = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[1] : 'Kilograms')
                    <div>
                        <div class="flex w-full border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                            <div class="basis-4/5 grid md:flex md:justify-between gap-2 px-2 text-gray-500">
                                <div class="flex gap-3 md:min-w-fit md:mr-10">
                                    {{-- <input id="cart_items_ids[]" value="{{ $item->id }}" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="cart_items_ids" class="sr-only">checkbox</label> --}}
                                    @if ($item->product->media->where('type', 'image')->first())
                                        <img src="{{ $item->product->media->where('type', 'image')->first()->file }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                    @endif
                                    <div class="flex flex-col">
                                        <input type="hidden" name="items_ids[]" value="{{ $item->product->id }}">
                                        <a href="{{ route('product', ['slug' => $item->product->slug]) }}" class="text-gray-500 font-bold text-md my-auto hover:text-gray-700">
                                            {{ $item->product->name }}
                                        </a>
                                        <a href="{{ route('vendor.storefront', ['slug' => $item->product->business->slug]) }}" class="text-gray-400 font-semibold text-md my-auto hover:text-gray-600">
                                            {{ $item->product->business->name }}
                                        </a>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="md:w-[90%] md:justify-items-center md:grid md:grid-cols-4">
                                        <div class="my-auto md:col-span-2">
                                            <div class="flex gap-3">
                                                <div class="custom-number-input h-10">
                                                    <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                                        <button type="button" data-action="decrement" class=" bg-gray-200 mr-0.5 border-2 rounded-tl-lg rounded-bl-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                            <span class="m-auto text-xl font-thin">-</span>
                                                        </button>
                                                        <input type="number" id="order_quantity_{{ $item->id }}" name="items_quantities[{{ $item->product->id }}]" value="{{ $item->quantity, old('item_quantitys['.$key.']') }}" data-quantity-id="{{ $item->id }}" data-cart-id="{{ $item->id }}" data-min-price="{{ $min_price }}" data-max-price="{{ $max_price }}" data-min-order-quantity="{{ $min_order_quantity }}" data-max-order-quantity="{{ $max_order_quantity }}" min="{{ $min_order_quantity }}" max="{{ $max_order_quantity }}" class="quantities border-0 outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" />
                                                        <button type="button" data-action="increment" class="bg-gray-200 ml-0.5 border-2 rounded-tr-lg rounded-br-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                            <span class="m-auto text-xl font-thin">+</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-gray-500 text-sm font-bold my-auto mr-1">{{ $product_measurement_unit }}</span>
                                                <input type="hidden" name="items_quantities_measurement_units[{{ $item->product->id }}]" value="{{ $product_measurement_unit }}">
                                            </div>
                                            <span class="text-red-600 text-sm hidden transition duration-200 ease-in-out" id="min_order_warning_{{ $item->id }}">Minimum order quantity is {{ $min_order_quantity }}</span>
                                            <span class="text-red-600 text-sm hidden transition duration-200 ease-in-out" id="max_order_warning_{{ $item->id }}">Maximum order quantity is {{ $max_order_quantity }}</span>
                                        </div>
                                        {{-- <div class="flex gap-1 md:col-span-1 md:ml-32">
                                            <span class="text-sm font-semibold text-gray-500 my-auto">Color:</span>
                                            <span class="text-sm font-bold my-auto">{{ $item->product->color }}</span>
                                        </div> --}}
                                        <div class="my-auto md:col-span-1 md:ml-52 w-full">
                                            @php($min_order_price = $item->product->min_price ? $item->product->min_price : $item->product->price)
                                            <span class="flex gap-1">
                                                <h4 class="text-gray-700 whitespace-nowrap my-auto">Unit Price:</h4>
                                                <h3 class="font-semibold text-gray-400 my-auto">{{ $item->product->currency }}</h3>
                                                {{-- <h3 class="font-bold text-gray-500" id="order_price_{{ $item->id }}">{{ $item->amount }}</h3> --}}
                                                <x-text-input type="number" class="prices" name="items_prices[{{ $item->product->id }}]" id="items_prices_{{ $item->id }}" data-price-id="{{ $item->id }}" data-item-id="{{ $item->id }}" oninput="updatePrice()"></x-text-input>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="md:w-[90%] md:grid md:grid-cols-3">
                                        <div class="flex gap-2 px-1 md:px-2 text-gray-500">
                                            <input id="request_inspection" type="checkbox" name="request_inspection[{{ $item->product->id }}]" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="request_inspection" class="sr-only">checkbox</label>
                                            <h2 class="font-semibold my-auto">Request Inpection</h2>
                                        </div>
                                        <div class="flex gap-2 px-1 md:px-2 text-gray-500">
                                            <input id="request_logistics" type="checkbox" name="request_logistics[{{ $item->product->id }}]" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="request_logistics" class="sr-only">checkbox</label>
                                            <h2 class="font-semibold my-auto">Shipping</h2>
                                        </div>
                                        <div class="flex gap-2 px-1 md:px-2 text-gray-500">
                                            <input id="checkbox-table-search-1" type="checkbox" name="request_warehousing[{{ $item->product->id }}]" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                            <h2 class="font-semibold text-sm my-auto">Warehousing</h2>
                                        </div>
                                        {{-- <div class="grid md:flex border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2 mb-2" id="delivery-inspection-section">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <i class="fas fa-trash-alt my-auto text-gray-500 basis-1/5 flex justify-end hover:cursor-pointer" wire:click="remove({{ $item }})"></i>
                        </div>
                        {{-- <div class="w-full">
                            <div class="flex justify-between mx-2" id="logistics_companies">
                                <div class="hidden md:block md:basis-1/5"></div>
                                <div class="w-full md:basis-4/5 flex justify-between">
                                    <div class="flex justify-between w-[50%] md:w-[40%]">
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
                            @if (count($inspectors) > 0)
                                @foreach ($inspectors as $inspector)
                                    <div class="flex justify-between mx-2">
                                        <div class="hidden md:block md:basis-1/5"></div>
                                        <div class="w-full md:basis-4/5 flex justify-between">
                                            <div class="flex justify-between w-[60%] md:w-[40%]">
                                                <div class="flex">
                                                    <input id="checkbox-table-search-1" type="radio" value="{{ $inspector->id }}" name="inspector_id" onchange="updateInspectorSelection()" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    <h2 class="font-semibold text-sm ml-2 truncate">{{$inspector->name}}</h2>
                                                </div>
                                                <span class="font-thin text-orange-400 text-sm italic">Negotiate</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div> --}}
                    </div>
                @endforeach
                @if (!$cart->cartItems->isEmpty())
                    <div>
                        <div class="flex justify-between border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2 mb-2" id="delivery-location-section">
                            <div class="basis-1/5 flex gap-2 px-1 md:px-2 text-gray-500">
                                <h2 class="font-semibold">Delivery Location</h2>
                            </div>
                            <div class="basis-4/5 flex justify-between">
                                <span class="flex gap-1 my-auto">
                                    <i class="fas fa-map-marker-alt my-auto text-red-600"></i>
                                    <input type="hidden" name="place_id" id="delivery_location_place_id">
                                    <input type="hidden" name="delivery_location_lat" id="delivery_location_lat">
                                    <input type="hidden" name="delivery_location_lng" id="delivery_location_lng">
                                    <input type="hidden" name="delivery_location" id="delivery_location">
                                    <p class="font-bold text-blue-500 tracking-tight underline underline-offset-2 truncate hover:cursor-pointer" id="location" data-modal-target="cart-select-location" data-modal-toggle="cart-select-location">Click to search delivery location</p>
                                    <p class="text-red-600 hidden" id="location-select-error">Select delivery location</p>
                                    <x-modal modal_id="cart-select-location">
                                        <div class="relative w-full max-w-4xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="cart-select-location">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-2 py-2 lg:px-4">
                                                    <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">Enter Delivery Location</h3>
                                                    <input id="place_id" type="hidden" name="place_id">
                                                    <input type="text" name="delivery_location" id="pac-input" placeholder="Search location here" class="form-control mb-2 border-2 border-gray-200 w-full rounded-md focus:border-1 focus:border-gray-400 transition duration-150 ease-in-out">
                                                    <div id="gmap_markers" class="gmap block h-[96%]"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </span>
                                <span class="font-semibold text-gray-600 my-auto"></span>
                            </div>
                        </div>
                        {{-- <p class="text-red-600 tracking-tight font-semibold hidden" id="inspection-selection-warning">If no inspector is selected, you will be required to upload your inspection report.</p> --}}
                        {{-- <div class="grid md:flex border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                            <div class="basis-1/5 flex gap-2 px-1 md:px-2 text-gray-500">
                                <input id="request_logistics" type="checkbox" name="request_logistics" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                <label for="request_logistics" class="sr-only">checkbox</label>
                                <h2 class="font-semibold my-auto">Shipping</h2>
                            </div>
                            <div class="w-full">
                                <div class="flex justify-between mx-2" id="logistics_companies">
                                    <div class="hidden md:block md:basis-1/5"></div>
                                    <div class="w-full md:basis-4/5 flex justify-between">
                                        <div class="flex justify-between w-[50%] md:w-[40%]">
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="shipping_address" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
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
                        </div> --}}
                    </div>
                    {{-- <div>
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
                    </div> --}}
                    {{-- <div>
                        <div class="flex justify-between border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                            <div class="basis-1/5 flex gap-2 px-2 text-gray-500">
                                <input id="checkbox-table-search-1" name="request_financing" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                <h2 class="font-semibold">Request Financing</h2>
                            </div>
                            <span class="basis-4/5 my-auto">
                                <p class="text-sm font-bold text-blue-500 tracking-tight">Credit Limit $6,700.00</p>
                            </span>
                        </div>
                    </div> --}}
                    <div>
                        <textarea name="additional_notes" rows="5" class="w-full border border-gray-300 rounded-lg placeholder-gray-400" placeholder="Additional Notes"></textarea>
                    </div>
                    <div>
                        <div class="flex justify-between p-2">
                            <div class="flex gap-2 px-2 text-gray-500">
                                <input id="checkbox-table-search-1" name="share_contacts" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
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
                        <h3 class="font-bold text-xl text-gray-600 my-auto">USD</h3>
                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">0</span>
                        <input type="hidden" id="total_cart_amount_input" name="total_cart_amount" value="{{ old('total_cart_amount') }}" />
                    </div>
                </div>
                <div class="block md:flex md:gap-2">
                    <h4 class="text-gray-500 my-auto font-semibold">Delivery On:</h4>
                    {{-- <x-text-input type="date" datepicker name="delivery_date" class="w-full" placeholder="Select Delivery Date"></x-text-input> --}}
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input id="date-select" datepicker autocomplete="off" type="text" name="delivery_date" value="{{ old('delivery_date') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                    </div>
                    {{-- <h5 class="font-thin text-gray-500 text-sm">Order Within: <span class="text-green-600">19h 38min</span></h5> --}}
                </div>
                <p class="text-red-600 hidden" id="date-select-error">Select Valid Date</p>
                <x-primary-button class="w-full my-2 py-2" type="submit" id="submit-cart">
                    <span class="tracking-tight">
                        Request For Quotation
                    </span>
                </x-primary-button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>
<script>
    let order_price = document.getElementById('order_price')

    let total_amount = document.getElementById('total_cart_amount');

    let total_amount_input = document.getElementById('total_cart_amount_input');

    let request_logistics = document.getElementById('request_logistics');

    $(document).ready(function () {
        total_amount.value = new Intl.NumberFormat().format(total_amount.value)
    })

    $('#submit-cart-form').on('submit', function(e) {
        e.preventDefault()
        let selected_date = new Date($('#date-select').val())
        let current_date = new Date()
        if (selected_date < current_date) {
            $('#date-select-error').removeClass('hidden')
            $('#date-select').removeClass('border-gray-300').addClass('border-red-500')
            setTimeout(() => {
                $('#date-select-error').addClass('hidden')
            }, 3000);
        }
        if ($('#delivery_location').val() == '') {
            $('#location-select-error').removeClass('hidden')
            $('#delivery-location-section').removeClass('border-gray-200').addClass('border-red-500')
            setTimeout(() => {
                $('#location-select-error').addClass('hidden')
            }, 3000);
        } else {
            $(this).submit()
        }
    })

    function decrement(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let element = target.attributes['data-cart-id'].value
        let product_min_price = target.attributes['data-min-price'].value
        let product_max_price = target.attributes['data-max-price'].value
        let product_min_order_quantity = target.attributes['data-min-order-quantity'].value
        let product_max_order_quantity = target.attributes['data-max-order-quantity'].value
        let min_value = target.attributes['min'].value
        let value = Number(target.value);
        value--;
        if (value < min_value) {
            target.value = min_value;
            document.getElementById('min_order_warning_'+element).classList.remove('hidden')
            setTimeout(() => {
                document.getElementById('min_order_warning_'+element).classList.add('hidden')
            }, 4000);
        } else {
            target.value = value;
        }
        updateQuantity()
        // let new_amount = Number(total_amount.innerHTML.replaceAll(',', ''))
        // let old_amount = document.getElementById('order_price_'+element).innerHTML.replaceAll(',', '')
        // let updated_amount = calculatePrice(element, target.value, product_min_order_quantity, product_max_order_quantity, product_min_price, product_max_price)
        // total_amount.innerHTML = new Intl.NumberFormat().format(Number((new_amount - old_amount) + updated_amount))
        // total_amount_input.value = Number((new_amount - old_amount) + updated_amount)
    }

    function increment(e) {
        const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let element = target.attributes['data-cart-id'].value
        let product_min_price = target.attributes['data-min-price'].value
        let product_max_price = target.attributes['data-max-price'].value
        let product_min_order_quantity = target.attributes['data-min-order-quantity'].value
        let product_max_order_quantity = target.attributes['data-max-order-quantity'].value
        let max_value = target.attributes['max'].value
        let value = Number(target.value);
        value++;
        if (value > max_value) {
            target.value = max_value;
            document.getElementById('max_order_warning_'+element).classList.remove('hidden')
            setTimeout(() => {
                document.getElementById('max_order_warning_'+element).classList.add('hidden')
            }, 4000);
        } else {
            target.value = value;
        }
        updateQuantity()
        // let new_amount = Number(total_amount.innerHTML.replaceAll(',', ''))
        // let old_amount = document.getElementById('order_price_'+element).innerHTML.replaceAll(',', '');
        // let updated_amount = calculatePrice(element, target.value, product_min_order_quantity, product_max_order_quantity, product_min_price, product_max_price)
        // total_amount.innerHTML = new Intl.NumberFormat().format(Number((new_amount - old_amount) + updated_amount))
        // total_amount_input.value = Number((new_amount - old_amount) + updated_amount)
    }

    function calculatePrice(element, quantity, min_order_quantity, max_order_quantity, min_product_price, max_product_price) {
        order_quantity = quantity

        let calculated_price = 0

        let order_quantity_middle = Math.round((Number(min_order_quantity) + Number(max_order_quantity)) / 2)

        let product_price_middle = Math.round((Number(min_product_price) + Number(max_product_price)) / 2)

        // if price available, multiply price by the order quantity
        // If price is not available, multiply minimun price by the order quantity
        if (min_product_price && max_product_price) {
            if (order_quantity < order_quantity_middle) {
                calculated_price = max_product_price * order_quantity
            } else if (order_quantity > max_order_quantity) {
                calculated_price = min_product_price * order_quantity
            } else {
                calculated_price = product_price_middle * order_quantity
            }
        } else {
            calculated_price = product_price * order_quantity
        }

        document.getElementById('order_price_'+element).innerHTML = new Intl.NumberFormat().format(calculated_price)
        document.getElementById('items_prices_'+element).value = calculated_price

        return calculated_price
    }

    function updatePrice() {
        let total = 0;
        document.querySelectorAll('.prices').forEach(priceElement => {
            if (priceElement.value != '' && priceElement.value != '0') {
                let element_id = priceElement.attributes['data-price-id'].value
                let quantity = document.getElementById('order_quantity_'+element_id).value
                let product = quantity * priceElement.value
                total += product
            }
        })
        total_amount.innerHTML = new Intl.NumberFormat().format(Number(total))
        total_amount_input.value = total
    }

    function updateQuantity() {
        let total = 0;
        document.querySelectorAll('.quantities').forEach(quantityElement => {
            let element_id = quantityElement.attributes['data-quantity-id'].value;
            let price = document.getElementById('items_prices_'+element_id).value;
            if (price !== '' && price !== '0') {
                let product = price * quantityElement.value
                total += product
            }
        })
        total_amount.innerHTML = new Intl.NumberFormat().format(Number(total))
        total_amount_input.value = total
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

    // function placeMarker(location) {
    //     if (marker) {
    //         marker.setPosition(location);
    //     } else {
    //         marker = new google.maps.Marker({
    //             position: location,
    //             map: mapInstance
    //         });
    //     }
    // }

    function updateInspectorSelection() {
        $('#inspection-selection-warning').addClass('hidden')
    }

    function initMap() {
        var map = new google.maps.Map(document.getElementById('gmap_markers'), {
            center: {lat: -1.270104, lng: 36.80814},
            zoom: 3
        });
        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();

            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // map.setCenter(place.geometry.location);
            // map.setZoom(17);

            // foreach ($warehouse_location['results'][0]['address_components'] as $place) {
            //     if (collect($place['types'])->contains('country')) {
            //         $country = Country::where('name', 'LIKE', $place['long_name'])->orWhere('iso', 'LIKE', $place['short_name'])->first();
            //         if (!$country) {
            //             toastr()->error('', 'Please select a valid location');
            //             return back();
            //         }
            //     }
            // }

            // place.address_components.forEach(component => {
            //     if (component.types.includes('country')) {
            //         let selected_country = component.long_name
            //         if (!products_locations.includes(selected_country)) {
            //             $('#request_inspection').prop('checked', true);
            //             $('#inspection-selection-warning').removeClass('hidden')
            //         } else {
            //             $('#request_inspection').prop('checked', false);
            //             $('#inspection-selection-warning').addClass('hidden')
            //         }
            //     }
            // })

            document.getElementById('place_id').value = place.place_id
            document.getElementById('delivery_location_place_id').value = place.place_id
            document.getElementById('delivery_location_lat').value = place.geometry.location.lat()
            document.getElementById('delivery_location_lng').value = place.geometry.location.lng()
            document.getElementById('delivery_location').value = place.formatted_address
            document.getElementById('location').innerHTML = place.formatted_address

            $('#delivery-location-section').removeClass('border-red-500').addClass('border-gray-200')

            // placeMarker(place.geometry.location);
            // marker.setVisible(true);
        });

        // geocoder = new google.maps.Geocoder;

        // google.maps.event.addListener(map, 'click', function(event) {
        //     geocoder.geocode({
        //         'location': event.latLng
        //     }, function(results, status) {
        //         if (status === google.maps.GeocoderStatus.OK) {
        //         if (results[0]) {
        //             document.getElementById('place_id').value = results[0].place_id
        //         } else {
        //             console.log('No results found');
        //         }
        //         } else {
        //         console.log('Geocoder failed due to: ' + status);
        //         }
        //     });
        //     placeMarker(event.latLng);
        // });
    }
</script>
<script src="{!! config('services.maps.key') !!}" async defer></script>
