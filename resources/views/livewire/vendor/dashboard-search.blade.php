<form action="#" method="POST" class="w-full" x-data="{ isOpen: true}" x-on:click.away="isOpen = false">
    <div class="relative lg:w-3/5 lg:-ml-56 md:w-full sm:w-full">
        <i class="fas fa-search absolute inset-y-0 left-0 flex items-center pl-1 pointer-events-none text-xl"></i>
        <x-text-input
            class="w-full pl-10 border-b-2 border-t-0 border-r-0 border-l-0 border-gray-200 rounded-none bg-white focus:border-b-3 focus:ring-0 transition duration-150"
            placeholder="Search Anything..."
            wire:model.live.debounce.300ms="search"
            @focus="isOpen = true"
            @keydown="isOpen = true"
            @keydown.escape.windows="isOpen = false"
            @keydown.shift.tab="isOpen = false"
        >
        </x-text-input>
        @if (strlen($search) >= 1)
            <div class="bg-gray-200 p-2 rounded-lg w-full absolute" x-show="isOpen" x-transition.duration.300ms>
                @if (count($results) > 0)
                    <ul class="list-none relative space-y-2">
                        @foreach ($results->groupByType() as $type => $result)
                            <h4 class="font-bold text-xl underline">{{ Str::title($type)}}</h4>
                            @foreach ($result->shuffle()->take(7) as $search_result)
                                @if ($search_result->url)
                                    @if ($type == 'orders')
                                        <li class="hover:cursor-pointer hover:bg-slate-400 rounded-md transition duration-200 ease-in-out px-2">
                                            <a class="" href="{{ $search_result->url }}" @if($loop->last) @keydown.tab="isOpen = false" @endif>
                                                <span class="font-semibold">{{ Str::upper($search_result->title) }}, {{ $search_result->searchable->orderItems->first()->product->name }}</span>
                                            </a>
                                        </li>
                                    @elseif ($type == 'warehouses')
                                        <li class="hover:cursor-pointer hover:bg-slate-400 rounded-md transition duration-200 ease-in-out px-2">
                                            <a class="" href="{{ $search_result->url }}" @if($loop->last) @keydown.tab="isOpen = false" @endif>
                                                <span class="font-semibold">{{ Str::title($search_result->title) }}, {{ $search_result->searchable->country->name }}</span>
                                            </a>
                                        </li>
                                    @else
                                        <li class="hover:cursor-pointer hover:bg-slate-400 rounded-md transition duration-200 ease-in-out px-2">
                                            <a class="" href="{{ $search_result->url }}" @if($loop->last) @keydown.tab="isOpen = false" @endif>
                                                <span class="font-semibold">{{ Str::title($search_result->title) }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @else
                                    <li class="hover:cursor-pointer hover:bg-slate-400 rounded-md transition duration-200 ease-in-out px-2">
                                        <span class="font-semibold">{{ $search_result->title }}</span>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                @else
                    <div class="font-bold p-2">
                        <p>No Result Was Found</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
</form>
