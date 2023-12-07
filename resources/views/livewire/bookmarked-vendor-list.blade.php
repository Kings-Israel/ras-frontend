<x-main>
    <div class="grid md:grid-cols-1 lg:grid-cols-3 4xl:grid-cols-3 gap-4 py-4">
        @foreach ($businesses as $business)
            <x-card class="border-2 border-gray-400 grid md:grid-cols-2 gap-1">
                <div>
                    <a href="{{ route('vendor.storefront', ['slug' => $business->slug]) }}">
                        <div class="flex gap-1">
                            {{-- <span class="w-12 h-12 bg-gray-300 rounded-full text-center pt-3 font-bold text-white">E</span> --}}
                            <img src="https://ui-avatars.com/api/?name={!! $business->name !!}&rounded=true&size=60" alt="" />
                            <div class="">
                                <h1 class="font-bold text-sm">{{ $business->name }}</h1>
                                @if ($business->verified())
                                    <div class="flex gap-2">
                                        <h4 class="text-xs text-gray-800">Verified</h4>
                                        <i class="fas fa-shield-alt text-sm text-red-800"></i>
                                    </div>
                                @endif
                                <h5 class="text-xs text-gray-800">{{ $business->created_at->diffForHumans() }}</h5>
                            </div>
                        </div>
                    </a>
                    <div class="flex gap-2">
                        <h4 class="text-sm font-bold text-gray-600">Rating:</h4>
                        <div class="review__info">
                            <div class="review__star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span style="width: 40%">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h4 class="text-sm font-bold text-gray-600">Vendor Info:</h4>
                        <div class="flex flex-col gap-1">
                            <span class="text-sm">
                                <strong>HQ:</strong> {{ $business->city ? $business->city->name : '' }}, {{ $business->country->name }}
                            </span>
                            <span class="text-sm gap-2">
                                <strong>Products:</strong>
                                @if ($business->products->count() > 0)
                                    @foreach ($business->products->take(3) as $product)
                                        @if ($loop->last)
                                            <span>{{ $product->name }}</span>
                                        @else
                                            <span>{{ $product->name.',' }}</span>
                                        @endif
                                    @endforeach
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="relative">
                        @auth
                            @if ($business->user->id != auth()->id())
                                <div class="absolute top-2 right-2">
                                    <livewire:bookmark-vendor :business="$business" />
                                </div>
                            @endif
                        @endauth
                        <img src="{{ $business->primary_cover_image }}" alt="" class="w-full h-44 object-cover rounded-md">
                    </div>
                    @auth
                        @if (auth()->user()->hasRole('buyer') && (auth()->id() != $business->user->id))
                            <a href="{{ route('messages', ['user' => $business->user]) }}">
                                <x-secondary-outline-button class="text-center tracking-tighter border-2 border-orange-200 text-primary-one w-full justify-center hover:bg-orange-300 hover:border-orange-400">
                                    Message Vendor
                                </x-secondary-outline-button>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('messages', ['user' => $business->user]) }}">
                            <x-secondary-outline-button class="text-center text-primary-one w-full justify-center hover:bg-orange-300 hover:border-orange-400">
                                Message Vendor
                            </x-secondary-outline-button>
                        </a>
                    @endauth
                </div>
            </x-card>
        @endforeach
    </div>
</x-main>
