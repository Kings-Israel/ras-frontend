<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Products" sub-title="All Your Products Are Here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div x-data="{ show: false }">
                <x-primary-button class="py-2 font-light bg-orange-600 tracking-wide -mt-2 mb-2 focus:ring-2 focus:ring-orange-600 px-8 text-sm" x-on:click="show = !show">Add Product</x-primary-button>
                <x-modal name="add_product">
                    <form action="#" method="post">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="name" />
                        <div class="footer flex justify-end gap-3">
                            <x-secondary-outline-button class="tracking-light font-light">Discard</x-secondary-outline-button>
                            <x-primary-button class="tracking-light font-light">Proceed</x-primary-button>
                        </div>
                    </form>
                </x-modal>
            </div>
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
                                Product Name
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Brand
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Amount
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Actions
                            </th>
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
                                Copper Wires
                            </th>
                            <td class="px-2 py-2">
                                ODB
                            </td>
                            <td class="px-2 py-2">
                                Electricals
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.237,948
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Gold Chains
                            </th>
                            <td class="px-2 py-2">
                                Afro Beats
                            </td>
                            <td class="px-2 py-2">
                                Ornaments
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.1,237,948
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Gold Dust
                            </th>
                            <td class="px-2 py-2">
                                Afro Beats
                            </td>
                            <td class="px-2 py-2">
                                Ornaments
                            </td>
                            <td class="px-2 py-2">
                                Out of stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.477,943
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Gold Cube
                            </th>
                            <td class="px-2 py-2">
                                Dangote
                            </td>
                            <td class="px-2 py-2">
                                Energy
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.3,334,542
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Green Bananas
                            </th>
                            <td class="px-2 py-2">
                                Simba
                            </td>
                            <td class="px-2 py-2">
                                Building Material
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.3,237,948
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Plastic Cups
                            </th>
                            <td class="px-2 py-2">
                                Dangote
                            </td>
                            <td class="px-2 py-2">
                                Building Material
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.493,498
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                West African Porcelain
                            </th>
                            <td class="px-2 py-2">
                                Afro Beats
                            </td>
                            <td class="px-2 py-2">
                                Ornaments
                            </td>
                            <td class="px-2 py-2">
                                Out of stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.249,848
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Tobacco
                            </th>
                            <td class="px-2 py-2">
                                Simba
                            </td>
                            <td class="px-2 py-2">
                                Building Material
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.2,237,543
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Bronze Wire
                            </th>
                            <td class="px-2 py-2">
                                Dangote
                            </td>
                            <td class="px-2 py-2">
                                Building Material
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.337,948
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Coltan
                            </th>
                            <td class="px-2 py-2">
                                Dangote
                            </td>
                            <td class="px-2 py-2">
                                Building Material
                            </td>
                            <td class="px-2 py-2">
                                Out of stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.3,237,948
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Cement Bags
                            </th>
                            <td class="px-2 py-2">
                                Simba
                            </td>
                            <td class="px-2 py-2">
                                Building Material
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.5,493,847
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
                                Asbestos
                            </th>
                            <td class="px-2 py-2">
                                Dangote
                            </td>
                            <td class="px-2 py-2">
                                Building Material
                            </td>
                            <td class="px-2 py-2">
                                In stock
                            </td>
                            <td class="px-2 py-2">
                                Ksh.3,237,948
                            </td>
                            <td class="px-2 py-2 flex gap-3">
                                <i class="fas fa-trash"></i>
                                <i class="fas fa-edit"></i>
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
