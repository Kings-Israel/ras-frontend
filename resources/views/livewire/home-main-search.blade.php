<div x-data="{ isOpen: true}" x-on:click.away="isOpen = false">
    <form class="">
        <div class="flex">
            <button id="dropdown-button" data-dropdown-toggle="store-dropdown" data-dropdown-placement="bottom" class="flex-shrink-0 inline-flex items-center py-2.5 px-4 text-sm font-semibold text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                All Items
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="store-dropdown" class="hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
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
            <div class="relative w-full">
                <i class="fas fa-search absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none text-xl"></i>
                <input
                    type="search"
                    id="search-dropdown"
                    class="pl-10 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-300 border-l-2 border border-gray-400 placeholder:font-semibold focus:ring-primary-one focus:border-primary-one dark:bg-orange-700 dark:border-l-orange-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-primary-one transition duration-250"
                    wire:model.live.debounce.300ms="search"
                    placeholder="What Are You Looking For..."
                    required
                    autocomplete="off"
                    @focus="isOpen = true"
                    @keydown="isOpen = true"
                    @keydown.escape.windows="isOpen = false"
                    @keydown.shift.tab="isOpen = false"
                >
                @if (strlen($search) >= 1)
                    <div class="bg-gray-300 p-2 rounded-lg w-full absolute" x-show="isOpen" x-transition.duration.300ms>
                        @if (count($results) > 0)
                            <ul class="list-none relative space-y-2">
                                @foreach ($results->groupByType() as $type => $result)
                                    <h4 class="font-bold text-xl underline">{{ Str::title($type)}}</h4>
                                    @foreach ($result->shuffle()->take(7) as $search_result)
                                        @if ($search_result->url)
                                            <li class="hover:cursor-pointer hover:bg-slate-400 rounded-md transition duration-200 ease-in-out px-2">
                                                <a class="" href="{{ $search_result->url }}" @if($loop->last) @keydown.tab="isOpen = false" @endif>
                                                    <span class="text-lg font-semibold">{{ $search_result->title }}</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="hover:cursor-pointer hover:bg-slate-400 rounded-md transition duration-200 ease-in-out px-2">
                                                <span class="text-lg font-semibold">{{ $search_result->title }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        @else
                            <div class="text-lg font-bold p-2">
                                <p>No Result Was Found</p>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>
