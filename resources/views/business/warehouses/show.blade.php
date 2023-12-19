<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Warehouse" sub-title="Warehouse Details" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="">
                <div class="flex justify-between">
                    <div>
                        <span class="font-bold text-lg">{{ $warehouse->name }}</span>
                        <div class="flex gap-3">
                            <span class="font-semibold">{{ $warehouse->city ? $warehouse->city->name.', ' : '' }}</span>
                            <span class="font-semibold">{{ $warehouse->country->name }}</span>
                            <img src="{{ 'https://flagcdn.com/w20/'.Str::lower($warehouse->country->iso).'.png' }}" srcset="{{ 'https://flagcdn.com/w20/'.Str::lower($warehouse->country->iso).'.png 2x' }}" alt="" class="w-6 h-6 rounded-full object-cover">
                        </div>
                    </div>
                    <x-primary-button type="button" class="py-1 h-fit" data-modal-target="request-storage-modal-{{ $warehouse->id }}" data-modal-toggle="request-storage-modal-{{ $warehouse->id }}">Request Storage</x-primary-button>
                </div>

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
                <br>
                @if (count($warehouse->products) > 0)
                    <span class="font-semibold underline">My Products</span>
                    <table class="w-full table-auto text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                        <thead class="text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Product Name
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Brand
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Category
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Status
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Added On
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Stock Level
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warehouse->products as $product)
                                <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                                    <th scope="row" class="px-2 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->name }}
                                    </th>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ $product->brand }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ $product->category->name }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ $product->is_available ? 'In stock' : 'Out of stock' }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ $product->pivot->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ $product->pivot->quantity }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <br>
                @if (count($warehouse->vendorStorageRequests) > 0)
                    <span class="font-semibold underline">My Storage Requests</span>
                    <table class="w-full table-auto text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                        <thead class="text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Code
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Status
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Payment Status
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Quantity
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Requested On
                                </th>
                                <th scope="col" class="px-2 py-3 text-gray-900">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warehouse->vendorStorageRequests as $vendor_storage_request)
                                <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                                    <th scope="row" class="px-2 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ Str::upper($vendor_storage_request->code) }}
                                    </th>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ Str::title($vendor_storage_request->status) }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ Str::title($vendor_storage_request->payment_status) }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ $vendor_storage_request->quantity }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        {{ $product->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-2 py-2 text-gray-600">
                                        @if ($vendor_storage_request->status == 'accepted' && $vendor_storage_request->payment_status == 'pending')
                                            <x-primary-button class="py-2">Pay</x-primary-button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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
