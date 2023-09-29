@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-dark']) }}>
    {{ $value ?? $slot }}
</label>
