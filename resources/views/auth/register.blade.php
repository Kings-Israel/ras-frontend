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

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autocomplete="phone" />
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
