<div {{ $attributes->merge(['class' => 'max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 pt-4 py-4']) }}>
    <img src="{{ asset('assets/img/Logo.png') }}" alt="" class="w-12 h-12 object-fill rounded-lg">
    <div class="flex space-x-2">
        <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
        <div class="flex gap-2">
            <span class="font-bold my-auto">My Account</span>
            <i class="fas fa-chevron-down my-auto text-sm"></i>
        </div>
        <div class="text-gray-800 bg-gray-300 rounded-full w-8 text-center pt-1">
            <i class="w-5 h-5 fas fa-bell"></i>
        </div>
        <div class="text-gray-800 bg-gray-300 rounded-full w-8 text-center pt-1">
            <i class="w-5 h-5 fas fa-shopping-bag"></i>
        </div>
    </div>
</div>
