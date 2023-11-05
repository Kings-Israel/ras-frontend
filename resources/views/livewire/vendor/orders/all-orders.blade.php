<div>
    <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
        <thead class="text-xs text-gray-900 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
            <tr>
                <th scope="col" class="px-2 py-3 text-gray-900">
                    ID
                </th>
                <th scope="col" class="px-2 py-3 text-gray-900">
                    Date
                </th>
                <th scope="col" class="px-2 py-3 text-gray-900">
                    Products
                </th>
                {{-- <th scope="col" class="px-2 py-3 text-gray-900">
                    Quantity
                </th> --}}
                <th scope="col" class="px-2 py-3 text-gray-900">
                    Country
                </th>
                <th scope="col" class="px-2 py-3 text-gray-900">
                    Payment
                </th>
                <th scope="col" class="px-2 py-3 text-gray-900">
                    Fulfilment
                </th>
                <th scope="col" class="px-2 py-3 text-gray-900">
                    Amount
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                    <th scope="row" class="px-2 py-2 font-extrabold text-gray-700 whitespace-nowrap dark:text-white hover:text-gray-800">
                        {{ $order->order_id }}
                    </th>
                    <td class="px-2 py-2 text-gray-600">
                        {{ $order->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-2 py-2 text-gray-600">
                        {{ $order->orderItems->count() }}
                    </td>
                    {{-- <td class="px-2 py-2 text-gray-600">
                        23
                    </td> --}}
                    <td class="px-2 py-2 text-gray-600">
                        {{ $order->invoice->getDeliveryCountry() }}
                    </td>
                    <td class="px-2 py-2">
                        <span class="{{ $order->invoice->resolvePaymentStatus() }} rounded-md px-3">{{ Str::title($order->invoice->payment_status) }}</span>
                    </td>
                    <td class="px-2 py-2 text-gray-600">
                        {{ Str::title($order->status) }}
                    </td>
                    <td class="px-2 py-2 text-gray-600">
                        Ksh.{{ number_format($order->invoice->total_amount) }}
                    </td>
                </tr>
            @endforeach
            {{-- <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    349854
                </th>
                <td class="px-2 py-2 text-gray-500">
                    Apr 30, 2023
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Gold Chains
                </td>
                <td class="px-2 py-2 text-gray-500">
                    300
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Zambia
                </td>
                <td class="px-2 py-2">
                    <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Cancelled
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Ksh.452,453
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    56858
                </th>
                <td class="px-2 py-2 text-gray-500">
                    Jan 27, 2023
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Tanzanite
                </td>
                <td class="px-2 py-2 text-gray-500">
                    180
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Kenya
                </td>
                <td class="px-2 py-2">
                    <span class="bg-green-200 rounded-md px-2">Paid</span>
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Delivered
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Ksh.235,387
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    349854
                </th>
                <td class="px-2 py-2 text-gray-500">
                    Apr 30, 2023
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Gold Chains
                </td>
                <td class="px-2 py-2 text-gray-500">
                    300
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Zambia
                </td>
                <td class="px-2 py-2">
                    <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Cancelled
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Ksh.452,453
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    565434
                </th>
                <td class="px-2 py-2 text-gray-500">
                    Apr 26, 2023
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Diamond
                </td>
                <td class="px-2 py-2 text-gray-500">
                    30
                </td>
                <td class="px-2 py-2 text-gray-500">
                    South Africa
                </td>
                <td class="px-2 py-2">
                    <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Cancelled
                </td>
                <td class="px-2 py-2 text-gray-500">
                    Ksh.1,452,453
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>
