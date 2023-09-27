<div class="p-2 space-y-2">
    <div class="flex flex-col py-1">
        <h1 class="text-3xl font-bold">Create Business Profile</h1>
    </div>
    <!-- Business Name -->
    <div>
        <x-input-label for="first_name" :value="__('Business/Store Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" :value="old('name')" autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('name')" class="mt-1" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-2">
        {{-- Business Country --}}
        <div>
            <x-input-label for="country" :value="__('Business Location(Country)')" />
            <select name="country" wire:model.live="country" id="country" class="border-2 border-gray-300 rounded-md bg-gray-200 w-full">
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('country')" class="mt-1" />
        </div>

        {{-- Business City --}}
        <div>
            <x-input-label for="city" :value="__('Business Location(City)')" />
            <select name="city" id="city" wire:model="city" class="border-2 border-gray-200 rounded-md bg-gray-200 w-full">
                <option value="">Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('city')" class="mt-1" />
        </div>
    </div>

    <!-- Primary Cover Image -->
    <div class="mt-3">
        <x-input-label for="primary_cover_image" :value="__('Primary Cover Image')" />
        <x-input-file id="primary_cover_image" type="file" name="primary_cover_image" wire:model="primary_cover_image" :value="old('primary_cover_image')" />
        <x-input-error :messages="$errors->get('primary_cover_image')" class="mt-1" />
    </div>

    <!-- Secondary Cover Image -->
    <div class="mt-3">
        <x-input-label for="secondary_cover_image" :value="__('Secondary Cover Image')" />
        <x-input-file id="secondary_cover_image" type="file" name="secondary_cover_image" wire:model="secondary_cover_image" :value="old('secondary_cover_image')" />
        <x-input-error :messages="$errors->get('secondary_cover_image')" class="mt-1" />
    </div>

    <div class="flex mt-4 justify-end">
        <x-primary-button class="w-2/5 font-thin rounded-lg px-5 py-2.5 text-center" wire:click="submit">
            {{ __('Submit') }}
        </x-primary-button>
    </div>
</div>
