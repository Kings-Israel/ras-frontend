<div class="space-y-2">
    <div class="flex px-1">
        <div class="relative w-full">
            <i class="fas fa-search absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none text-xl"></i>
            <input type="text" wire:model.live="search" class="pl-8 shadow-md block w-full text-sm text-gray-900 bg-gray-50 rounded-md border-2 border-gray-200 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-orange-500 transition duration-250" placeholder="Search Location" required>
        </div>
    </div>
    <div class="space-y-2">
        @forelse ($countries as $country)
            <div class="flex gap-2 px-2 text-gray-600 text-sm" wire:click="$dispatch('update-selected-countries', { id: {{ $country->id }}})">
                <input id="checkbox-table-search-1" type="checkbox" value="{{ $country->id }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                <h2 class="font-bold">{{ $country->name }}</h2>
            </div>
        @empty
            <p class="text-gray-500 flex gap-2 justify-center p-2"><i class="fas fa-search my-auto"></i> No Results Found</p>
        @endforelse
    </div>
    <div class="flex justify-between">
        @if ($countries->count() > 0)
            {{-- <div class="flex gap-2 px-1 text-gray-600 text-sm">
                <button
                    wire:click="updateCountries"
                    class="text-sm font-semibold inline-flex items-center rounded-lg text-orange-400 hover:text-orange-500 dark:hover:text-orange-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-1"
                >
                    Search
                </button>
            </div> --}}
            @if ($this->per_page < 30)
                <div class="flex gap-2 px-1 text-gray-600 text-sm">
                    <a
                        href="#"
                        wire:click.prevent="updatePagination"
                        class="text-sm font-semibold inline-flex items-center rounded-lg text-orange-400 hover:text-orange-500 dark:hover:text-orange-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-1"
                    >
                        Show More
                    </a>
                </div>
            @endif
        @endif
    </div>
</div>
