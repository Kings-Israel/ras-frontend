<div>
    <div class="p-4">
        <form method="POST" action="{{ route('vendor.products.store') }}">
            @csrf
            <div class="content" id="product-media">
                <div class="grid md:grid-cols-2 gap-3">
                    <div class="form-group lg:col-span-2">
                        <x-input-label for="product_link_to_warehouse" :value="__('Warehouses')" class="text-gray-500" />
                        <select name="warehouses" id="select" x-cloak>
                            @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name.', '.$warehouse->country->name }}</option>
                            @endforeach
                        </select>
                        <div x-data="updateWarehouses({{ $product }})" x-init="loadOptions()">
                            <input name="warehouses" type="hidden" x-bind:value="selectedValues()">
                            <div class="inline-block relative w-full">
                                <div class="flex flex-col items-center relative">
                                    <div x-on:click="open" class="w-full">
                                        <div class="flex border-none bg-white rounded-lg">
                                            <div class="flex flex-auto flex-wrap">
                                                <template x-for="(option,index) in selected" :key="options[option].value">
                                                    <div
                                                        class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                                        <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="options[option]" x-text="options[option].text"></div>
                                                        <div class="flex flex-auto flex-row-reverse">
                                                            <div x-on:click="remove(index,option)">
                                                                <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                                                                    <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                        c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                        l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                        C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div x-show="selected.length == 0" class="flex-1">
                                                    <input placeholder="Select warehouses"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        x-bind:value="selectedValues()"
                                                    >
                                                </div>
                                            </div>
                                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                    <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                L17.418,6.109z" />
                                                    </svg>
                                                </button>
                                                <button type="button" x-show="isOpen() === false" @click="close"
                                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                        <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                                                            c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                                                            "/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full px-4">
                                        <div x-show.transition.origin.top="isOpen()"
                                            class="absolute shadow top-100 bg-white z-50 w-full left-0 rounded max-h-select overflow-y-auto"
                                            x-on:click.away="close">
                                            <div class="flex flex-col w-full">
                                                <template x-for="(option,index) in options" :key="index">
                                                    <div>
                                                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                                            @click="select(index,$event)">
                                                            <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                                <div class="w-full items-center flex">
                                                                    <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('warehouse')" class="mt-2" />
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <x-primary-button type="submit" class="w-2/5 font-semibold rounded-lg px-5 py-2.5 text-center">Add Product</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
