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
                                        <button data-modal-target="quotation-responses-modal" data-modal-toggle="quotation-responses-modal" class="bg-secondary-four p-2 rounded-lg font-semibold">View Vendor Quotations</button>
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
        @if ($order->status == 'in progress')
            <table class="w-full table table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 rounded-tl-lg rounded-tr-lg mt-2">
                <tbody>
                    <tr class="bg-gray-100 border-b-2 border-r-2 border-l-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <td colspan="10">
                            <ol class="flex justify-between items-center ml-5 mr-5 w-[96%]">
                                <li>
                                    <span class="text-gray-400 font-bold">Processing</span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold">Inspection</span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold">Shipping</span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold">Customs</span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold">Delivered</span>
                                </li>
                            </ol>
                            <ol class="flex items-center w-[96%] ml-5 my-3">
                                <li @if($order->delivery_status == 'processing' || $order->delivery_status == 'inspection' || $order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex w-full items-center text-primary-one dark:text-primary-one after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-400 after:border-4 after:inline-block dark:after:border-orange-800" @else class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block dark:after:border-gray-700" @endif>
                                    <span @if($order->delivery_status == 'processing' || $order->delivery_status == 'inspection' || $order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                        <svg @if($order->delivery_status == 'processing' || $order->delivery_status == 'inspection' || $order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="w-3.5 h-3.5 text-primary-one lg:w-4 lg:h-4 dark:text-primary-one" @else class="w-3.5 h-3.5 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" @endif aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </span>
                                </li>
                                <li @if($order->delivery_status == 'inspection' || $order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex w-full items-center text-primary-one dark:text-primary-one after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-400 after:border-4 after:inline-block dark:after:border-orange-800" @else class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block dark:after:border-gray-700" @endif>
                                    <span @if($order->delivery_status == 'inspection' || $order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                        <svg @if($order->delivery_status == 'inspection' || $order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="w-4 h-4 text-primary-one lg:w-4 lg:h-4 dark:text-primary-one" @else class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" @endif aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                            <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                    </span>
                                </li>
                                <li @if($order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex w-full items-center text-primary-one dark:text-primary-one after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-400 after:border-4 after:inline-block dark:after:border-orange-800" @else class="flex items-center w-full after:justify-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block dark:after:border-gray-700" @endif>
                                    <span @if($order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                        {{-- <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                        </svg> --}}
                                        <svg @if($order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="w-6 h-6 text-primary-one lg:w-4 lg:h-6 dark:text-primary-one" @else class="w-6 h-6 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-300" @endif viewBox="0 0 491.1 491.1" xml:space="preserve"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g transform="translate(0 -540.36)"> <g> <g> <path d="M401.5,863.31c-12,0-23.4,4.7-32,13.2c-8.6,8.6-13.4,19.8-13.4,31.8s4.7,23.2,13.4,31.8c8.7,8.5,20,13.2,32,13.2 c24.6,0,44.6-20.2,44.6-45S426.1,863.31,401.5,863.31z M401.5,933.31c-13.8,0-25.4-11.4-25.4-25s11.6-25,25.4-25 c13.6,0,24.6,11.2,24.6,25S415.1,933.31,401.5,933.31z"></path> <path d="M413.1,713.41c-1.8-1.7-4.2-2.6-6.7-2.6h-51.3c-5.5,0-10,4.5-10,10v82c0,5.5,4.5,10,10,10h81.4c5.5,0,10-4.5,10-10v-54.9 c0-2.8-1.2-5.5-3.3-7.4L413.1,713.41z M426.5,792.81h-61.4v-62.1h37.4l24,21.6V792.81z"></path> <path d="M157.3,863.31c-12,0-23.4,4.7-32,13.2c-8.6,8.6-13.4,19.8-13.4,31.8s4.7,23.2,13.4,31.8c8.7,8.5,20,13.2,32,13.2 c24.6,0,44.6-20.2,44.6-45S181.9,863.31,157.3,863.31z M157.3,933.31c-13.8,0-25.4-11.4-25.4-25s11.6-25,25.4-25 c13.6,0,24.6,11.2,24.6,25S170.9,933.31,157.3,933.31z"></path> <path d="M90.6,875.61H70.5v-26.6c0-5.5-4.5-10-10-10s-10,4.5-10,10v36.6c0,5.5,4.5,10,10,10h30.1c5.5,0,10-4.5,10-10 S96.1,875.61,90.6,875.61z"></path> <path d="M141.3,821.11c0-5.5-4.5-10-10-10H10c-5.5,0-10,4.5-10,10s4.5,10,10,10h121.3C136.8,831.11,141.3,826.71,141.3,821.11z"></path> <path d="M30.3,785.01l121.3,0.7c5.5,0,10-4.4,10.1-9.9c0.1-5.6-4.4-10.1-9.9-10.1l-121.3-0.7c-0.1,0-0.1,0-0.1,0 c-5.5,0-10,4.4-10,9.9C20.3,780.51,24.8,785.01,30.3,785.01z"></path> <path d="M50.7,739.61H172c5.5,0,10-4.5,10-10s-4.5-10-10-10H50.7c-5.5,0-10,4.5-10,10S45.2,739.61,50.7,739.61z"></path> <path d="M487.4,726.11L487.4,726.11l-71.6-59.3c-1.8-1.5-4-2.3-6.4-2.3h-84.2v-36c0-5.5-4.5-10-10-10H60.5c-5.5,0-10,4.5-10,10 v73.2c0,5.5,4.5,10,10,10s10-4.5,10-10v-63.2h234.8v237.1h-82c-5.5,0-10,4.5-10,10s4.5,10,10,10h122.1c5.5,0,10-4.5,10-10 s-4.5-10-10-10h-20.1v-191.1h80.6l65.2,54l-0.7,136.9H460c-5.5,0-10,4.5-10,10s4.5,10,10,10h20.3c5.5,0,10-4.4,10-9.9l0.8-151.6 C491,730.91,489.7,728.01,487.4,726.11z"></path> </g> </g> </g> </g></svg>
                                    </span>
                                </li>
                                <li @if($order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex w-full items-center text-primary-one dark:text-primary-one after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-400 after:border-4 after:inline-block dark:after:border-orange-800" @else class="flex items-center w-full after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block dark:after:border-gray-700" @endif>
                                    <span @if($order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                        <svg @if($order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="w-4 h-4 text-primary-one lg:w-4 lg:h-4 dark:text-primary-one" @else class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" @endif aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                        </svg>
                                    </span>
                                </li>
                                <li @if($order->status == 'delivered' && $order->delivery_status == 'delivered') class="flex justify-center items-center before:justify-center before:content-[''] before:w-full before:h-1 before:border-b before:border-primary-one before:border-4 before:inline-block" @else class="flex justify-center items-center before:justify-center before:content-[''] before:w-full before:h-1 before:border-b before:border-gray-300 before:border-4 before:inline-block" @endif>
                                    <span @if($order->status == 'delivered' && $order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                        <svg @if($order->status == 'delivered' && $order->delivery_status == 'delivered') class="w-4 h-4 text-primary-one lg:w-4 lg:h-4 dark:text-primary-one" @else class="w-3.5 h-3.5 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" @endif aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </span>
                                </li>
                            </ol>
                            <ol class="flex justify-between items-center ml-5 mr-5 w-[96%]">
                                <li>
                                    <span class="text-gray-400 font-bold">{{ $order->updated_at->format('M d') }}</span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold">{{ $order->checkInspectionIsComplete() ? Carbon\Carbon::parse($order->checkInspectionIsComplete())->format('M d') : '' }}</span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold"></span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold"></span>
                                </li>
                                <li>
                                    <span class="text-gray-400 font-bold"></span>
                                </li>
                            </ol>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
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
                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($order->getTotalAmount(false)) }}</span>
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
            @if (now()->lessThan(Carbon\Carbon::parse($order->orderItems->first()->delivery_date)))
                @if ($item->hasAcceptedAllRequests() && $order->status == 'pending')
                    <form action="{{ route('wallet.pay') }}" method="POST" id="pay-form">
                        @csrf
                        <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $order->invoice->id }}">
                        <div class="w-full flex">
                            <button type="submit" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold" id="pay-order-btn">Pay For Order</button>
                        </div>
                    </form>
                    <button class="hidden" id="confirm-payment-btn" data-modal-target="confirm-payment-modal" data-modal-toggle="confirm-payment-modal"></button>
                    <x-modal modal_id="confirm-payment-modal">
                        <div class="relative w-full max-w-lg max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="confirm-payment-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Confirm Payment</h2>
                                <div class="space-y-2 p-2">
                                    <form action="{{ route('wallet.pay.confirm') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ref" id="transaction_ref">

                                        <div class="form-group mt-2">
                                            <x-input-label for="Enter Code" :value="__('Enter Code to Confirm Payment')" />
                                            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" autocomplete="off" />
                                            <x-input-error :messages="$errors->get('otp')" class="mt-1" />
                                        </div>
                                        <div class="w-full flex mt-2">
                                            <button type="submit" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold">Pay</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                    @if (!$item->order->invoice->financingRequest()->exists())
                        <div class="w-full flex">
                            <a href="{{ route('invoice.financing.request', ['invoice' => $item->order->invoice]) }}" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold">Request For Financing</a>
                        </div>
                    @else
                        <div class="block md:flex md:flex-col md:gap-1">
                            <span class="font-semibold text-gray-800 mr-2">Financing Request Status:</span>
                            <span class="font-semibold text-gray-900 text-xl">{{ Str::title($item->order->invoice->financingRequest->status) }}</span>
                        </div>
                    @endif
                @else
                    @if ($item->order->invoice->payment_status == 'paid')
                        <div class="flex justify-between">
                            <span class="text-xl font-semibold">Order Status:</span>
                            <span class="font-semibold bg-secondary-six px-2 py-1 rounded-md">Paid</span>
                        </div>
                    @endif
                    @if ($item->order->status == 'cancelled')
                        <div class="flex justify-between">
                            <span class="text-xl font-semibold">Order Status:</span>
                            <span class="font-semibold bg-red-700 px-2 py-1 rounded-md">Cancelled</span>
                        </div>
                    @endif
                @endif
            @else
                <div class="bg-red-200 p-2 text-center rounded-lg">
                    <span class="text-lg text-red-700 w-full">Delivery Date For this order has passed the current date</span>
                </div>
            @endif
        </div>
        @foreach ($order->orderItems as $key => $orderItem)
            {{-- @foreach ($order_requests as $key => $order_request)
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
                        <button data-modal-target="view-pending-order-inspection-quotes" data-modal-toggle="view-pending-order-inspection-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Inspection Quote</button>
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
                        <button data-modal-target="view-pending-order-insurance-quotes" data-modal-toggle="view-pending-order-insurance-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Insurance Quote</button>
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
                        <button data-modal-target="view-pending-order-warehousing-quotes" data-modal-toggle="view-pending-order-warehousing-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Warehouse Quote</button>
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
                        <button data-modal-target="view-pending-order-logistics-quotes" data-modal-toggle="view-pending-order-logistics-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Logistics Quote</button>
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
            @endforeach --}}
            @foreach ($orderItem->orderRequests->groupBy('requesteable_type') as $key => $order_request)
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
                        <button data-modal-target="view-pending-order-inspection-quotes" data-modal-toggle="view-pending-order-inspection-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Inspection Quote</button>
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
                        <button data-modal-target="view-pending-order-insurance-quotes" data-modal-toggle="view-pending-order-insurance-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Insurance Quote</button>
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
                        <button data-modal-target="view-pending-order-warehousing-quotes" data-modal-toggle="view-pending-order-warehousing-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Warehouse Quote</button>
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
                        <button data-modal-target="view-pending-order-logistics-quotes" data-modal-toggle="view-pending-order-logistics-quotes" class="w-full bg-secondary-four text-lg font-semibold py-1 rounded-lg">View Logistics Quote</button>
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
            {{-- Show Upload Inspection Report form if Inspection Request Does not Exist --}}
            @php($inspection_exists = array_key_exists('App\\Models\\InspectingInstitution', $orderItem->orderRequests->groupBy('requesteable_type')->toArray()))
            @if (!$inspection_exists && now()->lessThan(Carbon\Carbon::parse($order->orderItems->first()->delivery_date)))
                <x-primary-button type="button" class="w-full py-2 truncate">Upload Inspection Report for {{ $orderItem->product->name }}</x-primary-button>
            @endif
        @endforeach
        @if (($order->status == 'quotation request' || $order->status == 'pending' || $order->status == 'accepted') && $order->invoice->payment_status != 'paid')
            <div class="flex justify-end">
                <button data-modal-target="delete-order-confirmed" data-modal-toggle="delete-order-confirmed" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 text-white text-center font-semibold transition duration-150 ease-in-out">Delete Order</button>
            </div>
            <x-modal modal_id="delete-order-confirmed">
                <div class="relative w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-order-confirmed">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Delete Order</h2>
                        <div class="px-2 py-2 lg:px-4">
                            <span class="font-semibold">Are You Sure You Want to delete the Order, {{ Str::upper($order->order_id) }}?</span><br>
                            <span class="font-semibold text-red-600">This action cannot be undone.</span>
                            <div class="flex gap-2 justify-end">
                                <a href="{{ route('orders.delete', ['order' => $order]) }}" class="bg-red-800 hover:bg-red-700 rounded-lg p-2 text-white text-center font-semibold transition duration-150 ease-in-out">Delete</a>
                                <button data-modal-hide="delete-order-confirmed" class="bg-gray-800 hover:bg-gray-600 rounded-lg p-2 text-white text-center font-semibold transition duration-150 ease-in-out">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-modal>
        @endif
    </div>
</div>
