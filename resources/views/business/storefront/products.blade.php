<x-vendor>
    <x-storefront-header :business="$business"></x-storefront-header>
    <div>
        <img src="{{ $business->primary_cover_image }}" alt="" class="h-32 w-full object-cover">
    </div>
    <div class="lg:flex gap-3 px-2 md:px-8 lg:px-28 py-4" id="storefront-products">
        <div class="lg:basis-1/6">
            <div class="border-2 border-gray-300 rounded-md flex flex-col space-y-2 py-2 sticky top-32">
                <h2 class="font-bold text-gray-500 text-lg px-2">Product Categories</h2>
                @if (!$categories->isEmpty())
                    <div v-if="active_category == 'all'" class="flex justify-between px-2 bg-gray-300 text-gray-500 hover:cursor-pointer" v-on:click="viewCategory('all')">
                        <h2 class="font-bold">All Categories ({{ $business->products_count }})</h2>
                        <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                    <div v-else class="flex justify-between px-2 text-gray-500 hover:cursor-pointer" v-on:click="viewCategory('all')">
                        <h2 class="font-bold">All Categories ({{ $business->products_count }})</h2>
                        <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                @endif
                @forelse ($categories as $category)
                    <div v-if="active_category == {{ $category->id }}" class="flex justify-between px-2 bg-gray-300 text-gray-600 hover:cursor-pointer" v-on:click="viewCategory({{ $category }})">
                        <h2 class="font-bold">{{ $category->name }}</h2>
                        <span><i class="fas fa-chevron-right"></i></span>
                    </div>
                    <div v-else class="flex justify-between px-2 text-gray-600 hover:cursor-pointer" v-on:click="viewCategory({{ $category }})">
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
                <div v-for="(product_category, key) in products" v-bind:key="key">
                    <div class="flex justify-between">
                        <h3 class="font-bold tracking-wide text-xl text-gray-700">@{{ key }}</h3>
                        <h4 class="font-bold text-sm">View More <i class="fas fa-arrow-circle-right"></i></h4>
                    </div>
                    <div class="space-y-2 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 gap-2 py-4">
                        <a v-for="product in product_category" v-bind:key="product.id" v-bind:href="'/product/' + product.slug" class="rounded-lg bg-gray-200 hover:bg-gray-300 hover:cursor-pointer transition duration-200 ease-in-out">
                            <img v-bind:src="product.media[0].file" class="rounded-xl w-full h-52 object-cover p-2" alt="">
                            <div class="p-2">
                                <h4 class="font-bold text-gray-500">
                                    @{{ product.name }}
                                </h4>
                                <h4 class="font-bold uppercase text-gray-700">
                                    @{{ product.price ? product.currency+' '+product.price : product.currency+' '+product.min_price+' - '+product.currency+' '+product.max_price }}
                                </h4>
                                <h5 v-if="product.min_order_quantity != null" class="text-sm text-gray-500 font-bold">
                                    Minimum Order: @{{ product.min_order_quantity }}
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const products = {!! json_encode($products) !!}
            const all_products = {!! json_encode($products) !!}
            const categories = {!! json_encode($categories) !!}
            var products_container = new Vue({
                el: '#storefront-products',
                data() {
                    return {
                        products: [],
                        all_products: [],
                        categories: [],
                        active_category: 'all',
                    }
                },
                mounted() {
                    this.products = products
                    this.all_products = products
                    this.categories = categories
                },
                methods: {
                    viewCategory(category) {
                        this.products = this.all_products
                        if (category !== 'all') {
                            this.active_category = category.id
                            this.products = Object.keys(this.products)
                                                .filter((key) => key.includes(category.name))
                                                .reduce((obj, key) => {
                                                    return Object.assign(obj, {
                                                        [key]: this.products[key]
                                                    });
                                                }, {})
                        } else {
                            this.active_category = 'all'
                        }
                    },
                }
            })
        </script>
    @endpush
</x-vendor>
