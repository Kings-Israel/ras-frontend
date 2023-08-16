<x-guest-layout class="my-auto">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col text-center py-10">
        <h1 class="text-3xl font-bold p-2">{{ Str::ucfirst($type) }} Login</h1>
        <span class="p-1">Your Gateway to Finding Awesome Products Across The Continent</span>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Name')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Phone Number')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex mt-4">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-800 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}
            <a href="#" class="">
                <x-secondary-outline-button>
                    {{ __('Help') }}
                </x-secondary-outline-button>
            </a>

            <x-primary-button class="w-full ml-2">
                {{ __('Login to Account') }}
            </x-primary-button>
        </div>

        <div class="mt-4 text-center">
            <h3 class="">Have no Account Yet? <a href="{{ route('register') }}" class="underline decoration-orange-500 text-orange-400 font-bold hover:text-orange-500 focus:text-orange-600 transition ease-in-out duration-150">Join Us</a></h3>
        </div>
    </form>
</x-guest-layout>
