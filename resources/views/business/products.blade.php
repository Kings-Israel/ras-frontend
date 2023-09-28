<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Products" sub-title="All Your Products Are Here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div x-data="{ show: false }">
                <x-primary-button class="py-2 font-light bg-primary-one tracking-wide -mt-2 mb-2 focus:ring-2 focus:ring-primary-one px-8 text-sm" data-modal-target="add-product-modal" data-modal-toggle="add-product-modal">Add Product</x-primary-button>

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
            <livewire:vendor.products-list />
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')

    @endpush
</x-app-layout>
