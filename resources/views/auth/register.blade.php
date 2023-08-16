<x-guest-layout>
    <div class="flex flex-col text-center py-3">
        <h1 class="text-3xl font-bold p-2">{{ Str::ucfirst($type) }} Sign Up</h1>
        <span class="p-1">Your Gateway to Finding Awesome Products Across The Continent</span>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="hidden" name="role" value="{{ $type }}">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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

        <div class="flex mt-3">
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
