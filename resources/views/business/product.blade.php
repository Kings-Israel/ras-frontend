<x-app-layout>
    <style>
        .childTableRow {
            display: none;
        }
        .selected {
            background: #F3F4F6
        }
        .review__info .review__star {
            display: inline-block
        }
    </style>
    <!-- Page Heading -->
    <x-page-nav-header main-title="{{ $product->name }}" sub-title="Product Details" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="grid md:grid-cols-3 gap-2">
                <div class="md:col-span-2">
                    <div class="border border-gray-200 rounded-lg p-2 w-full">
                        <h3 class="font-semibold underline text-lg">Details</h3>
                        <div class="flex justify-between">
                            <div class="flex flex-col">
                                <span>Category: <strong>{{ $product->category->name }}</strong></span>
                                <span>Description:</span>
                                <span><strong>{{ $product->description }}</strong></span>
                                @if ($product->brand)
                                    <span>Brand: <strong>{{ $product->brand }}</strong></span>
                                @endif
                                @if ($product->color)
                                    <span>Color: <strong>{{ $product->color }}</strong></span>
                                @endif
                            </div>
                            <div class="flex flex-col">
                                @if ($product->regional_featre)
                                    <span>Regional Feature: <strong>{{ $product->regional_featre }}</strong></span>
                                @endif
                                @if ($product->usage)
                                    <span>Usage: <strong>{{ $product->usage }}</strong></span>
                                @endif

                                @if ($product->place_of_origin)
                                    <span>Place of Origin: <strong>{{ $product->place_of_origin }}</strong></span>
                                @endif
                                @if ($product->certificate_of_origin)
                                    <a href="{{ $product->certificate_of_origin }}" target="_blank">
                                        <x-primary-button class="py-1">View Certificate of Origin</x-primary-button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="flex gap-2">
                        <div class="border border-gray-200 rounded lg flex flex-col p-2 text-center mb-2 w-1/2">
                            <span class="font-semibold text-lg">Orders</span>
                            <span>{{ $product->orderItems->groupBy('order')->count() }}</span>
                        </div>
                        <div class="border border-gray-200 rounded lg flex flex-col p-2 text-center mb-2 w-1/2">
                            <span class="font-semibold text-lg">Rating</span>
                            <div class="review__info">
                                <div class="review__star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span style="width: 75%">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                    </span>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('vendor.products.edit', ['product' => $product]) }}">
                        <x-secondary-button class="w-full hover:bg-gray-600 hover:text-white">Edit Product</x-secondary-button>
                    </a>
                </div>
            </div>
            <div class="border border-gray-200 rounded-lg p-2 w-full mt-2">
                <h3 class="font-semibold underline text-lg">Orders</h3>
                <livewire:vendor.product.orders-list :product="$product" />
            </div>
            <div class="border border-gray-200 rounded-lg p-2 w-full mt-2">
                <h3 class="font-semibold underline text-lg">Media</h3>
                <div class="bg-gray-50 flex justify-between gap-2">
                    <div class="flex justify-between flex-wrap gap-2 mt-2">
                        @foreach ($product->media as $media)
                            @if ($media->type == 'image')
                                <img src="{{ $media->file }}" alt="" class="w-32 h-32 lg:w-32 lg:h-32 object-cover rounded-md border border-primary-one">
                            @endif
                        @endforeach
                    </div>
                    @php($video = collect($product->media)->where('type', 'video')->first())
                    @if ($video)
                        <div>
                            <video src="{{ $video->file }}" controls class="h-72 w-full rounded-md"></video>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    @endpush
</x-app-layout>
