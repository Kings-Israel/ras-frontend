@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-extrabold text-dark']) }}>
    {{ $value ?? $slot }}
</label>
