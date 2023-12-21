{{-- <div class="min-h-screen">
    <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-16 z-30">
        <form class="md:w-2/5 md:my-auto">
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="invoice-status-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-800 space-x-3" type="button">
                    <i class="fas fa-bars"></i>
                    <span class="">
                        Filter Status
                    </span>
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="invoice-status-dropdown" class="z-40 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('all')">All</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('delivered')">Delivered</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('pending')">Pending</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('in progress')">In Progress</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('cancelled')">Cancelled</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('rejected')">Rejected</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <div class=" mx-auto px-4 md:px-6 lg:px-28 my-5">
        <span class="flex gap-2 text-sm">
            <a href="{{ route('welcome') }}" class="text-gray-500">Home ></a>
            <a href="{{ route('orders') }}" class="text-gray-500">Orders</a>
        </span>
        <div class="block lg:flex p-4 gap-12">
            <div class="basis-3/4 bg-gray-50 p-2 rounded-lg">
                <div class="space-y-2">
                    @foreach ($orders as $key => $order)
                        <div class="flex justify-between">
                            <span class="flex gap-2 divide-x-2 divide-gray-300">
                                <div class="flex gap-2">
                                    <h3 class="text-gray-800 font-bold">{{ Str::upper($key) }}</h3>
                                    <a class="bg-primary-one py-1 px-2 text-white font-bold tracking-tight rounded-md hover:bg-orange-500 transition duration-150 ease-in-out" href="{{ route('messages', ['user' => json_decode($order, true)[0]['business']['user_id']]) }}">
                                        Message Vendor
                                    </a>
                                </div>
                            </span>
                            <div class="flex gap-2">
                                <span>
                                    <div class="flex gap-2">
                                        <h3 class="text-gray-900 font-bold">ORDER ID: <strong>{{ json_decode($order, true)[0]['order_id'] }}</strong></h3>
                                    </div>
                                </span>
                                <span>
                                    <div class="flex gap-2">
                                        <h3 class="text-gray-900 font-bold">STATUS: <strong>{{ Str::title(json_decode($order, true)[0]['status']) }}</strong></h3>
                                    </div>
                                </span>
                            </div>
                        </div>
                        @foreach ($order as $item)
                            @foreach ($item->orderItems as $order_item)
                                <div class="flex w-full border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                                    <div class="grid grid-cols-6">
                                        <div class="flex gap-3 md:min-w-fit md:mr-10">
                                            @if ($order_item->product->media->where('type', 'image')->first())
                                                <img src="{{ $order_item->product->media->where('type', 'image')->first()->file }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                            @endif
                                            <div class="flex">
                                                <a href="{{ route('product', ['slug' => $order_item->product->slug]) }}" class="text-gray-900 font-bold text-md my-auto hover:text-gray-800">
                                                    {{ $order_item->product->name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="align-center">
                                            <div class="my-auto">
                                                <div class="flex gap-3">
                                                    <div class="custom-number-input h-10">
                                                        <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent my-auto">
                                                            <span id="order_quantity" class="border border-1 rounded-lg border-gray-500 px-3 my-auto text-center w-full bg-gray-300 font-semibold text-md text-gray-800">{{ $order_item->quantity }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($order_item->inspectionReport()->exists())
                                                <div class="my-auto md:col-span-2">
                                                    <div class="flex gap-3">
                                                        <div class="custom-number-input h-10">
                                                            <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent my-auto">
                                                                <span id="order_quantity" data-modal-target="view-inspection-report-modal-{{ $order_item->id }}" data-modal-toggle="view-inspection-report-modal-{{ $order_item->id }}" class="hover:cursor-pointer border border-1 rounded-lg px-3 my-auto text-center w-full bg-primary-one font-semibold text-md text-gray-700">View Inspection Report</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-modal modal_id="view-inspection-report-modal-{{ $order_item->id }}">
                                                    <div class="relative w-full max-w-4xl max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" data-modal-hide="view-inspection-report-modal-{{ $order_item->id }}" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="px-2 py-2 lg:px-4">
                                                                <iframe src ="{{ $order_item->inspectionReport->report_file }}" class="w-[100%] h-[600px]"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </x-modal>
                                            @endif
                                            <div class="flex gap-1 md:col-span-1 md:ml-32">
                                                <span class="text-sm font-semibold text-gray-500 my-auto">Color:</span>
                                                <span class="text-sm font-bold my-auto">{{ $order_item->product->color }}</span>
                                            </div>
                                            <div class="my-auto">
                                                <span class="flex gap-1">
                                                    <h3 class="font-semibold text-gray-700">{{ $order_item->product->currency }}</h3>
                                                    <h3 class="font-bold text-gray-900">{{ $order_item->amount }}</h3>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="col-span-4 max-h-40 overflow-scroll">
                                            @if ($order_item->inspectionRequest()->exists())
                                                <div class="flex gap-2">
                                                    <span>Inspection Request Status: <h5 class="font-bold">{{ Str::title($order_item->inspectionRequest->status) }}</h5></span>
                                                    @if ($order_item->inspectionRequest->cost != NULL)
                                                        <h4 class="font-semibold">Inspection Cost: </h4>
                                                        <span class="font-bold">USD {{ number_format($order_item->inspectionRequest->cost) }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                            @if ($order_item->insuranceRequest()->exists())
                                                <div class="flex gap-2">
                                                    <span>Insurance Request Status: <h5 class="font-bold">{{ Str::title($order_item->insuranceRequest->status) }}</h5></span>
                                                    @if ($order_item->insuranceRequest->cost != NULL)
                                                        <h4 class="font-semibold">Insurance Cost: </h4>
                                                        <span class="font-bold">USD {{ number_format($order_item->insuranceRequest->cost) }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (json_decode($order, true)[0]['status'] == 'quotation request' && $order_item->quotationResponses->count() <= 0)
                                                <div class="grid grid-cols-4">
                                                    <span class="col-span-4 text-lg text-gray-600 p-2 bg-gray-300 rounded-md">Awaiting Quotation or Acceptance from Vendor</span>
                                                </div>
                                            @endif
                                            @if ($order_item->status != 'accepted' && $order_item->quotationResponses->count() > 0)
                                                <h4 class="font-semibold">Vendor Quotations</h4>
                                                <div class="grid grid-cols-4 bg-gray-500 p-2 rounded-tr-md rounded-tl-md text-white">
                                                    <span>Quantity</span>
                                                    <span>Delivery Date</span>
                                                    <span class="">Price</span>
                                                    <span class="text-end pr-1">Action</span>
                                                </div>
                                                @foreach ($order_item->quotationResponses as $response)
                                                    @if ($response->user_id != auth()->id())
                                                        <div class="grid grid-cols-4 gap-2 bg-yellow-100 p-2 rounded-md border-2 border-gray-500">
                                                            <span>{{ $response->quantity }} {{ explode(' ', $response->orderItem->product->min_order_quantity)[1] }}</span>
                                                            <span>{{ $response->delivery_date->format('d M Y') }}</span>
                                                            <span class="flex gap-2"><h3 class="font-semibold text-gray-500">{{ $response->orderItem->product->currency }}</h3> <h3 class="font-bold text-gray-600">{{ $response->amount }}</h3></span>
                                                            <span class="flex justify-end">
                                                                <a href="{{ route('order.quotation.update', ['quotation' => $response, 'status' => 'accepted']) }}">
                                                                    <x-primary-button>Accept</x-primary-button>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="grid grid-cols-4 gap-2 p-2 rounded-md border-b-2 border-gray-500">
                                                            <span>{{ $response->quantity }} {{ explode(' ', $response->orderItem->product->min_order_quantity)[1] }}</span>
                                                            <span>{{ $response->delivery_date->format('d M Y') }}</span>
                                                            <span class="flex gap-2"><h3 class="font-semibold text-gray-800">{{ $response->orderItem->product->currency }}</h3> <h3 class="font-bold text-gray-900">{{ $response->amount }}</h3></span>
                                                            <span></span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endforeach
                </div>
            </div>
            <div class="basis-1/4 space-y-2">
                <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                    <div>
                        <h4 class="text-md font-semibold text-gray-800">Total:</h4>
                        <div class="flex gap-1">
                            <h3 class="font-bold text-xl text-gray-700 my-auto">USD</h3>
                            <span class="font-bold text-xl text-gray-900">{{ number_format($total_amount) }}</span>
                        </div>
                        <h4 class="text-md font-semibold text-gray-800">Total Inspection Cost:</h4>
                        <div class="flex gap-1">
                            <h3 class="font-bold text-xl text-gray-700 my-auto">USD</h3>
                            <span class="font-bold text-xl text-gray-900">{{ number_format($inspection_cost) }}</span>
                        </div>
                        <h4 class="text-md font-semibold text-gray-800">Total Shipping Cost:</h4>
                        <div class="flex gap-1">
                            <h3 class="font-bold text-xl text-gray-700 my-auto">USD</h3>
                            <span class="font-bold text-xl text-gray-900">{{ number_format($delivery_cost) }}</span>
                        </div>
                        <h4 class="text-md font-semibold text-gray-800">Total Warehousing Cost:</h4>
                        <div class="flex gap-1">
                            <h3 class="font-bold text-xl text-gray-700 my-auto">USD</h3>
                            <span class="font-bold text-xl text-gray-900">{{ number_format($warehousing_cost) }}</span>
                        </div>
                        <h4 class="text-md font-semibold text-gray-800">Total Insurance Cost:</h4>
                        <div class="flex gap-1">
                            <h3 class="font-bold text-xl text-gray-700 my-auto">USD</h3>
                            <span class="font-bold text-xl text-gray-900">{{ number_format($insurance_cost) }}</span>
                        </div>
                        @if ($inspection_cost > 0)
                            <div class="flex gap-2">
                                <h4 class="text-sm font-semibold text-gray-400 my-auto">Inspection Cost:</h4>
                                <div class="flex gap-1">
                                    <h3 class="font-bold text-lg text-gray-500 my-auto">USD</h3>
                                    <span class="font-bold text-lg text-gray-600">{{ number_format($inspection_cost) }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                    <h4 class="text-sm font-semibold text-gray-800">Delivery Location</h4>
                    <h3 class="font-bold text-xl text-gray-900 my-auto">{{ $order->invoice->delivery_location_address }}</h3>
                </div>
                @if ($order->invoice->canRequestFinancing() && !$order->invoice->financingRequest)
                    <a href="{{ route('invoice.financing.request', ['invoice' => $invoice]) }}">
                        <x-primary-button class="w-full p-3 font-extrabold tracking-wide text-lg mt-2">Request Financing</x-primary-button>
                    </a>
                @endif
                @if ($order->invoice->financingRequest)
                    <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                        <h4 class="text-sm font-semibold text-gray-800">Financing Request Status</h4>
                        <h3 class="font-bold text-xl text-gray-900 my-auto">{{ Str::title($order->invoice->financingRequest->status) }}</h3>
                    </div>
                @endif
                @if ($order->invoice->canRequestFinancing() && !$invoice->financingRequest)
                    <a href="#">
                        <x-primary-button class="w-full p-3 font-extrabold tracking-wide text-lg mt-2">Pay for Orders</x-primary-button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
<div class="min-h-screen">
    <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-16 z-30">
        <form class="md:w-2/5 md:my-auto">
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="invoice-status-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-800 space-x-3" type="button">
                    <i class="fas fa-bars"></i>
                    <span class="">
                        Filter By Status
                    </span>
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="invoice-status-dropdown" class="z-40 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('all')">All</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('quotation request')">Quotation Requests</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('delivered')">Delivered</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('pending')">Pending</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('in progress')">In Progress</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('cancelled')">Cancelled</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click.prevent="updateStatus('rejected')">Rejected</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <span class="lg:flex lg:px-28 mt-2 gap-2 text-sm">
        <a href="{{ route('welcome') }}" class="text-gray-500">Home ></a>
        <a href="{{ route('orders') }}" class="">Orders</a>
    </span>
    <form action="#" method="post" class="block lg:flex px-4 lg:px-28 p-4 gap-12">
        @csrf
        <div class="basis-3/4 bg-gray-50 p-2 rounded-lg">
            <h3 class="text-3xl text-gray-600 font-bold">Orders</h3>
            <div class="space-y-2">
                {{-- <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                        <div class="flex gap-2 md:px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-thin text-sm">Select All Items</h2>
                        </div>
                        <i class="fas fa-trash-alt my-auto text-gray-500 hover:cursor-pointer" wire:click="deleteAll"></i>
                    </div>
                </div> --}}
                <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                    <thead class="text-xs text-gray-900 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                        <tr>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                ID
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Date
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Status
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Payment
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Amount
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Delivery Date
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                                <th scope="row" class="px-2 py-2 font-extrabold text-gray-700 whitespace-nowrap dark:text-white hover:text-gray-800">
                                    <a href="{{ route('orders.show', ['order' => $order]) }}" class="hover:text-gray-700">
                                        {{ $order->order_id }}
                                    </a>
                                </th>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ $order->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ Str::title($order->status) }}
                                </td>
                                <td class="px-2 py-2">
                                    <span class="{{ $order->invoice->resolvePaymentStatus() }} rounded-md px-3">{{ Str::title($order->invoice->payment_status) }}</span>
                                </td>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ number_format($order->getTotalAmount()) }}
                                </td>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ Carbon\Carbon::parse($order->orderItems->first()->delivery_date)->format('d M Y') }}
                                </td>
                                <td class="my-2">
                                    <a href="{{ route('orders.show', ['order' => $order]) }}" class="bg-primary-one font-bold text-white rounded-md px-4 py-1">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $orders->links('vendor.livewire.tailwind') }}
                </div>
            </div>
        </div>
        <div class="basis-1/4 space-y-2">
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Total:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800">{{ number_format($total_amount) }}</span>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Pending Orders:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800">{{ $pending_orders }}</span>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Quotation Requests:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800">{{ $quotation_requests_orders }}</span>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Accepted:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800">{{ $accepted_orders }}</span>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">In Progress:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800">{{ $in_progress_orders }}</span>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Rejected:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800">{{ $rejected_orders }}</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

