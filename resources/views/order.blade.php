<x-main>
    <div class="">

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
        <span class="lg:flex lg:px-28 mt-2 gap-2 text-sm">
            <a href="{{ route('welcome') }}" class="text-gray-500">Home ></a>
            <a href="{{ route('orders') }}" class="text-gray-500">Orders ></a>
            <span>{{ Str::upper($order->order_id) }}</span>
        </span>
        <div class="hidden lg:flex lg:px-28 mt-2">
            <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-400 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <li class="flex items-center text-primary-one">
                    Order <span class="hidden sm:inline-flex sm:ms-2">Request</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center text-primary-one">
                    Negotiating
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center">
                    Order <span class="hidden sm:inline-flex sm:ms-2"> Confirmed </span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center">
                    Funded <span class="hidden sm:inline-flex sm:ms-2"> To Escrow </span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center">
                    Shipped
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center">
                    Order <span class="hidden sm:inline-flex sm:ms-2"> Complete </span>
                </li>
            </ol>
        </div>
        <div class="block lg:flex px-4 lg:px-28 p-4 gap-12">
            <div>
                <div class="basis-2/3 bg-gray-50 p-2 rounded-lg">
                    <div class="mb-2">
                        <div class="flex justify-between">
                            <div>
                                <div class="flex gap-2">
                                    <a href="{{ route('vendor.storefront', ['slug' => $order->orderItems->first()->product->business->slug]) }}" class="text-gray-900 font-bold text-2xl my-auto hover:text-gray-800">
                                        {{ $order->orderItems->first()->product->business->name }}
                                    </a>
                                </div>
                                <div class="flex gap-3 divide-x-2 divide-gray-500">
                                    @if ($order->orderItems->first()->product->business->verified())
                                        <div class="flex gap-2">
                                            <h4 class="text-xs text-gray-800">Verified</h4>
                                            <i class="fas fa-shield-alt text-sm text-red-800"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="">
                                <span class="font-bold text-xl">{{ Str::upper($order->order_id) }}</span>
                                <div class="flex gap-1">
                                    <span class="">Status:</span>
                                    <span class="font-semibold">{{ Str::title($order->status) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        @foreach ($order->orderItems as $key => $item)
                            @php($min_order_quantity = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[0] : 0)
                            @php($max_order_quantity = $item->product->max_order_quantity ? explode(" ", $item->product->max_order_quantity)[0] : 10000000000)
                            @php($min_price = $item->product->min_price ? $item->product->min_price : $item->product->price)
                            @php($max_price = $item->product->max_price ? $item->product->max_price : $item->product->price)
                            @php($product_measurement_unit = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[1] : 'Kilograms')
                            <div>
                                <div class="flex w-full border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                                    <div class="basis-6/7 grid md:flex md:justify-between gap-2 px-2 text-gray-500">
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
                                                                <span id="order_quantity_{{ $item->id }}" name="items_quantities[{{ $item->product->id }}]" class="quantities border-0 outline-none focus:outline-none text-center w-full font-semibold flex items-center text-gray-900">
                                                                    {{ explode(' ', $item->quantity)[0] }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <span class="text-gray-500 text-sm font-bold my-auto mr-1">{{ $product_measurement_unit }}</span>
                                                        <input type="hidden" name="items_quantities_measurement_units[{{ $item->product->id }}]" value="{{ $product_measurement_unit }}">
                                                    </div>
                                                </div>
                                                <div class="my-auto md:col-span-1 md:ml-52 w-full">
                                                    @php($min_order_price = $item->product->min_price ? $item->product->min_price : $item->product->price)
                                                    <span class="flex gap-1">
                                                        <h4 class="text-gray-700 whitespace-nowrap my-auto">Unit Price:</h4>
                                                        <h3 class="font-semibold text-gray-600 my-auto">{{ $item->product->currency }}</h3>
                                                        <span class="prices text-gray-900 font-bold" name="items_prices[{{ $item->product->id }}]" id="items_prices_{{ $item->id }}">
                                                            {{ $item->amount }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex justify-end">
                                                @if ($item->inspectionRequest()->exists())
                                                    <span class="mx-2 p-2 text-black font-semibold bg-secondary-four rounded-md">Requested Inspection</span>
                                                @endif
                                                @if ($item->insuranceRequest()->exists())
                                                    <span class="mx-2 p-2 text-black font-semibold bg-secondary-five rounded-md">Requested Insurance</span>
                                                @endif
                                                @if ($item->deliveryRequest()->exists())
                                                    <span class="mx-2 p-2 text-black font-semibold bg-secondary-two rounded-md">Requested Shipping</span>
                                                @endif
                                                @if ($item->storageRequest()->exists())
                                                    <span class="mx-2 p-2 text-black font-semibold bg-secondary-one rounded-md">Requested Warehousing</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($order->invoice->additional_notes)
                            <div>
                                <h5 class="text-xl">Additional Notes</h5>
                                <span class="text-gray-800">{{ $order->invoice->additional_notes }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div id="app" class="mt-2">
                    <h3 class="text-lg text-black p-2 font-bold">Order Conversations</h3>
                    <div class="bg-gray-50 border-2 border-gray-400 rounded-lg">
                        <order-chat-component email="{!! auth()->user()->email !!}" order="{!! $order->id !!}"></order-chat-component>
                    </div>
                </div>
            </div>
            <div class="basis-1/3 space-y-2">
                <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                    <div class="flex justify-between">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Order Subtotal:</h4>
                            <div class="flex gap-1">
                                <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                                <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($order->getTotalAmount()) }}</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500">Order Total:</h4>
                            <div class="flex gap-1">
                                <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                                <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($order_total) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="block md:flex md:gap-2 md:justify-end">
                        <h4 class="text-gray-600 my-auto font-semibold">Delivery On:</h4>
                        <h5 class="text-gray-900 font-bold">{{ Carbon\Carbon::parse($order->orderItems->first()->delivery_date)->format('d M Y') }}</h5>
                    </div>
                </div>
                @foreach ($order->orderItems as $key => $item)
                    @if ($item->insuranceRequest()->exists() && $item->insuranceRequest->cost != null)
                        <div class="border border-gray-300 p-4 rounded-lg">
                            <div class="flex flex-col">
                                <h4 class="font-semibold text-gray-500">Insurance Quote:</h4>
                                <div class="flex justify-between">
                                    <div class="flex gap-1">
                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($item->insuranceRequest->cost) }}</span>
                                    </div>
                                    @if ($item->insuranceRequest->cost_description_file != null)
                                        <div>
                                            <a href="{{ $item->insuranceRequest->cost_description_file }}" target="_blank" class="p-2 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                        </div>
                                    @endif
                                </div>
                                @if ($item->insuranceRequest->cost_description != null)
                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                    <span class="text-gray-900 font-semibold">{{ $item->insuranceRequest->cost_description }}</span>
                                @endif
                            </div>
                            <div class="my-2">
                                <a href="#" class="p-2 bg-primary-one text-white rounded-md font-bold">Accept Quote</a>
                            </div>
                        </div>
                    @endif
                    @if ($item->inspectionRequest()->exists() && $item->inspectionRequest->cost != null)
                        <div class="border border-gray-300 p-4 rounded-lg">
                            <div class="flex flex-col">
                                <h4 class="font-semibold text-gray-500">Inspection Quote:</h4>
                                <div class="flex justify-between">
                                    <div class="flex gap-1">
                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($item->inspectionRequest->cost) }}</span>
                                    </div>
                                    @if ($item->inspectionRequest->cost_description_file != null)
                                        <div>
                                            <a href="{{ $item->inspectionRequest->cost_description_file }}" target="_blank" class="p-2 text-black font-semibold bg-secondary-four rounded-md">View Pro-forma</a>
                                        </div>
                                    @endif
                                </div>
                                @if ($item->inspectionRequest->cost_description != null)
                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                    <span class="text-gray-900 font-semibold">{{ $item->inspectionRequest->cost_description }}</span>
                                @endif
                            </div>
                            <div class="my-2">
                                <a href="#" class="p-2 bg-primary-one text-white rounded-md font-bold">Accept Quote</a>
                            </div>
                        </div>
                    @endif
                    @if ($item->storageRequest()->exists() && $item->storageRequest->cost != null)
                        <div class="border border-gray-300 p-4 rounded-lg">
                            <div class="flex flex-col">
                                <h4 class="font-semibold text-gray-500">Warehousing Quote:</h4>
                                <div class="flex justify-between">
                                    <div class="flex gap-1">
                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($item->storageRequest->cost) }}</span>
                                    </div>
                                    @if ($item->storageRequest->cost_description_file != null)
                                        <div>
                                            <a href="{{ $item->storageRequest->cost_description_file }}" target="_blank" class="p-2 text-black font-semibold bg-secondary-one rounded-md">View Pro-forma</a>
                                        </div>
                                    @endif
                                </div>
                                @if ($item->storageRequest->cost_description != null)
                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                    <span class="text-gray-900 font-semibold">{{ $item->storageRequest->cost_description }}</span>
                                @endif
                            </div>
                            <div class="my-2">
                                <a href="#" class="p-2 bg-primary-one text-white rounded-md font-bold">Accept Quote</a>
                            </div>
                        </div>
                    @endif
                    @if ($item->deliveryRequest()->exists() && $item->deliveryRequest->cost != null)
                        <div class="border border-gray-300 p-4 rounded-lg">
                            <div class="flex flex-col">
                                <h4 class="font-semibold text-gray-500">Insurance Quote:</h4>
                                <div class="flex justify-between">
                                    <div class="flex gap-1">
                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($item->deliveryRequest->cost) }}</span>
                                    </div>
                                    @if ($item->deliveryRequest->cost_description_file != null)
                                        <div>
                                            <a href="{{ $item->deliveryRequest->cost_description_file }}" target="_blank" class="p-2 text-black font-semibold bg-secondary-four rounded-md">View Pro-forma</a>
                                        </div>
                                    @endif
                                </div>
                                @if ($item->deliveryRequest->cost_description != null)
                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                    <span class="text-gray-900 font-semibold">{{ $item->deliveryRequest->cost_description }}</span>
                                @endif
                            </div>
                            <div class="my-2">
                                <a href="#" class="p-2 bg-primary-one text-white rounded-md font-bold">Accept Quote</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-main>
