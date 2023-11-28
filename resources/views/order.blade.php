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
                <li class="flex items-center @if($order->status == 'quotation request' || $order->status == 'pending' || $order->status == 'paid') text-primary-one @endif hover:cursor-pointer" id="negotiations">
                    Negotiating
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center @if($order->status == 'pending' || $order->status == 'paid') text-primary-one hover:cursor-pointer @endif" @if($order->status == 'pending' || $order->status == 'paid') id="order-confirmed" @endif>
                    Order <span class="hidden sm:inline-flex sm:ms-2"> Confirmed </span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center @if($order->status == 'paid') text-primary-one hover:cursor-pointer @endif" @if($order->status == 'paid') id="funded" @endif>
                    Funded <span class="hidden sm:inline-flex sm:ms-2"> To Escrow </span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center" id="shipped">
                    Shipped
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center" id="order-complete">
                    Order <span class="hidden sm:inline-flex sm:ms-2"> Complete </span>
                </li>
            </ol>
        </div>
        <section class="hidden" id="negotiations-section">
            <div class="block lg:flex px-4 lg:px-28 p-4 gap-2">
                <div>
                    <div class="basis-3/5 border border-gray-300 bg-gray-50 p-2 rounded-lg">
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
                                <div class="text-end">
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
                                @php($product_measurement_unit = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[1] : 'Kilograms')
                                <div>
                                    <div class="flex w-full rounded-lg px-1 py-1 md:px-2 md:py-2">
                                        <div class="">
                                            <div class="basis-6/7 grid md:flex md:justify-between gap-2 px-2">
                                                <div class="flex gap-3 md:min-w-fit md:mr-10">
                                                    @if ($item->product->media->where('type', 'image')->first())
                                                        <img src="{{ $item->product->media->where('type', 'image')->first()->file }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                                    @endif
                                                    <div class="flex flex-col">
                                                        <a href="{{ route('product', ['slug' => $item->product->slug]) }}" class="text-gray-900 font-bold text-md my-auto hover:text-gray-800">
                                                            {{ $item->product->name }}
                                                        </a>
                                                        <a href="{{ route('vendor.storefront', ['slug' => $item->product->business->slug]) }}" class="text-gray-800 font-semibold text-md my-auto hover:text-gray-700">
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
                                                            <span class="flex gap-1">
                                                                <h4 class="text-gray-700 whitespace-nowrap my-auto">Unit Price:</h4>
                                                                <h3 class="font-semibold text-gray-600 my-auto">{{ $item->product->currency }}</h3>
                                                                <span class="prices text-gray-900 font-bold" name="items_prices[{{ $item->product->id }}]" id="items_prices_{{ $item->id }}">
                                                                    {{ $item->amount }}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($item->quotationResponses->count() > 0)
                                                <div class="flex justify-end w-full">
                                                    <button data-modal-target="quotation-responses-modal" data-modal-toggle="quotation-responses-modal" class="bg-primary-two p-2 text-white rounded-lg font-semibold">View Vendor Quotations</button>
                                                </div>
                                                <x-modal modal_id="quotation-responses-modal">
                                                    <div class="relative w-full max-w-4xl max-h-full p-4">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" data-modal-hide="quotation-responses-modal" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="px-2 py-2 lg:px-4">
                                                                <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">Vendor Quotations</h3>
                                                                <div class="border border-gray-300 rounded-md px-1 mb-2">
                                                                    <div class="grid grid-cols-4 p-2 border-b-2">
                                                                        <span class="font-bold">Order Quantity</span>
                                                                        <span class=" font-bold">Amount</span>
                                                                        <span class=" font-bold">Added On</span>
                                                                        <span></span>
                                                                    </div>
                                                                    @foreach ($item->quotationResponses as $response)
                                                                        @if ($response->user_id == auth()->id())
                                                                            <div class="grid grid-cols-4 gap-2 w-full bg-yellow-200 p-2 rounded-md">
                                                                                <span>{{ $response->quantity }} {{ explode(' ', $response->orderItem->product->min_order_quantity)[1] }}</span>
                                                                                <span class="">
                                                                                    {{ $response->orderItem->product->business->global_currency ? $response->orderItem->product->business->global_currency : 'USD'}}
                                                                                    {{ $response->amount }}
                                                                                </span>
                                                                                <span class="">
                                                                                    {{ $response->created_at->format('d M Y H:i') }}
                                                                                </span>
                                                                                <span></span>
                                                                            </div>
                                                                        @else
                                                                            <div class="grid grid-cols-4 gap-2 w-full p-2 rounded-md">
                                                                                <span>{{ $response->quantity }} {{ explode(' ', $response->orderItem->product->min_order_quantity)[1] }}</span>
                                                                                <span class="">
                                                                                    {{ $response->orderItem->product->business->global_currency ? $response->orderItem->product->business->global_currency : 'USD'}}
                                                                                    {{ $response->amount }}
                                                                                </span>
                                                                                <span class="">
                                                                                    {{ $response->created_at->format('d M Y H:i') }}
                                                                                </span>
                                                                                @if ($response->status == 'pending')
                                                                                    <a href="{{ route('order.quotation.update', ['quotation' => $response, 'status' => 'accepted']) }}" class="bg-primary-one p-1 text-white rounded-md px-1 text-center">Accept</a>
                                                                                @else
                                                                                    <span class="font-semibold underline">{{ Str::title($response->status) }}</span>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </x-modal>
                                            @endif
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
                        <h3 class="text-lg text-black p-2 font-bold">Order Messages</h3>
                        <div class="bg-gray-50 border-2 border-gray-300 rounded-lg">
                            <order-chat-component email="{!! auth()->user()->email !!}" order="{!! $order->id !!}"></order-chat-component>
                        </div>
                    </div>
                </div>
                <div class="basis-2/5 space-y-2">
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
                        <div class="block md:flex md:gap-2">
                            <h4 class="text-gray-800 my-auto font-semibold">Delivery On:</h4>
                            <h5 class="text-gray-900 font-bold">{{ Carbon\Carbon::parse($order->orderItems->first()->delivery_date)->format('d M Y') }}</h5>
                        </div>
                        <div class="block md:flex md:flex-col md:gap-2">
                            <span class="font-semibold text-gray-800 mr-2">Delivery To: </span>
                            <span class="font-semibold text-gray-900 underline underline-offset-1">{{ $item->order->invoice->delivery_location_address }}</span>
                        </div>
                        @if ($item->hasAcceptedAllRequests() && $order->status == 'quotation request')
                            <form action="{{ route('orders.update', ['order' => $order]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <div class="w-full flex">
                                    <button type="submit" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold">Confirm Order</button>
                                </div>
                            </form>
                        @endif
                    </div>
                    @foreach ($order->orderItems as $key => $item)
                        @foreach ($order_requests as $key => $order_request)
                            @if ($key == 'App\\Models\\InspectingInstitution')
                                <div class="border border-gray-300 p-4 rounded-lg space-y-1">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Inspection Quotes:</h4>
                                        <h5 class="font-bold text-gray-900">{{ count($order_request) }}</h5>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span>Accepted Quote:</span>
                                            <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-quotes-inspection" data-modal-toggle="view-quotes-inspection" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Inspection Quotes</button>
                                    <x-modal modal_id="view-quotes-inspection">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-quotes-inspection">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Inspection Quotes</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                            <div class="flex justify-between w-full">
                                                                <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                @if ($request->cost != null && $request->status != 'accepted')
                                                                    <div class="my-2">
                                                                        <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            @if ($request->cost != null)
                                                                <div class="flex gap-1">
                                                                    <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                    <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                </div>
                                                            @else
                                                                <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                            @endif
                                                            @if ($request->cost_description != null)
                                                                <div class="flex flex-col">
                                                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                    <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                </div>
                                                            @endif
                                                            @if ($request->hasCostDescriptionFile())
                                                                <div class="my-2">
                                                                    <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @elseif ($key == 'App\\Models\\InsuranceCompany')
                                <div class="border border-gray-300 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Insurance Quotes:</h4>
                                        <h5 class="font-bold text-gray-900">{{ count($order_request) }}</h5>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span>Accepted Quote:</span>
                                            <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-quotes-insurance" data-modal-toggle="view-quotes-insurance" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Insurance Quotes</button>
                                    <x-modal modal_id="view-quotes-insurance">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-quotes-insurance">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Insurance Quotes</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                            <div class="flex justify-between w-full">
                                                                <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                @if ($request->cost != null && $request->status != 'accepted')
                                                                    <div class="my-2">
                                                                        <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            @if ($request->cost != null)
                                                                <div class="flex gap-1">
                                                                    <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                    <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                </div>
                                                            @else
                                                                <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                            @endif
                                                            @if ($request->cost_description != null)
                                                                <div class="flex flex-col">
                                                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                    <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                </div>
                                                            @endif
                                                            @if ($request->hasCostDescriptionFile())
                                                                <div class="my-2">
                                                                    <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @elseif ($key == 'App\\Models\\Warehouse')
                                <div class="border border-gray-300 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Warehouse Quotes:</h4>
                                        <h5 class="font-bold text-gray-900">{{ count($order_request) }}</h5>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span>Accepted Quote:</span>
                                            <span class="font-semibold">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-quotes-warehousing" data-modal-toggle="view-quotes-warehousing" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Warehouse Quotes</button>
                                    <x-modal modal_id="view-quotes-warehousing">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-quotes-warehousing">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Warehousing/Storage Quotes</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                            <div class="flex justify-between w-full">
                                                                <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                @if ($request->cost != null && $request->status != 'accepted')
                                                                    <div class="my-2">
                                                                        <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            @if ($request->cost != null)
                                                                <div class="flex gap-1">
                                                                    <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                    <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                </div>
                                                            @else
                                                                <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                            @endif
                                                            @if ($request->cost_description != null)
                                                                <div class="flex flex-col">
                                                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                    <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                </div>
                                                            @endif
                                                            @if ($request->hasCostDescriptionFile())
                                                                <div class="my-2">
                                                                    <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @elseif ($key == 'App\\Models\\LogisticsCompany')
                                <div class="border border-gray-300 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Delivery Quotes:</h4>
                                        <h5 class="font-bold text-gray-900">{{ count($order_request) }}</h5>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span class="whitespace-nowrap">Accepted Quote:</span>
                                            <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-quotes-logistics" data-modal-toggle="view-quotes-logistics" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Logistics Quotes</button>
                                    <x-modal modal_id="view-quotes-logistics">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-quotes-logistics">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Logistics/Delivery Quotes</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                            <div class="flex justify-between w-full">
                                                                <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                @if ($request->cost != null && $request->status != 'accepted')
                                                                    <div class="my-2">
                                                                        <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            @if ($request->cost != null)
                                                                <div class="flex gap-1">
                                                                    <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                    <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                </div>
                                                            @else
                                                                <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                            @endif
                                                            @if ($request->cost_description != null)
                                                                <div class="flex flex-col">
                                                                    <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                    <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                </div>
                                                            @endif
                                                            @if ($request->hasCostDescriptionFile())
                                                                <div class="my-2">
                                                                    <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @endif
                        @endforeach
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
                                                <a href="{{ $item->insuranceRequest->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($item->insuranceRequest->cost_description != null)
                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                        <span class="text-gray-900 font-semibold">{{ $item->insuranceRequest->cost_description }}</span>
                                    @endif
                                </div>
                                @if ($item->insuranceRequest->status != 'accpeted')
                                    <div class="my-2">
                                        <a href="{{ route('order.request.update', ['request' => $item->insuranceRequest->id, 'status' => 'accepted', 'type' => 'App\\Models\\InsuranceRequest']) }}" class="p-1 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                    </div>
                                @endif
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
                                                <a href="{{ $item->inspectionRequest->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-four rounded-md">View Pro-forma</a>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($item->inspectionRequest->cost_description != null)
                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                        <span class="text-gray-900 font-semibold">{{ $item->inspectionRequest->cost_description }}</span>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <a href="{{ route('order.request.update', ['request' => $item->inspectionRequest->id, 'status' => 'accepted', 'type' => 'App\\Models\\InspectionRequest']) }}" class="p-1 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
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
                                                <a href="{{ $item->storageRequest->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-one rounded-md">View Pro-forma</a>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($item->storageRequest->cost_description != null)
                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                        <span class="text-gray-900 font-semibold">{{ $item->storageRequest->cost_description }}</span>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <a href="{{ route('order.request.update', ['request' => $item->storageRequest->id, 'status' => 'accepted', 'type' => 'App\\Models\\OrderStorageRequest']) }}" class="p-1 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
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
                                                <a href="{{ $item->deliveryRequest->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-four rounded-md">View Pro-forma</a>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($item->deliveryRequest->cost_description != null)
                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                        <span class="text-gray-900 font-semibold">{{ $item->deliveryRequest->cost_description }}</span>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <a href="{{ route('order.request.update', ['request' => $item->deliveryRequest->id, 'status' => 'accepted', 'type' => 'App\\Models\\OrderDeliveryRequest']) }}" class="p-1 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if ($order->status == 'quotation request' || $order->status == 'pending')
                        <div class="flex justify-end">
                            <a href="{{ route('orders.delete', ['order' => $order]) }}" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 text-white text-center font-semibold">Delete Order</a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="hidden" id="order-confirmed-section">
            <div class="block lg:flex px-4 lg:px-28 p-4 gap-2">
                <div>
                    <div class="basis-3/5 border border-gray-300 bg-gray-50 p-2 rounded-lg">
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
                                <div class="text-end">
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
                                @php($product_measurement_unit = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[1] : 'Kilograms')
                                <div>
                                    <div class="flex w-full rounded-lg px-1 py-1 md:px-2 md:py-2">
                                        <div class="">
                                            <div class="basis-6/7 grid md:flex md:justify-between gap-2 px-2">
                                                <div class="flex gap-3 md:min-w-fit md:mr-10">
                                                    @if ($item->product->media->where('type', 'image')->first())
                                                        <img src="{{ $item->product->media->where('type', 'image')->first()->file }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                                    @endif
                                                    <div class="flex flex-col">
                                                        <a href="{{ route('product', ['slug' => $item->product->slug]) }}" class="text-gray-900 font-bold text-md my-auto hover:text-gray-800">
                                                            {{ $item->product->name }}
                                                        </a>
                                                        <a href="{{ route('vendor.storefront', ['slug' => $item->product->business->slug]) }}" class="text-gray-800 font-semibold text-md my-auto hover:text-gray-700">
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
                                                            <span class="flex gap-1">
                                                                <h4 class="text-gray-700 whitespace-nowrap my-auto">Unit Price:</h4>
                                                                <h3 class="font-semibold text-gray-600 my-auto">{{ $item->product->currency }}</h3>
                                                                <span class="prices text-gray-900 font-bold" name="items_prices[{{ $item->product->id }}]" id="items_prices_{{ $item->id }}">
                                                                    {{ $item->amount }}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($item->quotationResponses->count() > 0)
                                                <div class="flex justify-end w-full">
                                                    <button data-modal-target="quotation-responses-modal" data-modal-toggle="quotation-responses-modal" class="bg-primary-two p-2 text-white rounded-lg font-semibold">View Vendor Quotations</button>
                                                </div>
                                                <x-modal modal_id="quotation-responses-modal">
                                                    <div class="relative w-full max-w-4xl max-h-full p-4">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" data-modal-hide="quotation-responses-modal" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="px-2 py-2 lg:px-4">
                                                                <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">Vendor Quotations</h3>
                                                                <div class="border border-gray-300 rounded-md px-1 mb-2">
                                                                    <div class="grid grid-cols-4 p-2 border-b-2">
                                                                        <span class="font-bold">Order Quantity</span>
                                                                        <span class=" font-bold">Amount</span>
                                                                        <span class=" font-bold">Added On</span>
                                                                        <span></span>
                                                                    </div>
                                                                    @foreach ($item->quotationResponses as $response)
                                                                        @if ($response->user_id == auth()->id())
                                                                            <div class="grid grid-cols-4 gap-2 w-full bg-yellow-200 p-2 rounded-md">
                                                                                <span>{{ $response->quantity }} {{ explode(' ', $response->orderItem->product->min_order_quantity)[1] }}</span>
                                                                                <span class="">
                                                                                    {{ $response->orderItem->product->business->global_currency ? $response->orderItem->product->business->global_currency : 'USD'}}
                                                                                    {{ $response->amount }}
                                                                                </span>
                                                                                <span class="">
                                                                                    {{ $response->created_at->format('d M Y H:i') }}
                                                                                </span>
                                                                                <span></span>
                                                                            </div>
                                                                        @else
                                                                            <div class="grid grid-cols-4 gap-2 w-full p-2 rounded-md">
                                                                                <span>{{ $response->quantity }} {{ explode(' ', $response->orderItem->product->min_order_quantity)[1] }}</span>
                                                                                <span class="">
                                                                                    {{ $response->orderItem->product->business->global_currency ? $response->orderItem->product->business->global_currency : 'USD'}}
                                                                                    {{ $response->amount }}
                                                                                </span>
                                                                                <span class="">
                                                                                    {{ $response->created_at->format('d M Y H:i') }}
                                                                                </span>
                                                                                <span class="font-semibold underline">{{ Str::title($response->status) }}</span>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </x-modal>
                                            @endif
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
                    <div id="app-orders" class="mt-2">
                        <h3 class="text-lg text-black p-2 font-bold">Order Messages</h3>
                        <div class="bg-gray-50 border-2 border-gray-300 rounded-lg">
                            <order-chat-component email="{!! auth()->user()->email !!}" order="{!! $order->id !!}"></order-chat-component>
                        </div>
                    </div>
                </div>
                <div class="basis-2/5 space-y-2">
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
                        <div class="block md:flex md:gap-2">
                            <h4 class="text-gray-800 my-auto font-semibold">Delivery On:</h4>
                            <h5 class="text-gray-900 font-bold">{{ Carbon\Carbon::parse($order->orderItems->first()->delivery_date)->format('d M Y') }}</h5>
                        </div>
                        <div class="block md:flex md:flex-col md:gap-2">
                            <span class="font-semibold text-gray-800 mr-2">Delivery To: </span>
                            <span class="font-semibold text-gray-900 underline underline-offset-1">{{ $item->order->invoice->delivery_location_address }}</span>
                        </div>
                        @if ($item->hasAcceptedAllRequests() && $order->status == 'pending')
                            <form action="#" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <div class="w-full flex">
                                    <button type="submit" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold">Pay For Order</button>
                                </div>
                            </form>
                            <form action="#" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <div class="w-full flex">
                                    <button type="submit" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold">Request For Financing</button>
                                </div>
                            </form>
                        @endif
                    </div>
                    @foreach ($order->orderItems as $key => $item)
                        @foreach ($order_requests as $key => $order_request)
                            @if ($key == 'App\\Models\\InspectingInstitution')
                                <div class="border border-gray-300 p-4 rounded-lg space-y-1">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Inspection Quote:</h4>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span>Accepted Quote:</span>
                                            <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-pending-order-inspection-quotes" data-modal-toggle="view-pending-order-inspection-quotes" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Inspection Quote</button>
                                    <x-modal modal_id="view-pending-order-inspection-quotes">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-pending-order-inspection-quotes">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Inspection Quote</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        @if ($request->status == 'accepted')
                                                            <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                                <div class="flex justify-between w-full">
                                                                    <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                    <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                    @if ($request->cost != null && $request->status != 'accepted')
                                                                        <div class="my-2">
                                                                            <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @if ($request->cost != null)
                                                                    <div class="flex gap-1">
                                                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                    </div>
                                                                @else
                                                                    <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                                @endif
                                                                @if ($request->cost_description != null)
                                                                    <div class="flex flex-col">
                                                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                        <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                    </div>
                                                                @endif
                                                                @if ($request->hasCostDescriptionFile())
                                                                    <div class="my-2">
                                                                        <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @elseif ($key == 'App\\Models\\InsuranceCompany')
                                <div class="border border-gray-300 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Insurance Quote:</h4>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span>Accepted Quote:</span>
                                            <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-pending-order-insurance-quotes" data-modal-toggle="view-pending-order-insurance-quotes" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Insurance Quote</button>
                                    <x-modal modal_id="view-pending-order-insurance-quotes">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-pending-order-insurance-quotes">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Insurance Quote</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        @if ($request->status == 'accepted')
                                                            <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                                <div class="flex justify-between w-full">
                                                                    <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                    <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                    @if ($request->cost != null && $request->status != 'accepted')
                                                                        <div class="my-2">
                                                                            <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @if ($request->cost != null)
                                                                    <div class="flex gap-1">
                                                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                    </div>
                                                                @else
                                                                    <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                                @endif
                                                                @if ($request->cost_description != null)
                                                                    <div class="flex flex-col">
                                                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                        <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                    </div>
                                                                @endif
                                                                @if ($request->hasCostDescriptionFile())
                                                                    <div class="my-2">
                                                                        <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @elseif ($key == 'App\\Models\\Warehouse')
                                <div class="border border-gray-300 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Warehouse Quote:</h4>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span>Accepted Quote:</span>
                                            <span class="font-semibold">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-pending-order-warehousing-quotes" data-modal-toggle="view-pending-order-warehousing-quotes" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Warehouse Quote</button>
                                    <x-modal modal_id="view-pending-order-warehousing-quotes">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-pending-order-warehousing-quotes">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Warehousing/Storage Quote</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        @if ($request->status == 'accepted')
                                                            <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                                <div class="flex justify-between w-full">
                                                                    <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                    <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                    @if ($request->cost != null && $request->status != 'accepted')
                                                                        <div class="my-2">
                                                                            <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @if ($request->cost != null)
                                                                    <div class="flex gap-1">
                                                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                    </div>
                                                                @else
                                                                    <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                                @endif
                                                                @if ($request->cost_description != null)
                                                                    <div class="flex flex-col">
                                                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                        <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                    </div>
                                                                @endif
                                                                @if ($request->hasCostDescriptionFile())
                                                                    <div class="my-2">
                                                                        <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @elseif ($key == 'App\\Models\\LogisticsCompany')
                                <div class="border border-gray-300 p-4 rounded-lg">
                                    <div class="flex justify-between">
                                        <h4 class="font-semibold text-gray-700">Delivery Quote:</h4>
                                    </div>
                                    @php($accepted_request = $order_request->where('status', 'accepted')->first())
                                    @if ($accepted_request)
                                        <div class="flex justify-between">
                                            <span class="whitespace-nowrap">Accepted Quote:</span>
                                            <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Accepted Quote Cost:</span>
                                            <span class="font-semibold">{{ $accepted_request->cost }}</span>
                                        </div>
                                    @endif
                                    <button data-modal-target="view-pending-order-logistics-quotes" data-modal-toggle="view-pending-order-logistics-quotes" class="w-full bg-primary-two text-lg font-semibold text-white py-1 rounded-lg">View Logistics Quote</button>
                                    <x-modal modal_id="view-pending-order-logistics-quotes">
                                        <div class="relative w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-pending-order-logistics-quotes">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Logistics/Delivery Quote</h2>
                                                <div class="space-y-2 p-2">
                                                    @foreach ($order_request as $request)
                                                        @if ($request->status == 'accepted')
                                                            <div class="px-2 py-2 lg:px-4 border border-gray-300 rounded-lg">
                                                                <div class="flex justify-between w-full">
                                                                    <h3 class="font-semibold text-gray-700">{{ $request->requesteable->name }}</h3>
                                                                    <h4 class="font-semibold text-gray-900">Status: <span class="underline">{{ Str::title($request->status) }}</span></h4>
                                                                    @if ($request->cost != null && $request->status != 'accepted')
                                                                        <div class="my-2">
                                                                            <a href="{{ route('order.request.update', ['order_request' => $request->id, 'status' => 'accepted']) }}" class="p-2 bg-primary-one text-white rounded-md font-semibold">Accept Quote</a>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                @if ($request->cost != null)
                                                                    <div class="flex gap-1">
                                                                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($request->orderItem->product->currency) }}</h3>
                                                                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($request->cost) }}</span>
                                                                    </div>
                                                                @else
                                                                    <h4 class="font-semibold text-red-900 underline">Cost Details Not Entered</h4>
                                                                @endif
                                                                @if ($request->cost_description != null)
                                                                    <div class="flex flex-col">
                                                                        <span class="text-gray-500 font-bold underline underline-offset-1">Cost Description</span>
                                                                        <span class="text-gray-900 font-semibold">{{ $request->cost_description }}</span>
                                                                    </div>
                                                                @endif
                                                                @if ($request->hasCostDescriptionFile())
                                                                    <div class="my-2">
                                                                        <a href="{{ $request->cost_description_file }}" target="_blank" class="p-1 text-black font-semibold bg-secondary-five rounded-md">View Pro-forma</a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        const order_status = {!! json_encode($order->status) !!}
        const negotiations = document.querySelector('#negotiations')
        const negotiations_section = document.querySelector('#negotiations-section')
        const order_confirmed = document.querySelector('#order-confirmed')
        const order_confirmed_section = document.querySelector('#order-confirmed-section')

        switch (order_status) {
            case 'quotation request':
                negotiations_section.classList.remove('hidden')
                break;
            case 'pending':
                order_confirmed_section.classList.remove('hidden')
                break;
            default:
                negotiations_section.classList.remove('hidden')
                break;
        }

        negotiations.addEventListener('click', function () {
            order_confirmed_section.classList.add('hidden')
            negotiations_section.classList.remove('hidden')
        })

        order_confirmed.addEventListener('click', function () {
            order_confirmed_section.classList.remove('hidden')
            negotiations_section.classList.add('hidden')
        })
    </script>
</x-main>
