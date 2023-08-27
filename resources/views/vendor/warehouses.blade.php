<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Warehouse" sub-title="All Warehouses Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="">
                <div class="md:flex md:justify-between space-y-2 my-2">
                    <div class="flex gap-6">
                        <x-primary-outline-button class="text-sm border-orange-700 text-orange-700 px-6 h-8">Filter <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 flex-wrap">
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Sebuleni</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/ke.png" srcset="https://flagcdn.com/w40/ke.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Nairobi, KE</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Charlo's Place</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/tz.png" srcset="https://flagcdn.com/w40/tz.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Arusha, TZ</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Franz</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/za.png" srcset="https://flagcdn.com/w40/za.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Durban, ZA</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Dot Zero</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/rw.png" srcset="https://flagcdn.com/w40/rw.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Kigali, RW</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Oga Ohms</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/ng.png" srcset="https://flagcdn.com/w40/ng.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Lagos, Nigeria</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Chinku Paradise</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/et.png" srcset="https://flagcdn.com/w40/et.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Adama, ET</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Wode</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/gh.png" srcset="https://flagcdn.com/w40/gh.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Accrs, GH</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Didi Three</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/ug.png" srcset="https://flagcdn.com/w40/ug.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Kampala, UG</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Ogogo</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/cd.png" srcset="https://flagcdn.com/w40/cd.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Goma, DRC</h5>
                    </div>
                </x-card>
                <x-card class="bg-rose-200 py-3 px-3 flex flex-col justify-between w-[240px] h-[150px]">
                    <div class="flex justify-between w-full">
                        <h2 class="font-bold uppercase">Ubuntu</h2>
                        <i class="fas fa-ellipsis-v text-center"></i>
                    </div>
                    <div class="flex justify-between w-full">
                        <img src="https://flagcdn.com/w40/na.png" srcset="https://flagcdn.com/w40/na.png 2x" alt="" class="w-12 h-12 rounded-full object-cover">
                        <h5 class="text-sm mt-5">Windhoek, NB</h5>
                    </div>
                </x-card>
            </div>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')

    @endpush
</x-app-layout>
