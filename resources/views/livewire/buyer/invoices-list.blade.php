<div class="min-h-screen">
    <form action="#" method="post" class="block lg:flex px-4 lg:px-28 p-4 gap-12">
        @csrf
        <div class="basis-3/4 bg-gray-50 p-2 rounded-lg">
            <h3 class="text-3xl text-gray-600 font-bold">Invoices</h3>
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
                                Orders
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Payment
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Amount
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                                <th scope="row" class="px-2 py-2 font-extrabold text-gray-700 whitespace-nowrap dark:text-white hover:text-gray-800">
                                    {{ $invoice->invoice_id }}
                                </th>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ $invoice->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ $invoice->orders->count() }}
                                </td>
                                <td class="px-2 py-2">
                                    {{-- <span class="{{ $invoice->resolvePaymentStatus() }} rounded-md px-3">{{ Str::title($invoice->payment_status) }}</span> --}}
                                </td>
                                <td class="px-2 py-2 text-gray-600">
                                    Ksh.{{ number_format($invoice->total_amount) }}
                                </td>
                                <td class="my-2">
                                    <a href="{{  route('invoice.orders', ['invoice' => $invoice]) }}" class="bg-primary-one font-bold text-white rounded-md px-4 py-1">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @foreach ($orders as $key => $order)
                    <div>
                        <span class="flex gap-2 divide-x-2 divide-gray-300">
                            <div class="flex gap-2">
                                <h3 class="text-gray-500 font-bold">{{ Str::upper(explode('-', $key)[0]) }}</h3>
                            </div>
                        </span>
                    </div>
                    @foreach ($order as $item)
                        @foreach ($item->orderItems as $order_item)
                            <div>
                                <div class="flex w-full border border-gray-200 rounded-lg px-1 py-1 md:px-2 md:py-2">
                                    <div class="basis-4/5 grid md:flex md:justify-between gap-2 px-2 text-gray-500">
                                        <div class="flex gap-3 md:min-w-fit md:mr-10">
                                            @if ($order_item->product->media->where('type', 'image')->first())
                                                <img src="{{ $order_item->product->media->where('type', 'image')->first()->file }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                                            @endif
                                            <div class="flex flex-col">
                                                <a href="{{ route('product', ['slug' => $order_item->product->slug]) }}" class="text-gray-500 font-bold text-md my-auto hover:text-gray-700">
                                                    {{ $order_item->product->name }}
                                                </a>
                                                <a href="{{ route('vendor.storefront', ['slug' => $order_item->product->business->slug]) }}" class="text-gray-400 font-semibold text-md my-auto hover:text-gray-600">
                                                    {{ $order_item->product->business->name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="md:w-[90%] md:justify-items-center md:grid md:grid-cols-4">
                                            <div class="my-auto md:col-span-2">
                                                <div class="flex gap-3">
                                                    <div class="custom-number-input h-10">
                                                        <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                                            <span id="order_quantity" class="border border-1 rounded-lg border-gray-500 px-3 text-center w-full bg-gray-300 font-semibold text-md text-gray-700">{{ $order_item->quantity }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex gap-1 md:col-span-1 md:ml-32">
                                                <span class="text-sm font-semibold text-gray-500 my-auto">Color:</span>
                                                <span class="text-sm font-bold my-auto">{{ $order_item->product->color }}</span>
                                            </div>
                                            <div class="my-auto md:col-span-1 md:ml-32">
                                                <span class="flex gap-1">
                                                    <h3 class="font-semibold text-gray-400">{{ $order_item->product->currency }}</h3>
                                                    <h3 class="font-bold text-gray-500">{{ $order_item->amount }}</h3>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach --}}
            </div>
        </div>
        <div class="basis-1/4">
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Total:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto">USD</h3>
                        <span class="font-bold text-xl text-gray-800">{{ number_format($total) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
