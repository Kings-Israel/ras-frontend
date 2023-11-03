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
                        Ksh.{{ number_format($order->invoice->total_amount) }}
                    </td>
                </tr>
                <tr class="bg-gray-100 border-b-2 border-r-2 border-l-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer childTableRow">
                    <td colspan="10">
                        <ol class="flex justify-between items-center ml-5 mr-5 w-[72%]">
                            <li>
                                <span class="text-gray-400 font-bold">Clearance</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">Left Warehouse</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">Reception</span>
                            </li>
                        </ol>
                        <ol class="flex items-center w-full ml-5 my-3">
                            <li class="flex w-full items-center text-primary-one dark:text-primary-one after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-400 after:border-4 after:inline-block dark:after:border-orange-800">
                                <span class="flex items-center justify-center w-10 h-10 bg-orange-400 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0">
                                    <svg class="w-3.5 h-3.5 text-primary-one lg:w-4 lg:h-4 dark:text-primary-one" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                </span>
                            </li>
                            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-300 after:border-4 after:inline-block dark:after:border-gray-700">
                                <span class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                </span>
                            </li>
                            <li class="flex items-center w-full">
                                <span class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                    </svg>
                                </span>
                            </li>
                        </ol>
                        <ol class="flex justify-between items-center ml-5 mr-5 w-[72%]">
                            <li>
                                <span class="text-gray-400 font-bold">March 23</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">April 01</span>
                            </li>
                            <li>
                                <span class="text-gray-400 font-bold">April 15</span>
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
