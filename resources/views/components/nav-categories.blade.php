<div>
    <div class="flex">
        <button id="dropdown-button" data-dropdown-toggle="categories-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-800 space-x-3" type="button">
            <i class="fas fa-bars"></i>
            <span class="">
                Categories
            </span>
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <div id="categories-dropdown" class="z-40 hidden border border-gray-300 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                @foreach ($categories as $category)
                    <li>
                        <button type="button" class="inline-flex w-full px-4 py-2 text-black font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
