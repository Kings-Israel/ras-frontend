<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Profile" sub-title="View Your Profile Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="relative">
                <img src="{{ asset('assets/img/6CeuCO.jpg') }}" alt="" class="rounded-lg w-full h-56 object-cover">
                <x-secondary-outline-button class="absolute top-2 right-2 text-white bg-gray-500 font-thin tracking-tighter h-8">
                    <i class="fas fa-camera mr-1"></i> Change Cover
                </x-secondary-outline-button>
            </div>
            <div class="flex flex-row gap-2 w-[90%] mx-auto -mt-24 profile-form relative">
                <div class="basis-1/4 border border-gray-300 rounded-lg py-6 divide-y-2 bg-white h-[20%]">
                    <div class="flex flex-col pb-5">
                        <img src="{{ asset('assets/img/skLbbi.jpg') }}" alt="" class="rounded-full w-16 h-16 mx-auto">
                        <h2 class="font-extrabold text-xl text-center">Oloo Aloo</h2>
                    </div>
                    <div class="text-center pt-5">
                        <h4 class="text-gray-500">Bio</h4>
                        <p class="text-gray-600 text-left px-3 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, possimus.</p>
                    </div>
                </div>
                <div class="basis-3/4 border border-gray-300 rounded-lg bg-white py-4 px-4 divide-y-4">
                    <div class="flex gap-6">
                        <span class="font-extrabold text-orange-400 underline underline-offset-4 decoration-4">Account Settings</span>
                        <span class="font-extrabold text-gray-400">Notifications</span>
                    </div>
                    <form action="#">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <x-input-label for="email" :value="__('First Name')" class="text-gray-500" />
                                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="username" value="Aloo"/>
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="email" :value="__('Last Name')" class="text-gray-500" />
                                <x-text-input id="last_number" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="username" value="Oloo" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <x-input-label for="email" :value="__('Username')"  class="text-gray-500" />
                            <x-text-input id="username" class="block mt-1 w-full" type="email" name="email" :value="old('username')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="email" :value="__('Email')" class="text-gray-500" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="email" :value="__('Phone Number')" class="text-gray-500" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="password" :value="__('Password')" class="text-gray-500" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <x-primary-button class="mt-2 font-thin tracking-tighter px-8">
                            {{ __('Update Details') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
        <x-right-side-bar />
    </div>
</x-app-layout>
