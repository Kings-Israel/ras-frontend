<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Warehouse" sub-title="All Warehouses Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="">
                <div class="md:flex md:justify-between space-y-2 my-2">
                    <div class="flex gap-6">
                        <x-primary-outline-button class="text-sm border-orange-700 text-orange-700 px-6 h-8">Filter <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
                    </div>
                </div>
            </div>
            <div class="flex md:grid md:grid-cols-2 lg:flex gap-1 flex-wrap">
                @foreach ($warehouses as $warehouse)
                    <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px] md:w-[220px] md:h-[120px] lg:w-[220px] lg:h-[140px] z-10">
                        <div class="flex justify-between w-full">
                            <h2 class="font-bold uppercase">{{ $warehouse->name }}</h2>
                            <i class="fas fa-ellipsis-v text-center hover:cursor-pointer" data-dropdown-toggle="warehouse-options-dropdown-{{ $warehouse->id }}" data-dropdown-placement="left"></i>
                            <div id="warehouse-options-dropdown-{{ $warehouse->id }}" class="hidden z-20 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                    @if ($warehouse->products->count() > 0)
                                        <li>
                                            <a href="{{ route('vendor.warehouse.show', ['warehouse' => $warehouse]) }}">
                                                <button type="button" class="inline-flex font-semibold w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View Warehouse</button>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <button type="button" class="inline-flex font-semibold w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-target="request-storage-modal-{{ $warehouse->id }}" data-modal-toggle="request-storage-modal-{{ $warehouse->id }}">Request Storage</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex justify-between w-full">
                            <img src="{{ 'https://flagcdn.com/w40/'.Str::lower($warehouse->country->iso).'.png' }}" srcset="{{ 'https://flagcdn.com/w40/'.Str::lower($warehouse->country->iso).'.png 2x' }}" alt="" class="w-12 h-12 rounded-full object-cover">
                            <h5 class="text-sm mt-5">{{ Str::upper($warehouse->country->iso) }}</h5>
                        </div>
                    </x-card>
                    <x-modal modal_id="request-storage-modal-{{ $warehouse->id }}">
                        <div class="relative w-full max-w-xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="request-storage-modal-{{ $warehouse->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-2 py-2 lg:px-4">
                                    <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">Request Storage in {{ $warehouse->name }}</h3>
                                    <form action="{{ route('vendor.warehouses.storage.request', ['warehouse' => $warehouse]) }}" method="POST">
                                        @csrf
                                        <div class="flex gap-2">
                                            <div class="basis-3/5 mb-2 form-group">
                                                <x-input-label for="product_name" :value="__('Quantity')" class="text-gray-500" />
                                                <input type="number" name="quantity" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                            </div>
                                            <div class="basis-2/5 form-group">
                                                <div class="flex justify-between">
                                                    <x-input-label for="product_brand" :value="__('Unit')" class="text-gray-500" />
                                                    <div class="flex gap-2">
                                                        <x-input-label :value="__('Custom')" class="text-sm text-gray-500" />
                                                        <input type="checkbox" name="enter_custom_storage_request_unit_{{ $warehouse->id }}" @if(!in_array(old('storage_quantity_unit'), $units->toArray()) && old('storage_request_unit_{{ $warehouse->id }}') != NULL) checked @endif onchange="enterCustom(this, 'storage_request_unit_{{ $warehouse->id }}')" id="enter_custom_storage_request_unit_{{ $warehouse->id }}" class="my-auto w-4 h-4 text-primary-one bg-gray-400 border-gray-500 rounded focus:ring-primary-one dark:focus:ring-primary-two dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    </div>
                                                </div>
                                                <input name="storage_quantity_unit" id="custom_storage_request_unit_{{ $warehouse->id }}" oninput="setInput('storage_request_unit_{{ $warehouse->id }}')" type="text" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                <select name="storage_quantity_unit" id="storage_request_unit_{{ $warehouse->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                    <option value="">Unit</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->name }}" @if(in_array(old('storage_quantity_unit'), $units->toArray())) selected @endif>{{ $unit->name }} @if($unit->abbrev) - ({{ $unit->abbrev }}) @endif</option>
                                                    @endforeach
                                                    @if (!collect($units)->contains(old('storage_quantity_unit')) && old('storage_quantity_unit') != NULL)
                                                        <option value="{{ old('storage_quantity_unit') }}" selected>{{ old('storage_quantity_unit') }}</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex justify-end gap-2 mt-4">
                                            <x-primary-button type="submit" class="w-2/5 font-semibold rounded-lg px-5 py-2.5 text-center">Request</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </x-modal>
                @endforeach
            </div>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')
    <script>
        function enterCustom(value, element_id) {
            if (value.checked) {
                $('#'+element_id).addClass('hidden')
                $('#'+element_id).removeClass('block')
                $('#custom_'+element_id).addClass('block')
                $('#custom_'+element_id).removeClass('hidden')
                $('#custom_'+element_id).focus()
            } else {
                $('#'+element_id).addClass('block')
                $('#'+element_id).removeClass('hidden')
                $('#'+element_id).focus()
                $('#custom_'+element_id).addClass('hidden')
                $('#custom_'+element_id).removeClass('block')
            }
        }
    </script>
    @endpush
</x-app-layout>
