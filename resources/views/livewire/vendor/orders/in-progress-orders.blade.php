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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($in_progress_orders as $order)
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
                        {{ number_format($order->getTotalAmount(false)) }}
                    </td>
                    <td>
                        <a href="{{ route('vendor.orders.show', $order) }}" class="bg-primary-one px-2 py-1 text-white rounded-md hover:bg-orange-400 transition duration-150 ease-in-out">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
