<div>
    <div class="flex flex-col py-3">
        <h1 class="text-3xl font-bold p-1">Upload Business Documents</h1>
        <span class="p-1">Upload Your Business Registration Documents Here..</span>
    </div>
    <form method="POST" action="{{ route('auth.business.create') }}">
        @csrf
        @foreach ($documents as $key => $document)
            <x-input-error :messages="$errors->get('document_files')" class="mt-2" />
            <x-input-error :messages="$errors->get('expiry_dates')" class="mt-2" />
            <div class="grid grid-cols-1 mb-3 md:mb-0 md:grid-cols-2 gap-4">
                <!-- Document Name -->
                <div class="hidden">
                    <x-input-label for="document_name" :value="__('Document Name')" />
                    <x-text-input id="document_name_{{ $document['name'] }}" class="block w-full" type="text" name="{{ $document['name']}}" wire:model="document_names.{{ $document['name'] }}" />
                </div>

                <!-- File -->
                <div>
                    <x-input-label for="document[]" value="{{ $document['name'] }}" />
                    <x-input-file id="document_{{ $document['name']}}" type="file" name="{{ $document['name']}}" wire:model="document_files.{{ $document['name'] }}" />
                    <x-input-error :messages="$errors->get('document_files.'.$document['name'])" class="mt-2" />
                </div>

                <!-- Expiry Date -->
                <div>
                    @if ($document['requires_expiry_date'])
                        <x-input-label for="expiry_date" value="{{ $document['name']}} Expiry Date" />
                        <x-text-input id="expiry_date_{{ $document['name']}}" class="block w-full" type="date" name="{{ $document['name']}}_expiry_date" wire:model="expiry_dates.{{ $document['name'] }}" />
                        <x-input-error :messages="$errors->get('expiry_dates.'.$document['name'])" class="mt-2" />
                    @endif
                </div>
            </div>
        @endforeach

        <div class="flex mt-3 justify-end">
            <x-primary-button class="w-full lg:w-[40%] ml-2 py-2 font-thin tracking-wide" wire:click.prevent="submit">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</div>
