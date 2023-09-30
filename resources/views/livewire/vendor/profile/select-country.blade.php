<select name="country" id="country" onchange="getDetails()" wire:model.live="country" class="border-2 border-gray-300 rounded-md bg-gray-200 w-full focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400">
    <option value="">Select Country</option>
    @foreach ($countries as $country)
        <option value="{{ $country->id }}" @if(old('country') == $country->id) selected @endif data-cities="{{ $country->cities }}" data-documents="{{ $country->requiredDocuments }}">{{ $country->name }}</option>
    @endforeach
</select>
