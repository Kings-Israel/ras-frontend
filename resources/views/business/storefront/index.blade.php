<x-vendor>
    <x-storefront-header :business="$business" :categories="$product_categories"></x-storefront-header>
    <div>
        <img src="{{ $business->primary_cover_image }}" alt="" class="h-96 w-full object-cover">
    </div>
    <div class="flex gap-3 px-2 md:px-8 lg:px-28 py-4">
        @if ($business->secondary_cover_image)
            <div class="hidden lg:block lg:basis-1/4">
                <img src="{{ $business->secondary_cover_image }}" class="w-96 h-96 rounded-lg object-cover" alt="">
            </div>
        @endif
        <div class="w-full text-center lg:text-start lg:basis-3/4">
            @if ($business->tag_line)
                <h1 class="text-3xl font-bold text-slate-700">{{ $business->tag_line }}</h1>
            @endif
            <div class="flex gap-2 justify-center lg:justify-start">
                <h2 class="text-sm my-auto">{{ $business->mission }}</h2>
                @if ($business->vision)
                    <span class="uppercase text-gray-400 text-xl">I</span>
                    <h2 class="text-sm my-auto">{{ $business->vision }}</h2>
                @endif
            </div>
            <div class="space-y-4">
                <span class="text-sm">Avg Response Time: <span class="text-green-400">&#60;24Hrs</span></span>
                <div class="flex justify-center lg:justify-start space-x-3">
                    <button class="font-semibold px-10 py-0.5 bg-primary-one border border-primary-one text-white rounded-full hover:bg-orange-800 hover:border-orange-800">Make Inquiry</button>
                    <a href="{{ route('messages', ['user' => $business->user]) }}">
                        <button class="font-semibold px-10 py-0.5 border border-primary-one text-primary-one rounded-full hover:bg-orange-200">Chat</button>
                    </a>
                </div>
            </div>
            @if ($business->about)
                <div class="mt-10">
                    <h4 class="font-bold text-gray-600">About Us</h4>
                    <p class="mt-3 text-gray-700">{{ $business->about }}</p>
                </div>
            @endif
            <div class="mt-10">
                <h4 class="font-bold text-gray-600">Contact Us</h4>
                <div class="flex divide-x-2 gap-4">
                    <p class="space-x-2"><span>{{ $business->contact_email }}</span></p>
                    <p class="space-x-2 pl-2"><span>{{ $business->contact_phone_number }}</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        <div class="px-2 md:px-8 lg:px-28">
            <div class="flex justify-between">
                <h3 class="font-bold tracking-wide">Best Sellers</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-4">
                @foreach ($best_sellers as $product)
                    @if ($loop->index < 4)
                        <a href="{{ route('product', ['slug' => $product->slug]) }}" class="rounded-lg bg-gray-200 hover:bg-gray-300 hover:cursor-pointer transition duration-200 ease-in-out">
                            @php($image = $product->media->where('type', 'image')->first()->file)
                            <img src="{{ $image }}" class="rounded-xl w-full h-52 object-cover p-2" alt="">
                            <div class="p-2">
                                <h4 class="font-bold text-gray-500">{{ $product->name }}</h4>
                                <h4 class="font-bold uppercase text-gray-700">{{ $product->price ? 'US$'.number_format($product->price) :$product->currency.''.number_format($product->min_price).' - '.$product->currency.''.number_format($product->max_price) }}</h4>
                                @if ($product->min_order_quantity)
                                    <h5 class="text-sm text-gray-500 font-bold">Minimum Order: {{ $product->min_order_quantity }}</h5>
                                @endif
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="px-2 md:px-8 lg:px-28">
            <div class="flex justify-between">
                <h3 class="font-bold tracking-wide">New Products</h3>
                <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
            </div>
            <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-4">
                @foreach ($new_products as $product)
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
        </div>
    </div>
</x-vendor>
