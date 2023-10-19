<x-vendor>
    <x-storefront-header :business="$business"></x-storefront-header>
    <div>
        <img src="{{ $business->primary_cover_image }}" alt="" class="h-32 w-full object-cover">
    </div>
    <div class="lg:flex gap-3 px-2 md:px-8 lg:px-28 py-4">
        <div class="lg:basis-1/6">
            <div class="border-2 border-gray-300 rounded-md flex flex-col space-y-2 py-2 sticky top-32">
                <h2 class="font-bold text-gray-500 text-lg px-2">Product Categories</h2>
                @if (!$categories->isEmpty())
                    <div class="flex justify-between px-2 bg-gray-300 text-gray-500">
                        <h2 class="font-bold">All Categories ({{ $business->products_count }})</h2>
                        <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                @endif
                @forelse ($categories as $category)
                    <div class="flex justify-between px-2 text-gray-600 text-sm">
                        <h2 class="font-bold">{{ $category->name }}</h2>
                        <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                @empty
                    <h2 class="font-bold pl-2 text-slate-700">No Product Categories</h2>
                @endforelse
            </div>
        </div>
        <div class="lg:basis-5/6">
            <div class="">
                @foreach ($products as $key => $product_category)
                    <div class="flex justify-between">
                        <h3 class="font-bold tracking-wide text-xl text-gray-700">{{ $key }}</h3>
                        <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
                    </div>
                    <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-4">
                        @foreach ($product_category as $product)
                            @if ($loop->index < 4)
                                <a href="{{ route('product', ['slug' => $product->slug]) }}" class="rounded-lg bg-gray-200 hover:bg-gray-300 hover:cursor-pointer transition duration-200 ease-in-out">
                                    @php($image = $product->media->where('type', 'image')->first()->file)
                                    <img src="{{ $image }}" class="rounded-xl w-full h-52 object-cover p-2" alt="">
                                    <div class="p-2">
                                        <h4 class="font-bold text-gray-500">{{ $product->name }}</h4>
                                        <h4 class="font-bold uppercase text-gray-700">{{ $product->price ? 'US$'.number_format($product->price) : 'US$'.number_format($product->min_price).' - US$'.number_format($product->max_price) }}</h4>
                                        @if ($product->min_order_quantity)
                                            <h5 class="text-sm text-gray-500 font-bold">Minimum Order: {{ $product->min_order_quantity }}</h5>
                                        @endif
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-vendor>
