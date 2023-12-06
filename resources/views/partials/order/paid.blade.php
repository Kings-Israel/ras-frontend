<div class="block lg:flex px-4 lg:px-28 p-4 gap-2">
    <div>
        <div class="basis-3/5 border border-gray-300 bg-gray-50 p-2 rounded-lg">
            <div class="mb-2">
                <div class="flex justify-between">
                    <div>
                        <div class="flex gap-2">
                            <a href="{{ route('vendor.storefront', ['slug' => $order->orderItems->first()->product->business->slug]) }}" class="text-gray-900 font-bold text-2xl my-auto hover:text-gray-800">
                                {{ $order->orderItems->first()->product->business->name }}
                            </a>
                        </div>
                        <div class="flex gap-3 divide-x-2 divide-gray-500">
                            @if ($order->orderItems->first()->product->business->verified())
                                <div class="flex gap-2">
                                    <h4 class="text-xs text-gray-800">Verified</h4>
                                    <i class="fas fa-shield-alt text-sm text-red-800"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="font-bold text-xl">{{ Str::upper($order->order_id) }}</span>
                        <div class="flex gap-1">
                            <span class="">Status:</span>
                            <span class="font-semibold">{{ Str::title($order->status) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                @foreach ($order->orderItems as $key => $item)
                    @php($product_measurement_unit = $item->product->min_order_quantity ? explode(" ", $item->product->min_order_quantity)[1] : 'Kilograms')
                    <div>
                        <div class="flex w-full rounded-lg px-1 py-1 md:px-2 md:py-2">
                            <div class="">
                                <div class="basis-6/7 grid md:flex md:justify-between gap-2 px-2">
                                    <div class="flex gap-3 md:min-w-fit md:mr-10">
                                        @if ($item->product->media->where('type', 'image')->first())
                                            <img src="{{ $item->product->media->where('type', 'image')->first()->file }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                        @endif
                                        <div class="flex flex-col">
                                            <a href="{{ route('product', ['slug' => $item->product->slug]) }}" class="text-gray-900 font-bold text-md my-auto hover:text-gray-800">
                                                {{ $item->product->name }}
                                            </a>
                                            <a href="{{ route('vendor.storefront', ['slug' => $item->product->business->slug]) }}" class="text-gray-800 font-semibold text-md my-auto hover:text-gray-700">
                                                {{ $item->product->business->name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="md:w-[90%] md:justify-items-center md:grid md:grid-cols-4">
                                            <div class="my-auto md:col-span-2">
                                                <div class="flex gap-3">
                                                    <div class="custom-number-input h-10">
                                                        <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                                            <span id="order_quantity_{{ $item->id }}" name="items_quantities[{{ $item->product->id }}]" class="quantities border-0 outline-none focus:outline-none text-center w-full font-semibold flex items-center text-gray-900">
                                                                {{ explode(' ', $item->quantity)[0] }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span class="text-gray-500 text-sm font-bold my-auto mr-1">{{ $product_measurement_unit }}</span>
                                                    <input type="hidden" name="items_quantities_measurement_units[{{ $item->product->id }}]" value="{{ $product_measurement_unit }}">
                                                </div>
                                            </div>
                                            <div class="my-auto md:col-span-1 md:ml-52 w-full">
                                                <span class="flex gap-1">
                                                    <h4 class="text-gray-700 whitespace-nowrap my-auto">Unit Price:</h4>
                                                    <h3 class="font-semibold text-gray-600 my-auto">{{ $item->product->currency }}</h3>
                                                    <span class="prices text-gray-900 font-bold" name="items_prices[{{ $item->product->id }}]" id="items_prices_{{ $item->id }}">
                                                        {{ $item->amount }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($order->invoice->additional_notes)
                    <div>
                        <h5 class="text-xl">Additional Notes</h5>
                        <span class="text-gray-800">{{ $order->invoice->additional_notes }}</span>
                    </div>
                @endif
            </div>
        </div>
        <div id="app-paid-orders" class="mt-2">
            <h3 class="text-lg text-black p-2 font-bold">Order Messages</h3>
            <div class="bg-gray-50 border-2 border-gray-300 rounded-lg">
                <order-chat-component email="{!! auth()->user()->email !!}" order="{!! $order->id !!}"></order-chat-component>
            </div>
        </div>
    </div>
    <div class="basis-2/5 space-y-2">
        <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
            <div class="flex justify-between">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Order Subtotal:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($order->getTotalAmount(false)) }}</span>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Order Total:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto">{{ Str::upper($order->orderItems->first()->product->currency) }}</h3>
                        <span class="font-bold text-xl text-gray-800" id="total_cart_amount">{{ number_format($order_total) }}</span>
                    </div>
                </div>
            </div>
            <div class="block md:flex md:gap-2">
                <h4 class="text-gray-800 my-auto font-semibold">Delivery On:</h4>
                <h5 class="text-gray-900 font-bold">{{ Carbon\Carbon::parse($order->orderItems->first()->delivery_date)->format('d M Y') }}</h5>
            </div>
            <div class="block md:flex md:flex-col md:gap-2">
                <span class="font-semibold text-gray-800 mr-2">Delivery To: </span>
                <span class="font-semibold text-gray-900 underline underline-offset-1">{{ $item->order->invoice->delivery_location_address }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-xl font-semibold">Order Status:</span>
                <span class="font-semibold bg-secondary-six px-2 py-1 rounded-md">Paid</span>
            </div>
        </div>
        @foreach ($order->orderItems as $key => $item)
            @foreach ($order_requests as $key => $order_request)
                @if ($key == 'App\\Models\\InspectingInstitution')
                    <div class="border border-gray-300 p-4 rounded-lg space-y-1">
                        <div class="flex justify-between">
                            <h4 class="font-semibold text-gray-700">Inspection Report:</h4>
                        </div>
                        @php($accepted_request = $order_request->where('status', 'accepted')->first())
                        @if ($accepted_request)
                            <div class="flex justify-between">
                                <span>Accepted Quote:</span>
                                <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Accepted Quote Cost:</span>
                                <span class="font-semibold">{{ $accepted_request->cost }}</span>
                            </div>
                        @endif
                        <button data-modal-target="view-inpection-report" data-modal-toggle="view-inpection-report" class="w-full bg-primary-one text-lg font-semibold text-white py-1 rounded-lg">View Inspection Report</button>
                        <x-modal modal_id="view-inpection-report">
                            <div class="relative w-full max-w-4xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-inspection-report">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Inspection Report</h2>
                                    <div class="space-y-2 p-2">
                                        @if ($item->inspectionReport)
                                            <h3 class="font-bold underline px-2">Applicant Company Details</h3>
                                            <div class="grid grid-cols-3 gap-2 px-2">
                                                <div>
                                                    <x-input-label>Applicant Company Name</x-input-label>
                                                    <span>{{ $item->inspectionReport->applicant_company_name ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>Applicant Company Address</x-input-label>
                                                    <span>{{ $item->inspectionReport->applicant_company_address ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>Applicant Company Email</x-input-label>
                                                    <span>{{ $item->inspectionReport->applicant_company_email ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>Applicant Company Phone Number</x-input-label>
                                                    <span>{{ $item->inspectionReport->applicant_company_phone_number ?? 'Not Entered' }}</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="font-bold underline px-2">License Holder Details</h3>
                                            <div class="grid grid-cols-3 gap-2 px-2">
                                                <div>
                                                    <x-input-label>License Holder Company</x-input-label>
                                                    <span>{{ $item->inspectionReport->license_holder_company_name ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>License Holder Company Address</x-input-label>
                                                    <span>{{ $item->inspectionReport->license_holder_company_address ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>License Holder Company Email</x-input-label>
                                                    <span>{{ $item->inspectionReport->license_holder_company_email ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>License Holder Company Phone Number</x-input-label>
                                                    <span>{{ $item->inspectionReport->license_holder_company_phone_number ?? 'Not Entered' }}</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="font-bold underline px-2">Place of Manufacture Company Details</h3>
                                            <div class="grid grid-cols-3 gap-2 px-2">
                                                <div>
                                                    <x-input-label>Place of Manufacture Company</x-input-label>
                                                    <span>{{ $item->inspectionReport->place_of_manufacture_company_name ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>Place of Manufacture Company Address</x-input-label>
                                                    <span>{{ $item->inspectionReport->place_of_manufacture_company_address ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>Place of Manufacture Company Email</x-input-label>
                                                    <span>{{ $item->inspectionReport->place_of_manufacture_company_email ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>Place of Manufacture Company Phone Number</x-input-label>
                                                    <span>{{ $item->inspectionReport->place_of_manufacture_company_phone_number ?? 'Not Entered' }}</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="font-bold underline px-2">Product Details</h3>
                                            <div class="grid grid-cols-3 gap-2 px-2">
                                                <div>
                                                    <x-input-label>Product</x-input-label>
                                                    <span>{{ $item->inspectionReport->product ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>Product Type Ref</x-input-label>
                                                    <span>{{ $item->inspectionReport->product_type_ref ?? 'Not Entered' }}</span>
                                                </div>
                                                <div>
                                                    <x-input-label>License Holder Company Email</x-input-label>
                                                    <span>{{ $item->inspectionReport->product_trade_mark ?? 'Not Entered' }}</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="font-bold underline px-2">Product Ratings and Principle Characteristics</h3>
                                            <div class="grid grid-cols-1 px-2">
                                                <div>
                                                    <span>{{ $item->inspectionReport->product_ratings_and_principle_characteristics ?? 'Not Entered' }}</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="font-bold underline px-2">Differences From Previously Certified Product</h3>
                                            <div class="grid grid-cols-1 px-2">
                                                <div>
                                                    <span>{{ $item->inspectionReport->differences_from_previously_certified_product ?? 'Not Entered' }}</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="flex justify-end gap-2">
                                                <a href="{{ $item->inspectionReport->report_file }}" target="_blank" class="bg-secondary-one px-2 py-2 rounded-lg text-black font-semibold">View Report File</a>
                                                @if ($item->inspectionReport->applicant_signature && $item->inspectionReport->applicant_signature != config('app.admin_url').'/storage/reports/inspection/')
                                                    <a href="{{ $item->inspectionReport->applicant_signature }}" target="_blank" class="bg-secondary-two text-black px-2 py-2 rounded-lg font-semibold">View Signature</a>
                                                @endif
                                            </div>
                                        @else
                                            <div class="px-2">
                                                <span class="font-semibold text-red-600">Report not yet uploaded</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                    </div>
                @elseif ($key == 'App\\Models\\InsuranceCompany')
                    <div class="border border-gray-300 p-4 rounded-lg">
                        <div class="flex justify-between">
                            <h4 class="font-semibold text-gray-700">Insurance Report:</h4>
                        </div>
                        @php($accepted_request = $order_request->where('status', 'accepted')->first())
                        @if ($accepted_request)
                            <div class="flex justify-between">
                                <span>Accepted Quote:</span>
                                <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Accepted Quote Cost:</span>
                                <span class="font-semibold">{{ $accepted_request->cost }}</span>
                            </div>
                        @endif
                        <button data-modal-target="view-insurance-report" data-modal-toggle="view-insurance-report" class="w-full bg-primary-one text-lg font-semibold text-white py-1 rounded-lg">View Insurance Report</button>
                        <x-modal modal_id="view-insurance-report">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-insurance-report">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Insurance Report</h2>
                                    <div class="space-y-2 p-2">
                                        @if ($item->insuranceReport)
                                            <div>
                                                <span>Insurance Report Here</span>
                                            </div>
                                        @else
                                            <div class="px-2">
                                                <span class="font-semibold text-red-600">Insurance Report Not Uploaded Yet</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                    </div>
                @elseif ($key == 'App\\Models\\Warehouse')
                    <div class="border border-gray-300 p-4 rounded-lg">
                        <div class="flex justify-between">
                            <h4 class="font-semibold text-gray-700">Warehouse Report:</h4>
                        </div>
                        @php($accepted_request = $order_request->where('status', 'accepted')->first())
                        @if ($accepted_request)
                            <div class="flex justify-between">
                                <span>Accepted Quote:</span>
                                <span class="font-semibold">{{ $accepted_request->requesteable->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Accepted Quote Cost:</span>
                                <span class="font-semibold">{{ $accepted_request->cost }}</span>
                            </div>
                        @endif
                        <button data-modal-target="view-warehousing-report" data-modal-toggle="view-warehousing-report" class="w-full bg-primary-one text-lg font-semibold text-white py-1 rounded-lg">View Warehouse Report</button>
                        <x-modal modal_id="view-warehousing-report">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-warehousing-report">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Warehousing/Storage Report</h2>
                                    <div class="space-y-2 p-2">
                                        @if ($item->insuranceReport)
                                            <div>
                                                <span>Warehouse Report Here</span>
                                            </div>
                                        @else
                                            <div class="px-2">
                                                <span class="font-semibold text-red-600">Warehouse/Storage Report Not Uploaded Yet</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                    </div>
                @elseif ($key == 'App\\Models\\LogisticsCompany')
                    <div class="border border-gray-300 p-4 rounded-lg">
                        <div class="flex justify-between">
                            <h4 class="font-semibold text-gray-700">Delivery Report:</h4>
                        </div>
                        @php($accepted_request = $order_request->where('status', 'accepted')->first())
                        @if ($accepted_request)
                            <div class="flex justify-between">
                                <span class="whitespace-nowrap">Accepted Quote:</span>
                                <span class="font-semibold truncate whitespace-nowrap">{{ $accepted_request->requesteable->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Accepted Quote Cost:</span>
                                <span class="font-semibold">{{ $accepted_request->cost }}</span>
                            </div>
                        @endif
                        <button data-modal-target="view-logistics-report" data-modal-toggle="view-logistics-report" class="w-full bg-primary-one text-lg font-semibold text-white py-1 rounded-lg">View Logistics Report</button>
                        <x-modal modal_id="view-logistics-report">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-logistics-report">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Logistics/Delivery Quote</h2>
                                    <div class="space-y-2 p-2">
                                        @if ($item->logisticsReport)
                                            <div>
                                                <span>Logistics Report Here</span>
                                            </div>
                                        @else
                                            <div class="px-2">
                                                <span class="font-semibold text-red-600">Logistics Report Not Uploaded Yet</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </x-modal>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
