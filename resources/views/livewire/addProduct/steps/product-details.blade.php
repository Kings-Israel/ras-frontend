<div>
    @include('livewire.addProduct.add-product-nav')
    <div class="mb-2">
        <x-input-label for="product_name" :value="__('Product Name')" class="text-gray-500" />
        <input type="text" name="name" id="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div class="grid md:grid-cols-2 gap-3">
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
    <div class="flex justify-end gap-2 mt-4">
        {{-- <x-secondary-outline-button class="text-center font-thin text-gray-800" data-modal-hide="add-product-modal">Discard</x-secondary-outline-button> --}}
        <x-primary-button type="submit" class="w-2/5 font-thin rounded-lg px-5 py-2.5 text-center" wire:click="submit">Proceed</x-primary-button>
    </div>
</div>
