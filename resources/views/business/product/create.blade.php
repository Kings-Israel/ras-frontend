<div>
    <div class="bs-stepper wizard p-4" id="product-details-wizard">
        <div class="bs-stepper-header mb-4">
            <div class="step" data-target="#product-details">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label mt-1">
                      <span class="bs-stepper-title">Product Details</span>
                    </span>
                </button>
            </div>
            <div class="line">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="step" data-target="#product-media">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label mt-1">
                      <span class="bs-stepper-title">Media and More</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <form method="POST" action="{{ route('vendor.products.store') }}" id="product-details-wizard-form" enctype="multipart/form-data">
                @csrf
                <div class="content" id="product-details">
                    <div class="mb-2 form-group">
                        <x-input-label for="product_name" :value="__('Product Name')" class="text-gray-500" />
                        <input type="text" name="name" :value="old('name')" id="name" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="grid md:grid-cols-2 gap-3">
                        @php($category_ids = $categories->pluck('id')->toArray())
                        <div class="form-group">
                            <x-input-label for="category" :value="__('Product Category')" class="text-gray-500" />
                            <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Select Product Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if(in_array(old('category'), $category_ids)) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_material" :value="__('Product Material')" class="text-gray-500" />
                            <input type="text" name="material" :value="old('material')" id="product_material" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <x-input-error :messages="$errors->get('material')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_price" :value="__('Price (USD$)')" class="text-gray-500" />
                            <input type="number" name="price" :value="old('price')" id="product_price" min="0" placeholder="0.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-2 gap-1">
                            <div class="form-group">
                                <x-input-label for="product_min_price" :value="__('Min price (USD$)')" class="text-gray-500" />
                                <input type="number" name="min_price" :value="old('min_price')" id="product_min_price" min="0" placeholder="0.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <x-input-error :messages="$errors->get('min_price')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="product_max_price" :value="__('Max Price(USD$)')" class="text-gray-500" />
                                <input type="number" name="max_price" :value="old('max_price')" id="product_max_price" min="0" placeholder="0.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <x-input-error :messages="$errors->get('min_price')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex gap-1">
                            <div class="basis-3/4 form-group">
                                <x-input-label for="product_minimum_quantity_order" :value="__('Minimum Quantity Order')" class="text-gray-500" />
                                <input type="number" name="minimum_quantity_order" id="product_minimum_quantity_order" min="1" placeholder="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <x-input-error :messages="$errors->get('minimum_quantity_order')" class="mt-2" />
                                <x-input-error :messages="$errors->get('minimum_quantity_order_unit')" class="mt-2" />
                            </div>
                            <div class="basis-1/4 form-group">
                                <x-input-label for="product_brand" :value="__('Unit')" class="text-gray-500" />
                                <select name="min_quantity_order_unit" id="min_quantity_order_unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                    <option value="">Unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->name }}" @if(in_array(old('min_quantity_order_unit'), $units->toArray())) selected @endif>{{ $unit->name }} @if($unit->abbrev) - ({{ $unit->abbrev }}) @endif</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-1">
                            <div class="basis-3/4 form-group">
                                <x-input-label for="product_maximum_quantity_order" :value="__('Maximum Quantity Order')" class="text-gray-500" />
                                <input type="number" name="maximum_quantity_order" id="product_maximum_quantity_order" min="1" placeholder="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <x-input-error :messages="$errors->get('maximum_quantity_order')" class="mt-2" />
                                <x-input-error :messages="$errors->get('maximum_quantity_order_unit')" class="mt-2" />
                            </div>
                            <div class="basis-1/4 form-group">
                                <x-input-label for="product_brand" :value="__('Unit')" class="text-gray-500" />
                                <select name="max_quantity_order_unit" id="max_quantity_order_unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                    <option value="">Unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->name }}" @if(in_array(old('max_quantity_order_unit'), $units->toArray())) selected @endif>{{ $unit->name }} @if($unit->abbrev) - ({{ $unit->abbrev }}) @endif</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_place_of_origin" :value="__('Product Place of Origin')" class="text-gray-500" />
                            <input type="text" name="place_of_origin" id="product_origin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <x-input-error :messages="$errors->get('place_of_origin')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_brand" :value="__('Product Brand')" class="text-gray-500" />
                            <input type="text" name="brand" id="product_brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_shape" :value="__('Product Shape')" class="text-gray-500" />
                            <select name="shape" id="product_shape" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Select Product Shape</option>
                                @foreach ($shapes as $shape)
                                    <option value="{{ $shape }}" @if(in_array(old('shape'), $shapes)) selected @endif>{{ $shape }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('shape')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="product_color" :value="__('Product Color')" class="text-gray-500" />
                            <select name="color" id="product_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Select Product Color</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color }}" @if(in_array(old('color'), $colors)) selected @endif>{{ $color }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('color')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_usage" :value="__('Product Usage')" class="text-gray-500" />
                            <select name="usage" id="product_usage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Select Product usage</option>
                                @foreach ($usages as $usage)
                                    <option value="{{ $usage }}" @if(in_array(old('usage'), $usages)) selected @endif>{{ $usage }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('usage')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <x-primary-button type="submit" class="w-2/5 font-semibold rounded-lg px-5 py-2.5 text-center btn-next" wire:click="submit">Proceed</x-primary-button>
                    </div>
                </div>
                <div class="content" id="product-media">
                    <div class="grid md:grid-cols-2 gap-3">
                        <div class="form-group">
                            <x-input-label for="product_description" :value="__('Product Description')" class="text-gray-500" />
                            <input type="text" name="description" id="product_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_regional_feature" :value="__('Product\'s Regional Feature')" class="text-gray-500" />
                            <select name="regional_feature" id="regional_feature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Select Product Regional Feature</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region }}" @if(in_array(old('regional_feature'), $regions)) selected @endif>{{ $region }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('regional_feature')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_link_to_warehouse" :value="__('Link to Warehouse')" class="text-gray-500" />
                            <select name="warehouse" id="link_to_warehouse" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="">Select Warehouse</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}" @if(in_array(old('warehouse'), $warehouses->toArray())) selected @endif>{{ $warehouse->name.', '.$warehouse->city->name.', '.$warehouse->country->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('warehouse')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_model_number" :value="__('Product\'s Model Number')" class="text-gray-500" />
                            <input type="text" name="model_number" id="product_model_number" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <x-input-error :messages="$errors->get('model_number')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_images" :value="__('Add Product Images')" class="text-gray-500" />
                            <div class="flex flex-col flex-grow mb-3 hover:cursor-pointer">
                                <div x-data="{ images: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-gray-200 appearance-none border-2 border-dashed border-gray-300 rounded-md hover:shadow-outline-gray">
                                    <input type="file" multiple accept=".jpg,.jpeg,.png" name="images[]"
                                           class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                           x-on:change="images = $event.target.files;"
                                           x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                                    >
                                    <template x-if="images !== null">
                                        <div class="flex flex-col space-y-1">
                                            <template x-for="(_,index) in Array.from({ length: images.length })">
                                                <div class="flex flex-row items-center space-x-2">
                                                    <template x-if="images[index].type.includes('audio/')"><i class="fas fa-file-audio"></i></template>
                                                    <template x-if="images[index].type.includes('application/')"><i class="fas fa-file-alt"></i></template>
                                                    <template x-if="images[index].type.includes('image/')"><i class="fas fa-file-image"></i></template>
                                                    <template x-if="images[index].type.includes('video/')"><i class="fas fa-file-video"></i></template>
                                                    <span class="font-medium text-gray-900" x-text="images[index].name">Uploading</span>
                                                    {{-- <span class="text-xs self-end text-gray-500" x-text="filesize(images[index].size)">...</span> --}}
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                    <template x-if="images === null">
                                        <div class="flex flex-col space-y-2 items-center justify-center">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <a href="javascript:void(0)" class="flex items-center mx-auto py-1 px-3 text-red-700 text-center text-sm font-bold border border-transparent rounded-md outline-none bg-red-400">UPLOAD A FILE</a>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('images')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_video" :value="__('Add Product Video')" class="text-gray-500" />
                            <div class="flex flex-col flex-grow mb-3 hover:cursor-pointer">
                                <div x-data="{ video: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-gray-200 appearance-none border-2 border-dashed border-gray-300 rounded-md hover:shadow-outline-gray">
                                    <input type="file" accept=".mp4" name="video"
                                           class="absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                           x-on:change="video = $event.target.files;"
                                           x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')"
                                    >
                                    <template x-if="video !== null">
                                        <div class="flex flex-col space-y-1">
                                            <template x-for="(_,index) in Array.from({ length: video.length })">
                                                <div class="flex flex-row items-center space-x-2">
                                                    <template x-if="video[index].type.includes('audio/')"><i class="fas fa-file-audio"></i></template>
                                                    <template x-if="video[index].type.includes('application/')"><i class="fas fa-file-alt"></i></template>
                                                    <template x-if="video[index].type.includes('image/')"><i class="fas fa-file-image"></i></template>
                                                    <template x-if="video[index].type.includes('video/')"><i class="fas fa-file-video"></i></template>
                                                    <span class="font-medium text-gray-900" x-text="video[index].name">Uploading</span>
                                                    {{-- <span class="text-xs self-end text-gray-500" x-text="filesize(video[index].size)">...</span> --}}
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                    <template x-if="video === null">
                                        <div class="flex flex-col space-y-2 items-center justify-center">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <a href="javascript:void(0)" class="flex items-center mx-auto py-1 px-3 text-red-700 text-center text-sm font-bold border border-transparent rounded-md outline-none bg-red-400">UPLOAD A FILE</a>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('video')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <x-input-label class="font-bold text-gray-500">Confirm Availabilty Status</x-input-label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked value="in-stock" class="sr-only peer" name="product_availability">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-orange-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">In Stock</span>
                              </label>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <x-secondary-outline-button class="text-center text-gray-800 gap-2 focus:ring-0 btn-prev"><i class="fas fa-arrow-left text-gray-800 my-auto"></i> Back</x-secondary-outline-button>
                        <x-primary-button type="submit" class="w-2/5 font-semibold rounded-lg px-5 py-2.5 text-center">Add Product</x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
