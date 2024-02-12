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
                                @if ($product->discount)
                                    <span>Discount: <strong>{{ $product->discount->value }}%</strong></span>
                                @endif
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
                <div class="md:col-span-1 space-y-1">
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
                        <x-primary-outline-button class="w-full">Edit Product</x-primary-outline-button>
                    </a>
                    <x-secondary-outline-button class="w-full" data-modal-target="add-product-discount-modal" data-modal-toggle="add-product-discount-modal">Add/Update Discount</x-secondary-outline-button>
                    <x-modal modal_id="add-product-discount-modal">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" data-modal-hide="add-product-modal" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-2 py-2 lg:px-4">
                                    <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">Add/Update Product Discount</h3>
                                    <form action="{{ route('vendor.products.discount.add', ['product' => $product]) }}" method="post" class="space-y-2">
                                        @csrf
                                        <div class="col-span-2 form-group">
                                            <x-input-label for="product_discount_value" :value="__('Discount Value (%)')" class="text-black" />
                                            <input type="number" name="value" value="{{ $product->discount ? $product->discount->value : '' }}" id="product_discount_value" min="1" placeholder="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                            <x-input-error :messages="$errors->get('value')" class="mt-2" />
                                        </div>
                                        <div class="flex justify-end">
                                            <x-primary-button class="py-1">Submit</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </x-modal>
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
