<div class="pt-2 md:pr-2 sm:ml-72 flex justify-end mr-5 space-x-4 sticky top-1 z-30 bg-white">
    <div class="my-auto">
        {{-- <span class="inline-flex items-center justify-center px-2 py-2 ml-3 text-gray-700 bg-gray-300 rounded-full">
            <i class="fas fa-moon"></i>
        </span> --}}
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="inline-flex items-center justify-center px-2 py-2 ml-3 text-gray-700 bg-gray-300 rounded-full" title="Logout">
                <i class="fas fa-power-off"></i>
            </span>
        </a>
        <span class="inline-flex items-center justify-center px-2 py-2 ml-3 text-gray-700 bg-gray-300 rounded-full">
            <i class="fas fa-bell"></i>
        </span>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
     </form>
    <a href="{{ route('vendor.storefront', ['slug' => auth()->user()->business->slug]) }}" class="">
        <x-primary-outline-button class="text-sm text-orange-500 bg-orange-200 focus:text-white">
            View Storefront
            <i class="fas fa-chevron-right pl-2"></i>
        </x-primary-outline-button>
    </a>
</div>
