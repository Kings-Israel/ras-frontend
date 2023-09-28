<x-guest-layout class="w-full md:w-[80%] lg:w-[60%]">
    {{-- <div class="flex flex-col text-center py-3">
        <h1 class="text-3xl font-bold p-2">Create Business Profile</h1>
    </div> --}}
    {{-- <form method="POST" action="{{ route('auth.business.create') }}">
        @csrf
        <!-- Business Name -->
        <div>
            <x-input-label for="first_name" :value="__('Business/Store Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Primary Cover Image -->
        <div class="mt-3">
            <x-input-label for="primary_cover_image" :value="__('Primary Cover Image')" />
            <x-input-file id="primary_cover_image" type="file" name="primary_cover_image" required />
            <x-input-error :messages="$errors->get('primary_cover_image')" class="mt-2" />
        </div>

        <!-- Secondary Cover Image -->
        <div class="mt-3">
            <x-input-label for="secondary_cover_image" :value="__('Secondary Cover Image')" />
            <x-input-file id="secondary_cover_image" type="file" name="secondary_cover_image" />
            <x-input-error :messages="$errors->get('secondary_cover_image')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="expiry_date" :value="__('Expiry Date')" />
            <x-date-input id="expiry_date" class="block mt-1 w-full" type="date" name="expiry_date[]" :value="old('expiry_date[]')" />
            <x-input-error :messages="$errors->get('expiry_date[]')" class="mt-2" />
        </div>

        <div class="flex mt-3">
            <a href="#" class="">
                <x-secondary-outline-button>
                    {{ __('Help') }}
                </x-secondary-outline-button>
            </a>

            <x-primary-button class="w-full ml-2 tracking-wide">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form> --}}
    <livewire:create-profile />
</x-guest-layout>
