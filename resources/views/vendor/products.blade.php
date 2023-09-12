<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Products" sub-title="All Your Products Are Here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div x-data="{ show: false }">
                <x-primary-button class="py-2 font-light bg-orange-600 tracking-wide -mt-2 mb-2 focus:ring-2 focus:ring-orange-600 px-8 text-sm" data-modal-target="add-product-modal" data-modal-toggle="add-product-modal">Add Product</x-primary-button>

                <x-modal modal_id="add-product-modal">
                    <div class="relative w-full max-w-4xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-product-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-2 py-2 lg:px-4">
                                <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">New Product</h3>
                                <livewire:add-product />
                                {{-- <ol class="flex items-center w-full space-x-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 sm:space-x-4">
                                    <li class="flex items-center">
                                        <span class="flex items-center justify-center w-8 h-8 mr-2 text-white text-xs bg-teal-400 rounded-full shrink-0">
                                            1
                                        </span>
                                        Product <span class="hidden sm:inline-flex sm:ml-2">Details</span>
                                        <svg class="w-3 h-3 ml-2 sm:ml-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                                        </svg>
                                    </li>
                                    <li class="flex items-center">
                                        <span class="flex items-center justify-center w-8 h-8 mr-2 text-white text-xs bg-gray-400 rounded-full shrink-0">
                                            2
                                        </span>
                                        Media &<span class="hidden sm:inline-flex sm:ml-2">More</span>
                                    </li>
                                </ol>
                                <form class="space-y-6" action="#">
                                    <div>
                                        <x-input-label for="product_name" :value="__('Product Name')" class="text-gray-500" />
                                        <input type="text" name="name" id="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="grid md:grid-cols-2 gap-2">
                                        <div>
                                            <x-input-label for="product_category" :value="__('Product Category')" class="text-gray-500" />
                                            <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                <option value="">Select Product Category</option>
                                                <option value="">Minerals</option>
                                                <option value="">Rare Metals</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_material" :value="__('Product Material')" class="text-gray-500" />
                                            <input type="text" name="material" id="product_material" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            <x-input-error :messages="$errors->get('material')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_price" :value="__('Price')" class="text-gray-500" />
                                            <input type="number" name="price" id="product_price" min="0" placeholder="0.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_place_of_origin" :value="__('Product Place of Origin')" class="text-gray-500" />
                                            <input type="text" name="place_of_origin" id="product_origin" min="0" placeholder="0.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            <x-input-error :messages="$errors->get('place_of_origin')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_brand" :value="__('Product Brand')" class="text-gray-500" />
                                            <input type="text" name="brand" id="product_brand" min="0" placeholder="0.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_shape" :value="__('Product Shape')" class="text-gray-500" />
                                            <select name="shape" id="product_shape" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                <option value="">Select Product Shape</option>
                                                <option value="">Rectangle</option>
                                                <option value="">Circle</option>
                                                <option value="">Square</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('shape')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_minimum_quantity_order" :value="__('Minimum Quantity Order')" class="text-gray-500" />
                                            <input type="number" name="minimum_quantity_order" id="product_minimum_quantity_order" min="1" placeholder="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            <x-input-error :messages="$errors->get('minimum_quantity_order')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_color" :value="__('Product Color')" class="text-gray-500" />
                                            <select name="color" id="product_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                <option value="">Select Product Color</option>
                                                <option value="">White</option>
                                                <option value="">Black</option>
                                                <option value="">Red</option>
                                                <option value="">Green</option>
                                                <option value="">Yellow</option>
                                                <option value="">Purple</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('shape')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_maximum_quantity_order" :value="__('maximum Quantity Order')" class="text-gray-500" />
                                            <input type="number" name="maximum_quantity_order" id="product_maximum_quantity_order" min="1" placeholder="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            <x-input-error :messages="$errors->get('maximum_quantity_order')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="product_usage" :value="__('Product Usage')" class="text-gray-500" />
                                            <select name="usage" id="product_usage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                <option value="">Select Product usage</option>
                                                <option value="">Home Decor</option>
                                                <option value="">Office Decor</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('shape')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-2">
                                        <x-secondary-outline-button class="text-center font-thin" data-modal-hide="add-product-modal">Discard</x-secondary-outline-button>
                                        <x-primary-button type="submit" class="w-2/5 font-thin rounded-lg text-sm px-5 py-2.5 text-center">Proceed</x-primary-button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                    </div>
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
