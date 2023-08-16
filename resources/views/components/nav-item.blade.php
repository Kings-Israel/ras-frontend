@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 text-orange-500 rounded-lg dark:text-orange-500 bg-white group transition duration-150 ease-in-out'
            : 'flex items-center p-2 text-gray-900 rounded-lg bg-white text-white hover:bg-gray-100 hover:bg-gray-700 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
