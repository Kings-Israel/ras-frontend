@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10']) !!}>
