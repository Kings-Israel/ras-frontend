<div class="sticky top-0 bg-transparent flex lg:flex-wrap lg:items-center justify-between mx-auto pt-2 py-2 lg:px-24 md:px-16 sm:px-8 z-50 duration-200" id="main-header">
    <a href="{{ url('/') }}">
        <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
    </a>
    <div class="flex space-x-2">
        <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover my-auto">
        <button id="dropdown-button" data-dropdown-toggle="account-dropdown" data-dropdown-placement="bottom" class="flex gap-2" type="button">
            <span class="font-semibold my-auto">My Account</span>
            <i class="fas fa-chevron-down my-auto text-sm"></i>
        </button>
        <div id="account-dropdown" class="z-10 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                <li>
                    <a href="{{ route('vendor.dashboard') }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="text-gray-800 bg-gray-300 rounded-full w-7 h-7 my-auto lg:my-0 md:w-8 md:h-8 text-center pt-0.5 md:pt-1">
            <i class="w-5 h-5 fas fa-bell"></i>
        </div>
        <div class="text-gray-800 bg-gray-300 rounded-full w-7 h-7 my-auto lg:my-0 md:w-8 md:h-8 text-center pt-0.5 md:pt-1">
            <i class="w-5 h-5 fas fa-shopping-bag"></i>
        </div>
    </div>
</div>
