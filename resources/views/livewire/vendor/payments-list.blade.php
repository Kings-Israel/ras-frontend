<div>
    <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
        <thead class="text-xs text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
            <tr>
                <th scope="col" class="px-2 py-3">
                    Date
                </th>
                <th scope="col" class="px-2 py-3">
                    Transaction Ref
                </th>
                <th scope="col" class="px-2 py-3">
                    Status
                </th>
                <th scope="col" class="px-2 py-3">
                    Amount
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($escrow_payments as $escrow_payment)
                <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                    <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $escrow_payment->created_at->format('Y-m-d') }}
                    </th>
                    <td class="px-2 py-2">
                        {{ $escrow_payment->payment->transaction_ref }}
                    </td>
                    <td class="px-2 py-2">
                        <span class="{{ $escrow_payment->resolveStatus() }} rounded-md px-3">{{ Str::title($escrow_payment->status) }}</span>
                    </td>
                    <td class="px-2 py-2">
                        USD.{{ $escrow_payment->invoice->orders->first()->getTotalAmount(false) }}
                    </td>
                </tr>
            @endforeach
            {{-- <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    2023-07-23
                </th>
                <td class="px-2 py-2">
                    Bag of Copper Wire Purchase
                </td>
                <td class="px-2 py-2">
                    <span class="bg-red-200 rounded-md px-3">Failed</span>
                </td>
                <td class="px-2 py-2">
                    Ksh.64,483
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    2023-06-23
                </th>
                <td class="px-2 py-2">
                    Interese Payment
                </td>
                <td class="px-2 py-2">
                    <span class="bg-green-200 rounded-md px-3">Complete</span>
                </td>
                <td class="px-2 py-2">
                    Ksh.48,498
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    2023-06-13
                </th>
                <td class="px-2 py-2">
                    Bag of Copper Wire Purchase
                </td>
                <td class="px-2 py-2">
                    <span class="bg-yellow-200 rounded-md px-3">In Progress</span>
                </td>
                <td class="px-2 py-2">
                    Ksh.958,483
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    2023-05-23
                </th>
                <td class="px-2 py-2">
                    Bag of Copper Wire Purchase
                </td>
                <td class="px-2 py-2">
                    <span class="bg-green-200 rounded-md px-3">Complete</span>
                </td>
                <td class="px-2 py-2">
                    Ksh.640,045
                </td>
            </tr> --}}
        </tbody>
    </table>
    <div class="mt-2">
        {{ $escrow_payments->links('vendor.livewire.tailwind') }}
    </div>
</div>
