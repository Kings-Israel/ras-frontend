<div class="space-y-2 lg:max-w-fit">
    <div class="lg:flex px-1 gap-2">
        <div class="relative w-full lg:w-[35%] min-w-max p-2">
            <i class="fas fa-search absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none text-xl"></i>
            <input type="text" wire:model.live="search" class="pl-8 shadow-md block w-full text-sm text-gray-900 bg-gray-50 rounded-full border-2 border-gray-200 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-orange-500 transition duration-250" placeholder="Search Location" required>
        </div>
        <div class="grid grid-cols-3 lg:flex gap-2">
            @forelse ($countries as $country)
                <div class="flex gap-2 text-gray-600 h-[70%] max-w-fit mt-2 text-sm border border-gray-400 rounded-full" wire:click="$dispatch('update-selected-countries', { id: {{ $country->id }}})">
                    <input id="checkbox-table-search-1" type="checkbox" value="{{ $country->id }}" class="ml-3 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    <span class="h-fit text-gray-800 whitespace-nowrap font-medium me-2 px-1.5 py-1.5 text-ellipsis overflow-hidden rounded-full dark:bg-gray-700 dark:text-gray-300">{{ $country->name }}</span>
                </div>
            @empty
                <p class="text-gray-500 flex gap-2 justify-center p-2"><i class="fas fa-search my-auto"></i> No Results Found</p>
            @endforelse
        </div>
    </div>
    {{-- <div class="flex justify-between">
        @if ($countries->count() > 0)
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
    </div> --}}
</div>
