<div>
    @foreach ($documents as $key => $document)
        <x-input-error :messages="$errors->get('document_files')" class="mt-2" />
        <x-input-error :messages="$errors->get('expiry_dates')" class="mt-2" />
        <div class="grid grid-cols-1 mb-3 md:mb-0 md:grid-cols-2 gap-4">
            <!-- Document Name -->
            <div class="hidden">
                <x-input-label for="document_name" :value="__('Document Name')" />
                <x-text-input id="document_name_{{ $document['name'] }}" class="block w-full" type="text" name="documents_names[{{ $document['name']}}]" />
            </div>

            <!-- File -->
            <div>
                <x-input-label for="document[]" value="{{ $document['name'] }}" />
                <x-input-file id="document_{{ $document['name']}}" type="file" name="document_files[{{ $document['name']}}]" accept=".pdf" />
                <x-input-error :messages="$errors->get('document_files.'.$document['name'])" class="mt-2" />
            </div>

            <!-- Expiry Date -->
            <div>
                @if ($document['requires_expiry_date'])
                    <x-input-label for="expiry_date" value="{{ $document['name']}} Expiry Date" />
                    <x-text-input id="expiry_date_{{ $document['name']}}" class="block w-full" type="date" name="document_expiry_date[{{ $document['name']}}]" />
                    <x-input-error :messages="$errors->get('expiry_dates.'.$document['name'])" class="mt-2" />
                @endif
            </div>
        </div>
    @endforeach
</div>
