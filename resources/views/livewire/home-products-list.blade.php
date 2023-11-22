<div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 4xl:grid-cols-5 gap-2 py-4">
    @foreach ($products as $product)
        <div class="bg-gray-200 p-3 rounded-md hover:cursor-pointer">
            <a href="{{ route('product', ['slug' => $product->slug]) }}">
                <img src="{{ $product->media->where('type', 'image')->first()->file }}" class="rounded border-gray-200 w-full h-52 object-cover" alt="">
                <div class="">
                    <h4 class="font-extrabold text-gray-500">{{ $product->name }}</h4>
                    @if ($product->price)
                        <h4 class="font-extrabold uppercase text-gray-700">{{ $product->currency ? $product->currency : 'USD' }} {{ number_format($product->price) }}</h4>
                    @else
                        <h4 class="font-extrabold uppercase text-gray-700">{{ $product->currency ? $product->currency : 'USD' }} {{ number_format($product->min_price) }} - {{ $product->currency ? $product->currency : 'USD' }} {{ number_format($product->max_price) }}</h4>
                    @endif
                    @if ($product->min_order_quantity)
                        <h5 class="text-sm text-gray-500 font-semibold">Minimum Order: {{ $product->min_order_quantity }}</h5>
                    @endif
                </div>
            </a>
        </div>
    @endforeach
</div>
