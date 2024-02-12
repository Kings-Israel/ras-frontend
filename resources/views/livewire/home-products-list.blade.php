<div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-5 4xl:grid-cols-5 gap-2 py-4">
    @foreach ($products as $product)
        <div class="relative bg-gray-200 p-2 rounded-md hover:cursor-pointer group/item">
            <a href="{{ route('product', ['slug' => $product->slug]) }}">
                @if ($product->discount)
                    <div class="absolute top-2 right-2">
                        <div class="bg-white p-2 rounded-md text-primary-one font-bold flex flex-col">
                            <span>{{ $product->discount->value }}%</span>
                            <span>OFF</span>
                        </div>
                    </div>
                @endif
                <div class="absolute bottom-16 right-28 group/view invisible hover:bg-slate-200 group-hover/item:visible">
                    <x-primary-button class="group-hover/view:bg-orange-600 py-1 transition ease-in-out duration-200">View</x-primary-button>
                </div>
                <img src="{{ $product->media->where('type', 'image')->first()->file }}" class="rounded border-gray-200 w-full h-52 object-cover" alt="">
                <div class="">
                    <h4 class="font-extrabold text-gray-800">{{ $product->name }}</h4>
                    @if ($product->min_price && $product->max_price)
                        <h4 class="font-extrabold uppercase text-gray-700">{{ $product->currency ? $product->currency : 'USD' }} {{ number_format($product->min_price) }} - {{ $product->currency ? $product->currency : 'USD' }} {{ number_format($product->max_price) }}</h4>
                    @else
                        <h4 class="font-extrabold uppercase text-gray-700">{{ $product->currency ? $product->currency : 'USD' }} {{ number_format($product->price) }}</h4>
                    @endif
                    @if ($product->min_order_quantity)
                        <h5 class="text-sm text-gray-600 font-semibold">Minimum Order: {{ $product->min_order_quantity }}</h5>
                    @endif
                </div>
            </a>
        </div>
    @endforeach
</div>
