<div class="flex gap-2 flex-wrap">
    @foreach ($suppliers as $supplier)
        <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
            <div class="flex justify-between w-full">
                <div class="flex gap-1">
                    <img src="{{ $supplier->primary_cover_image }}" alt="" class="w-8 h-8 rounded-full object-cover">
                    <h2 class="font-bold uppercase">{{ $supplier->name }}</h2>
                </div>
                <i class="fas fa-ellipsis-v text-center"></i>
            </div>
            <div class="w-full">
                <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
                <div class="flex gap-1 mt-1">
                    <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                    <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
                </div>
            </div>
            <div class="flex gap-1">
                <i class="fas fa-map-marker-alt"></i>
                <h5 class="text-sm">{{ $supplier->city ? $supplier->city->name.', ' : '' }} {{ Str::upper($supplier->country->iso) }}</h5>
            </div>
        </x-card>
    @endforeach
    {{-- <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Sherry Wines</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of bottled wines, seedlings and fruits</p>
            <div class="flex gap-1 mt-1">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Wines</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Fruits</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Seedlings</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Kigali, RW</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Zanzi Fr</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Ornaments</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Nairobi, KE</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Chun Sea</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Ornaments</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Nairobi, KE</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Vuligeti A.</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Ornaments</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Durban, ZA</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/W8ZUrJ.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Chun Sea</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Windhoek, NB</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Shabaan</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Ornaments</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Accra, GH</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Wode's Store</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Ornaments</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Accra, GH</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Chun Sea</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Lagos, NG</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Obasanjo G.</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Ornaments</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Fruits</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Kigali, RW</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Abenezer Adol</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Adama, ET</h5>
        </div>
    </x-card>
    <x-card class="bg-violet-200 py-3 px-3 flex flex-col justify-between w-[280px] h-[170px] hover:bg-rose-200 hover:cursor-pointer">
        <div class="flex justify-between w-full">
            <div class="flex gap-1">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="w-8 h-8 rounded-full object-cover">
                <h2 class="font-bold uppercase">Undungu M.</h2>
            </div>
            <i class="fas fa-ellipsis-v text-center"></i>
        </div>
        <div class="w-full">
            <p class="text-sm">Specializing in the trade of natural menrals, precious stones, fruits, etc</p>
            <div class="flex gap-1 mt-0.5">
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Minerals</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Natural</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Ornaments</span>
                <span class="text-xs px-1 py-1 bg-violet-300 rounded-md">Fruits</span>
            </div>
        </div>
        <div class="flex gap-1">
            <i class="fas fa-map-marker-alt"></i>
            <h5 class="text-sm">Kigali, RW</h5>
        </div>
    </x-card> --}}
</div>
