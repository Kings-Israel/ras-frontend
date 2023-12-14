@props(['business', 'categories'])
<div class="mx-auto px-2 md:px-8 lg:px-24 py-6 border-t-2 border-gray-200">
    <div class="md:h-10 md:flex justify-between">
        <div class="flex gap-1">
            <img src="https://ui-avatars.com/api/?name={!! $business->name !!}&rounded=true&size=60" alt="" />
            <div class="-space-y-1">
                <h1 class="font-bold text-sm text-slate-700">{{ $business->name }}</h1>
                @if ($business->verified())
                    <div class="flex gap-2">
                        <h4 class="text-xs text-gray-500">Verified</h4>
                        <i class="fas fa-shield-alt text-sm text-red-800"></i>
                    </div>
                @endif
                <h5 class="text-sm text-gray-500">{{ $business->created_at->diffForHumans() }}</h5>
            </div>
        </div>
        <form class="pt-2 md:pt-0 md:w-3/5 lg:w-2/5 my-auto">
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="store-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                    This Store
                    @if ($categories->count() > 0)
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    @endif
                </button>
                @if ($categories->count() > 0)
                    <div id="store-dropdown" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            @foreach ($categories->take(4) as $category)
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 transition duration-250" placeholder="What Are You Looking For..." required>
                    <button type="submit" class="absolute top-0 right-0 p-2.5 font-medium h-full text-white bg-primary-one rounded-r-lg border border-primary-one hover:bg-primary-one focus:ring-2 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                        <span>Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="bg-red-800 mx-auto px-2 md:px-8 lg:px-24 py-2 sticky top-14 md:top-16 z-30">
    <div class="h-8 flex justify-center lg:justify-start">
        <ul class="list-desc flex gap-4 md:gap-8 text-white font-sans my-auto">
            <li class="cursor-pointer">
                <a href="{{ route('vendor.storefront', ['slug' => $business->slug]) }}" class="@if(request()->routeIs('vendor.storefront')) font-extrabold @endif text-sm md:text-base">
                    Home
                </a>
            </li>
            <li class="cursor-pointer">
                <a href="{{ route('vendor.storefront.products', ['slug' => $business->slug]) }}" class="@if(request()->routeIs('vendor.storefront.products')) font-extrabold @endif text-sm md:text-base">
                    Products
                </a>
            </li>
            <li class="cursor-pointer">
                <a href="{{ route('vendor.storefront.compliance', ['slug' => $business->slug]) }}" class="@if(request()->routeIs('vendor.storefront.compliance')) font-extrabold @endif text-sm md:text-base">
                    Compliance Documents
                </a>
            </li>
            {{-- <li>
                <a href="#" class="text-sm md:text-base">
                    Contact Us
                </a>
            </li> --}}
        </ul>
    </div>
</div>
