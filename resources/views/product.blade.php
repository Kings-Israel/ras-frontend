<x-main>
    <div class="bg-gray-200 mx-auto px-24 py-1 sticky top-16 z-30">
        <form class="w-2/5 my-auto">
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="store-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-800 space-x-3" type="button">
                    <i class="fas fa-bars"></i>
                    <span class="">
                        Categories
                    </span>
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="store-dropdown" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Diamonds</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tanzanite</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gold</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Uranium</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <div class="mx-auto px-48 my-5">
        <span class="flex gap-2 text-sm">
            <p class="text-gray-400">Home ></p>
            <p class="text-gray-400">Natural Resources ></p>
            <p class="text-gray-400">Minerals ></p>
            <p class="text-gray-600">Gold</p>
        </span>
        <div class="flex gap-3 mt-3">
            <div>
                <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-[390px] h-[450px] object-cover rounded-md">
                <div class="flex justify-between mt-2">
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-28 h-28 object-cover rounded-md">
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-28 h-28 object-cover rounded-md">
                    <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-28 h-28 object-cover rounded-md">
                </div>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-600">24K Gold Plated Customized Metal Bar</h2>
                <div class="flex gap-2">
                    <h4>Review:</h4>
                    <div class="place__author__star">
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <span style="width: 60%">
                           <i class="la la-star"></i>
                           <i class="la la-star"></i>
                           <i class="la la-star"></i>
                           <i class="la la-star"></i>
                           <i class="la la-star"></i>
                        </span>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
