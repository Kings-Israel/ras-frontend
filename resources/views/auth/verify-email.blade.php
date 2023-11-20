<x-guest-layout class="w-full md:w-[60%] lg:w-[30%] my-16 md:my-20 bg-white">
    <div class="flex flex-col text-center py-10">
        <h1 class="text-3xl font-bold p-2">Verify Email</h1>
    </div>

    <div class="mb-4 text-gray-600 dark:text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex gap-3 justify-between">
        <a href="#" class="">
            <x-secondary-outline-button>
                {{ __('Help') }}
            </x-secondary-outline-button>
        </a>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="whitespace-nowrap py-2 w-full">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

    </div>
    <form method="POST" action="{{ route('logout') }}" class="text-center mt-3">
        @csrf

        <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('Log Out') }}
        </button>
    </form>
</x-guest-layout>
