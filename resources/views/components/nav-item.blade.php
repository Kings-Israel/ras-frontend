@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 text-orange-500 rounded-lg dark:text-orange-500 bg-white group transition duration-150 ease-in-out'
            : 'flex items-center p-2 text-gray-600 rounded-lg bg-gray-200 hover:bg-gray-400 hover:text-white group transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
