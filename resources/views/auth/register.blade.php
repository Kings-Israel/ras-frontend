<x-guest-layout class="w-full md:w-[70%] lg:w-[40%]">
    <div class="flex flex-col text-center py-3">
        <h1 class="text-3xl font-bold p-2">{{ Str::ucfirst($type) }} Sign Up</h1>
        <span class="p-1">Your Gateway to Finding and Selling Awesome Products Across The Continent</span>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="role" value="{{ $type }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autocomplete="phone" />
            {{-- <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 dark:border-gray-700 dark:text-white rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button">
                    All
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 max-h-48 overflow-auto" aria-labelledby="dropdown-button">
                        @foreach ($countries as $country)
                            <li class="flex gap-1 pl-2">
                                <img src="https://flagcdn.com/w20/{{ Str::lower($country->iso) }}.png" srcset="https://flagcdn.com/w20/{{ Str::lower($country->iso) }}.png 2x" alt="" class="w-5 h-5 rounded-full object-cover my-auto">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $country->name }} - {{ $country->iso }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="tel" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-slate-200 rounded-r-lg border-l-gray-100 border-l-2 border border-gray-300 focus:ring-gray-400 focus:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Phone Number" required>
                </div>
            </div> --}}
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex mt-3 justify-between">
            <a href="#" class="">
                <x-secondary-outline-button>
                    {{ __('Help') }}
                </x-secondary-outline-button>
            </a>

            <x-primary-button class="w-full ml-2">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>
    </form>
    <div class="mt-4 text-center">
        <h3 class="">Already Have An Account? <a href="{{ route('login', ['type' => $type]) }}" class="underline decoration-orange-500 text-orange-400 font-bold hover:text-orange-500 focus:text-orange-600 transition ease-in-out duration-150">Login</a></h3>
    </div>
</x-guest-layout>
