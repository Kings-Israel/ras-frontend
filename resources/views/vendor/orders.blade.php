<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Orders" sub-title="All Customer Orders Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <h3 class="text-xl font-bold my-2">Orders In Progress</h3>
            <table class="table w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Country
                        </th>
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
                    <tr class="bg-gray-50 border-t-2 border-r-2 border-l-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer mb-3" onclick="showRow()">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            A94858
                        </th>
                        <td class="px-2 py-2">
                            Mar 27, 2023
                        </td>
                        <td class="px-2 py-2">
                            Bag of Copper Wire
                        </td>
                        <td class="px-2 py-2">
                            23
                        </td>
                        <td class="px-2 py-2">
                            Senegal
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-green-200 rounded-md px-3">Paid</span>
                        </td>
                        <td class="px-2 py-2">
                            In Progress
                        </td>
                        <td class="px-2 py-2">
                            Ksh.237,948
                        </td>
                    </tr>
                    <tr class="bg-gray-50 border-b-2 border-r-2 border-l-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <td colspan="8">
                            <ol class="flex items-center w-full">
                                <li class="flex w-full items-center text-orange-600 dark:text-orange-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-100 after:border-4 after:inline-block dark:after:border-orange-800">
                                    <span class="flex items-center justify-center w-10 h-10 bg-orange-100 rounded-full lg:h-12 lg:w-12 dark:bg-orange-800 shrink-0">
                                        <svg class="w-3.5 h-3.5 text-orange-600 lg:w-4 lg:h-4 dark:text-orange-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </span>
                                </li>
                                <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                    <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                        <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                            <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                                        </svg>
                                    </span>
                                </li>
                                <li class="flex items-center w-full">
                                    <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                        <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                            <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                                        </svg>
                                    </span>
                                </li>
                            </ol>
                        </td>
                    </tr>
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            D38748
                        </th>
                        <td class="px-2 py-2">
                            Apr 30, 2023
                        </td>
                        <td class="px-2 py-2">
                            Tanzanite
                        </td>
                        <td class="px-2 py-2">
                            39
                        </td>
                        <td class="px-2 py-2">
                            Zambia
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                        </td>
                        <td class="px-2 py-2">
                            Processing
                        </td>
                        <td class="px-2 py-2">
                            Ksh.384,473
                        </td>
                    </tr>
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            E47783
                        </th>
                        <td class="px-2 py-2">
                            Jan 30, 2023
                        </td>
                        <td class="px-2 py-2">
                            Silver Chain
                        </td>
                        <td class="px-2 py-2">
                            50
                        </td>
                        <td class="px-2 py-2">
                            Egypt
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                        </td>
                        <td class="px-2 py-2">
                            Processing
                        </td>
                        <td class="px-2 py-2">
                            Ksh.674,287
                        </td>
                    </tr>
                </tbody>
            </table>

            <h3 class="text-xl font-bold my-2 mt-4">Recent Orders</h3>
            <div class="flex gap-6">
                <span class="font-extrabold text-orange-400 underline underline-offset-2 decoration-4">All Orders</span>
                <span class="font-extrabold text-gray-400">Paid</span>
                <span class="font-extrabold text-gray-400">Unpaid</span>
                <span class="font-extrabold text-gray-400">Cancelled</span>
                <span class="font-extrabold text-gray-400">In Progress</span>
            </div>
            <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Country
                        </th>
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
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            348758
                        </th>
                        <td class="px-2 py-2">
                            Mar 27, 2023
                        </td>
                        <td class="px-2 py-2">
                            Bag of Copper Wire
                        </td>
                        <td class="px-2 py-2">
                            23
                        </td>
                        <td class="px-2 py-2">
                            Senegal
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-green-200 rounded-md px-3">Paid</span>
                        </td>
                        <td class="px-2 py-2">
                            Delivered
                        </td>
                        <td class="px-2 py-2">
                            Ksh.235,387
                        </td>
                    </tr>
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            349854
                        </th>
                        <td class="px-2 py-2">
                            Apr 30, 2023
                        </td>
                        <td class="px-2 py-2">
                            Gold Chains
                        </td>
                        <td class="px-2 py-2">
                            300
                        </td>
                        <td class="px-2 py-2">
                            Zambia
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                        </td>
                        <td class="px-2 py-2">
                            Cancelled
                        </td>
                        <td class="px-2 py-2">
                            Ksh.452,453
                        </td>
                    </tr>
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            56858
                        </th>
                        <td class="px-2 py-2">
                            Jan 27, 2023
                        </td>
                        <td class="px-2 py-2">
                            Tanzanite
                        </td>
                        <td class="px-2 py-2">
                            180
                        </td>
                        <td class="px-2 py-2">
                            Kenya
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-green-200 rounded-md px-2">Paid</span>
                        </td>
                        <td class="px-2 py-2">
                            Delivered
                        </td>
                        <td class="px-2 py-2">
                            Ksh.235,387
                        </td>
                    </tr>
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            349854
                        </th>
                        <td class="px-2 py-2">
                            Apr 30, 2023
                        </td>
                        <td class="px-2 py-2">
                            Gold Chains
                        </td>
                        <td class="px-2 py-2">
                            300
                        </td>
                        <td class="px-2 py-2">
                            Zambia
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                        </td>
                        <td class="px-2 py-2">
                            Cancelled
                        </td>
                        <td class="px-2 py-2">
                            Ksh.452,453
                        </td>
                    </tr>
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            565434
                        </th>
                        <td class="px-2 py-2">
                            Apr 26, 2023
                        </td>
                        <td class="px-2 py-2">
                            Diamond
                        </td>
                        <td class="px-2 py-2">
                            30
                        </td>
                        <td class="px-2 py-2">
                            South Africa
                        </td>
                        <td class="px-2 py-2">
                            <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                        </td>
                        <td class="px-2 py-2">
                            Cancelled
                        </td>
                        <td class="px-2 py-2">
                            Ksh.1,452,453
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')
        <script>
            function showRow() {
                var x = document.getElementsByClassName('hidden-row')[0];
                if (x.style.display === "none" || x.style.display === "") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    @endpush
</x-app-layout>
