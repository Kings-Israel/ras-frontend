<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Customers" sub-title="All Your Customers Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="">
                <div class="md:flex md:justify-between space-y-2 my-2">
                    <div class="flex gap-6">
                        <x-primary-outline-button class="text-sm border-orange-700 text-orange-700 px-6 h-8">Bulk Actions <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
                        <x-primary-outline-button class="text-sm border-orange-700 text-orange-700 px-6 h-8">Filter <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
                    </div>
                    <div class="flex gap-2">
                        <a href="#" class="border-2 border-orange-700 rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-left text-sm"></i></a>
                        <span class="my-auto text-center">1/1</span>
                        <a href="#" class="border-2 border-orange-700 rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-right text-sm"></i></a>
                    </div>
                </div>
                <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                    <thead class="text-sm text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                        <tr>
                            <th scope="col" class="p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Customer Name
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Country
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-2 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Martha Munene
                            </th>
                            <td class="px-2 py-2">
                                Kenya
                            </td>
                            <td class="px-2 py-2">
                                Inactive
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Felix Onapi
                            </th>
                            <td class="px-2 py-2">
                                Zimbabwe
                            </td>
                            <td class="px-2 py-2">
                                Active
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Xin Peng
                            </th>
                            <td class="px-2 py-2">
                                South Africa
                            </td>
                            <td class="px-2 py-2">
                                Inactive
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                David Murume
                            </th>
                            <td class="px-2 py-2">
                                Uganda
                            </td>
                            <td class="px-2 py-2">
                                Active
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Stacy Liu
                            </th>
                            <td class="px-2 py-2">
                                Nigeria
                            </td>
                            <td class="px-2 py-2">
                                Inactive
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Wandera A.
                            </th>
                            <td class="px-2 py-2">
                                Tanzania
                            </td>
                            <td class="px-2 py-2">
                                Active
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Steve O.
                            </th>
                            <td class="px-2 py-2">
                                DRC
                            </td>
                            <td class="px-2 py-2">
                                Active
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Alice Vifurunga
                            </th>
                            <td class="px-2 py-2">
                                Kenya
                            </td>
                            <td class="px-2 py-2">
                                Active
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Bruno Was
                            </th>
                            <td class="px-2 py-2">
                                DRC
                            </td>
                            <td class="px-2 py-2">
                                Inactive
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Alonzo M.
                            </th>
                            <td class="px-2 py-2">
                                Zambia
                            </td>
                            <td class="px-2 py-2">
                                Inactive
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Andere Iggy
                            </th>
                            <td class="px-2 py-2">
                                Kenya
                            </td>
                            <td class="px-2 py-2">
                                Active
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-2 rounded-bl-xl rounded-br-xl dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <td class="w-4 p-2">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Didi Jones
                            </th>
                            <td class="px-2 py-2">
                                Botswana
                            </td>
                            <td class="px-2 py-2">
                                Active
                            </td>
                            <td class="px-2 py-2 text-center">
                                <i class="fas fa-ellipsis-v"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex gap-2 mt-2">
                    <a href="#" class="border-2 border-orange-700 rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-left text-sm"></i></a>
                    <span class="my-auto text-center">1/1</span>
                    <a href="#" class="border-2 border-orange-700 rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-right text-sm"></i></a>
                </div>
            </div>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')

    @endpush
</x-app-layout>
