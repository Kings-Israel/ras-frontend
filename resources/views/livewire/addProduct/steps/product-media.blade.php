<div>
    @include('livewire.addProduct.add-product-nav')
    <div class="grid md:grid-cols-2 gap-3">
        <div>
            <x-input-label for="product_description" :value="__('Product Description')" class="text-gray-500" />
            <input type="text" name="description" id="product_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="product_regional_feature" :value="__('Product\'s Regional Feature')" class="text-gray-500" />
            <select name="regional_feature" id="regional_feature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option value="">Select Product Regional Feature</option>
                <option value="">Africa</option>
                <option value="">US</option>
            </select>
            <x-input-error :messages="$errors->get('regional_feature')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="product_link_to_warehouse" :value="__('Link to Warehouse')" class="text-gray-500" />
            <select name="link_to_warehouse" id="link_to_warehouse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <option value="">Select Warehouse</option>
                <option value="">Sebuleni, Nairobi, Kenya</option>
                <option value="">Charlo's Place, Tanzania</option>
            </select>
            <x-input-error :messages="$errors->get('link_to_warehouse')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="product_model_number" :value="__('Product\'s Model Number')" class="text-gray-500" />
            <input type="text" name="model_number" id="product_model_number" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
            <x-input-error :messages="$errors->get('model_number')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="product_images" :value="__('Add Product Images')" class="text-gray-500" />
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" multiple name="images" accept=".jpg,.jpeg,.png" />
                </label>
            </div>
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="product_video" :value="__('Add Product Video')" class="text-gray-500" />
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">MP4 (MAX. 5MB)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="images" accept=".mp4" />
                </label>
            </div>
            <x-input-error :messages="$errors->get('video')" class="mt-2" />
        </div>
        <div>
            <x-input-label class="font-bold text-gray-500">Confirm Availabilty Status</x-input-label>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked value="in-stock" class="sr-only peer" name="product_availability">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-orange-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">In Stock</span>
              </label>
        </div>
    </div>
    <div class="flex justify-end gap-2 mt-4">
        <x-secondary-outline-button class="text-center text-gray-800 gap-2 focus:ring-0" wire:click="previousStep"><i class="fas fa-arrow-left text-gray-800"></i> Back</x-secondary-outline-button>
        <x-primary-button type="submit" class="w-2/5 font-thin rounded-lg px-5 py-2.5 text-center" wire:click="submit">Add Product</x-primary-button>
    </div>
</div>
