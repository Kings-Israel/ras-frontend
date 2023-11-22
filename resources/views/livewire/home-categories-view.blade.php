<div class="bg-primary-three p-2">
    <div class="space-y-2">
        <div class="rounded-md flex flex-col space-y-2 py-2 sticky top-32">
            <h2 class="font-bold text-gray-700 text-lg px-2">Product Categories</h2>
            @if (!$categories->isEmpty())
                <div class="flex justify-between px-2 text-gray-500 hover:bg-white hover:cursor-pointer">
                    <h2 class="font-semibold">All Categories</h2>
                    <span><i class="fas fa-chevron-right"></i></span>
                </div>
            @endif
            @forelse ($categories as $category)
                <div class="flex justify-between px-2 text-gray-600 hover:bg-white hover:cursor-pointer">
                    <h2 class="font-semibold">{{ $category->name }}</h2>
                    <span><i class="fas fa-chevron-right"></i></span>
                </div>
            @empty
                <h2 class="font-bold pl-2 text-slate-700">No Product Categories</h2>
            @endforelse
        </div>
    </div>
    <div class="flex justify-between">
        <a
            href="#"
            class="text-sm font-semibold inline-flex items-center rounded-lg text-orange-400 hover:text-orange-500 dark:hover:text-orange-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-1"
        >
            All Categories
        </a>
    </div>
</div>
