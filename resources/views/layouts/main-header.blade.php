<div class="sticky top-0 bg-transparent flex flex-wrap items-center justify-between mx-auto pt-2 py-2 px-24 z-50 duration-200" id="main-header">
    <a href="{{ url('/') }}">
        <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
    </a>
    <div class="flex space-x-2">
        <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex gap-2">
            <span class="font-semibold my-auto">My Account</span>
            <i class="fas fa-chevron-down my-auto text-sm"></i>
        </button>
        <div id="dropdown" class="z-10 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                <li>
                    <a href="{{ route('vendor.dashboard') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="text-gray-800 bg-gray-300 rounded-full w-8 text-center pt-1">
            <i class="w-5 h-5 fas fa-bell"></i>
        </div>
        <div class="text-gray-800 bg-gray-300 rounded-full w-8 text-center pt-1">
            <i class="w-5 h-5 fas fa-shopping-bag"></i>
        </div>
    </div>
</div>
