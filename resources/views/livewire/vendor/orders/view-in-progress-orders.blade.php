<div>
    <table class="w-full table table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 rounded-tl-lg rounded-tr-lg">
        <thead class="text-xs text-gray-900 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
            <tr>
                <th scope="col" class="px-2 py-3">
                    ID
                </th>
                <th scope="col" class="px-2 py-3">
                    Date
                </th>
                <th scope="col" class="px-2 py-3">
                    Products
                </th>
                <th scope="col" class="px-2 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-2 py-3">
                    Import Country
                </th>
                {{-- <th scope="col" class="px-2 py-3">
                    Export Country
                </th> --}}
                {{-- <th scope="col" class="px-2 py-3">
                    Warehouse Location
                </th> --}}
                <th scope="col" class="px-2 py-3">
                    Payment
                </th>
                <th scope="col" class="px-2 py-3">
                    Fulfilment
                </th>
                <th scope="col" class="px-2 py-3">
                    Amount
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="bg-gray-50 border-t-2 border-r-2 border-l-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer mb-3 expandChildTable">
                    <th scope="row" class="px-2 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        {{ $order->order_id }}
                    </th>
                    <td class="px-2 py-2 text-gray-500">
                        {{ $order->created_at->format('M D, Y') }}
                    </td>
                    <td class="px-2 py-2 text-gray-500">
                        {{ $order->orderItems->count() }}
                    </td>
                    <td class="px-2 py-2 text-gray-500">
                        23
                    </td>
                    <td class="px-2 py-2 text-gray-500">
                        {{ $order->invoice->getDeliveryCountry() }}
                    </td>
                    {{-- <td class="px-2 py-2 text-gray-500">
                        Kenya
                    </td> --}}
                    {{-- <td class="px-2 py-2 text-gray-500">
                        Dakar
                    </td> --}}
                    <td class="px-2 py-2">
                        <span class="{{ $order->invoice->resolvePaymentStatus() }} rounded-md px-3">{{ Str::title($order->invoice->payment_status) }}</span>
                    </td>
                    <td class="px-2 py-2 text-gray-500">
                        {{ Str::title($order->invoice->status) }}
                    </td>
                    <td class="px-2 py-2 text-gray-500">
                        {{ number_format($order->getTotalAmount(false)) }}
                    </td>
                </tr>
                <tr class="bg-gray-100 border-b-2 border-r-2 border-l-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer childTableRow">
                    <td colspan="10">
                        <ol class="flex justify-between items-center ml-5 mr-5 w-[96%]">
                            <li>
                                <span class="text-gray-400 font-bold">Processing</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">Inspection</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">Customs</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">Shipping</span>
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
                            <li @if($order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex w-full items-center text-primary-one dark:text-primary-one after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-400 after:border-4 after:inline-block dark:after:border-orange-800" @else class="flex items-center w-full after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block dark:after:border-gray-700" @endif>
                                <span @if($order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                    <svg @if($order->delivery_status == 'customs' || $order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="w-4 h-4 text-primary-one lg:w-4 lg:h-4 dark:text-primary-one" @else class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" @endif aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                    </svg>
                                </span>
                            </li>
                            <li @if($order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex w-full items-center text-primary-one dark:text-primary-one after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-400 after:border-4 after:inline-block dark:after:border-orange-800" @else class="flex items-center w-full after:justify-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block dark:after:border-gray-700" @endif>
                                <span @if($order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                    {{-- <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                    </svg> --}}
                                    <svg @if($order->delivery_status == 'shipping' || $order->delivery_status == 'delivered') class="w-6 h-6 text-primary-one lg:w-4 lg:h-6 dark:text-primary-one" @else class="w-6 h-6 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-300" @endif viewBox="0 0 491.1 491.1" xml:space="preserve"><g stroke-width="0"></g><g stroke-linecap="round" stroke-linejoin="round"></g><g> <g transform="translate(0 -540.36)"> <g> <g> <path d="M401.5,863.31c-12,0-23.4,4.7-32,13.2c-8.6,8.6-13.4,19.8-13.4,31.8s4.7,23.2,13.4,31.8c8.7,8.5,20,13.2,32,13.2 c24.6,0,44.6-20.2,44.6-45S426.1,863.31,401.5,863.31z M401.5,933.31c-13.8,0-25.4-11.4-25.4-25s11.6-25,25.4-25 c13.6,0,24.6,11.2,24.6,25S415.1,933.31,401.5,933.31z"></path> <path d="M413.1,713.41c-1.8-1.7-4.2-2.6-6.7-2.6h-51.3c-5.5,0-10,4.5-10,10v82c0,5.5,4.5,10,10,10h81.4c5.5,0,10-4.5,10-10v-54.9 c0-2.8-1.2-5.5-3.3-7.4L413.1,713.41z M426.5,792.81h-61.4v-62.1h37.4l24,21.6V792.81z"></path> <path d="M157.3,863.31c-12,0-23.4,4.7-32,13.2c-8.6,8.6-13.4,19.8-13.4,31.8s4.7,23.2,13.4,31.8c8.7,8.5,20,13.2,32,13.2 c24.6,0,44.6-20.2,44.6-45S181.9,863.31,157.3,863.31z M157.3,933.31c-13.8,0-25.4-11.4-25.4-25s11.6-25,25.4-25 c13.6,0,24.6,11.2,24.6,25S170.9,933.31,157.3,933.31z"></path> <path d="M90.6,875.61H70.5v-26.6c0-5.5-4.5-10-10-10s-10,4.5-10,10v36.6c0,5.5,4.5,10,10,10h30.1c5.5,0,10-4.5,10-10 S96.1,875.61,90.6,875.61z"></path> <path d="M141.3,821.11c0-5.5-4.5-10-10-10H10c-5.5,0-10,4.5-10,10s4.5,10,10,10h121.3C136.8,831.11,141.3,826.71,141.3,821.11z"></path> <path d="M30.3,785.01l121.3,0.7c5.5,0,10-4.4,10.1-9.9c0.1-5.6-4.4-10.1-9.9-10.1l-121.3-0.7c-0.1,0-0.1,0-0.1,0 c-5.5,0-10,4.4-10,9.9C20.3,780.51,24.8,785.01,30.3,785.01z"></path> <path d="M50.7,739.61H172c5.5,0,10-4.5,10-10s-4.5-10-10-10H50.7c-5.5,0-10,4.5-10,10S45.2,739.61,50.7,739.61z"></path> <path d="M487.4,726.11L487.4,726.11l-71.6-59.3c-1.8-1.5-4-2.3-6.4-2.3h-84.2v-36c0-5.5-4.5-10-10-10H60.5c-5.5,0-10,4.5-10,10 v73.2c0,5.5,4.5,10,10,10s10-4.5,10-10v-63.2h234.8v237.1h-82c-5.5,0-10,4.5-10,10s4.5,10,10,10h122.1c5.5,0,10-4.5,10-10 s-4.5-10-10-10h-20.1v-191.1h80.6l65.2,54l-0.7,136.9H460c-5.5,0-10,4.5-10,10s4.5,10,10,10h20.3c5.5,0,10-4.4,10-9.9l0.8-151.6 C491,730.91,489.7,728.01,487.4,726.11z"></path> </g> </g> </g> </g></svg>
                                </span>
                            </li>
                            <li @if($order->delivery_status == 'delivered') class="flex justify-center items-center before:justify-center before:content-[''] before:w-full before:h-1 before:border-b before:border-primary-one before:border-4 before:inline-block" @else class="flex justify-center items-center before:justify-center before:content-[''] before:w-full before:h-1 before:border-b before:border-gray-300 before:border-4 before:inline-block" @endif>
                                <span @if($order->delivery_status == 'delivered') class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0" @else class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" @endif>
                                    <svg @if($order->delivery_status == 'delivered') class="w-4 h-4 text-primary-one lg:w-4 lg:h-4 dark:text-primary-one" @else class="w-3.5 h-3.5 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" @endif aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                </span>
                            </li>
                        </ol>
                        <ol class="flex justify-between items-center ml-5 mr-5 w-[96%]">
                            <li>
                                <span class="text-gray-400 font-bold">March 23</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">April 01</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">April 15</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">April 30</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">May 1</span>
                            </li>
                        </ol>
                        <div class="flex gap-2 ml-5 mr-5 mt-2">
                            <div class="basis-2/5 border border-gray-200 rounded-md bg-white p-2">
                                <h2 class="font-bold text-lg">Order Items</h2>
                                @foreach ($order->orderItems as $item)
                                    <div class="flex justify-between border-b-2 ">
                                        <span class="font-semibold text-lg text-gray-700">{{ $item->product->name }}</span>
                                        <span class="font-semibold text-lg text-gray-600">{{ $item->product->currency }} {{ $item->product->price ? number_format($item->product->price) : number_format($item->product->min_price) }}</span>
                                    </div>
                                @endforeach
                                {{-- <div class="bg-gray-50 p-2">
                                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-52 h-40 mx-auto md:mx-0 object-cover rounded-md">
                                    <div class="flex justify-between mt-2 mx-8 md:mx-0">
                                        <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-16 h-16 lg:w-18 lg:h-18 object-cover rounded-md border border-primary-one">
                                        <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-16 h-16 lg:w-18 lg:h-18 object-cover rounded-md border border-primary-one">
                                        <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-16 h-16 lg:w-18 lg:h-18 object-cover rounded-md border border-primary-one">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="basis-3/5 border border-gray-300 rounded-lg py-2 bg-white px-4">
                                <div class="grid md:grid-cols-2">
                                    <div class="flex flex-col pb-5 mr-1">
                                        <h3 class="font-semibold text-lg">Driver</h3>
                                        <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="rounded-full w-16 h-16">
                                        <h2 class="font-extrabold text-xl">Ian Driver</h2>
                                        <div class="flex justify-between text-center pt-5">
                                            <span class="text-gray-400">ID Number</span>
                                            <span class="text-gray-600">0000000</span>
                                        </div>
                                    </div>
                                    <div class="ml-1">
                                        <h3 class="font-semibold text-lg">Vehicle</h3>
                                        <div class="grid space-y-2">
                                            <span class="text-gray-700 font-bold text-lg">Isuzu Truck (Black)</span>
                                            <span class="text-gray-500 font-bold">Vehicle Registration</span>
                                            <span class="text-gray-700 font-bold text-lg">KAG 404H</span>
                                            <div class="flex justify-between">
                                                <span class="text-gray-500 font-bold">Load Volume</span>
                                                <span class="text-gray-500 font-bold">650,000m</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between py-2 gap-2">
                                    <x-primary-outline-button class="w-full text-primary-one justify-center">
                                        <i class="fas fa-phone"></i>
                                        <span>Call</span>
                                    </x-primary-outline-button>
                                    <x-primary-button class="w-full text-center tracking-wide">
                                        Message
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            {{-- <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    D38748
                </th>
                <td class="px-2 py-2 text-gray-500">
                    Apr 30, 2023
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Tanzanite
                </td>
                <td class="px-2 py-2 text-gray-500">
                    39
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Zambia
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Egypt
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Kenya
                </td>
                <td class="px-2 py-2">
                    <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Processing
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Ksh.384,473
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    E47783
                </th>
                <td class="px-2 py-2 text-gray-500">
                    Jan 30, 2023
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Silver Chain
                </td>
                <td class="px-2 py-2 text-gray-500">
                    50
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Egypt
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Zambia
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Ethiopia
                </td>
                <td class="px-2 py-2">
                    <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Processing
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Ksh.674,287
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>
