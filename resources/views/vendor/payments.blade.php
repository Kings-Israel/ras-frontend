<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Payments" sub-title="All Payments are seen here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <h3 class="text-xl font-bold my-2 mt-4">Earnings</h3>
            <div class="flex gap-3">
                <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md flex gap-2 mx-2 w-[30%]">
                    <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-green-600 text-xl bg-white rounded-full">
                        <i class="fas fa-money-bill-alt"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto">
                        <span class="text-sm">Wallet Balance</span>
                        <h1 class="text-xl font-extrabold">Ksh.3,685,338</h1>
                    </div>
                </div>
                <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md flex gap-2 mx-2 w-[30%] hover:bg-orange-400">
                    <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-gray-600 text-xl bg-white rounded-full">
                        <i class="fas fa-arrow-up"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto my-auto">
                        <span class="text-sm">Request Payment</span>
                    </div>
                </div>
                <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md flex gap-2 mx-2 w-[30%] hover:bg-orange-400">
                    <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-gray-600 text-xl bg-white rounded-full">
                        <i class="fas fa-arrow-down"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto my-auto">
                        <span class="text-sm">Withdraw</span>
                    </div>
                </div>
            </div>
            <h3 class="text-xl font-bold my-2 mt-4">Currency Converter</h3>
            <div class="border border-gray-400 rounded-md p-2 w-[50%]">
                <div class="flex gap-2 w-full mb-2">
                    <select name="" id="" class="text-gray-500 rounded-md w-[55%]">
                        <option value="">Select Currenct</option>
                        <option value="">Kenya Shilling (Ksh)</option>
                    </select>
                    <div class="w-[10%]"></div>
                    <select name="" id="" class="text-gray-500 rounded-md w-[55%]">
                        <option value="">Select Currency</option>
                        <option value="">US Dollar (US$)</option>
                    </select>
                </div>
                <div class="flex gap-3">
                    <x-text-input type="number" class="focus:ring-0"></x-text-input>
                    <div class="flex flex-col my-auto">
                        <i class="fas fa-arrow-left text-green-500"></i>
                        <i class="fas fa-arrow-right text-green-500"></i>
                    </div>
                    <x-text-input type="number" class="focus:ring-0"></x-text-input>
                </div>
            </div>
            <h3 class="text-xl font-bold my-2 mt-4">Transaction</h3>
            <div class="flex gap-6">
                <span class="font-extrabold text-orange-400 underline underline-offset-2 decoration-4">All Transaction</span>
                <span class="font-extrabold text-gray-400">Complete</span>
                <span class="font-extrabold text-gray-400">Failed</span>
                <span class="font-extrabold text-gray-400">In Progress</span>
            </div>
            <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                <thead class="text-xs text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Description
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
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                        <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            2023-09-13
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
                    </tr>
                    <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
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
                    </tr>
                </tbody>
            </table>
        </div>
        <x-right-side-bar />
    </div>
</x-app-layout>
