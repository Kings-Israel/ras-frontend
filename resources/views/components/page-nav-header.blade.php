<div class="ml-5 md:ml-72 lg:flex md:mt-1 md:-mb-2">
    <div class="pr-20 lg:1/5 w-full">
        <h1 class="font-extrabold text-xl">{{ $mainTitle }}</h1>
        <h3>{{ $subTitle }}</h3>
    </div>
    <form action="#" method="POST" class="w-full">
        <div class="relative lg:w-3/5 lg:-ml-56 md:w-full sm:w-full">
            <i class="fas fa-search absolute inset-y-0 left-0 flex items-center pl-1 pointer-events-none text-xl"></i>
            <x-text-input class="w-full pl-10 border-b-2 border-t-0 border-r-0 border-l-0 border-gray-200 rounded-none bg-white focus:border-b-3 focus:ring-0 transition duration-150" placeholder="Search Anything..."></x-text-input>
        </div>
    </form>
</div>
