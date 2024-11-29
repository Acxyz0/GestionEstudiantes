@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-orange-500 dark:border-orange-500 text-lg font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-orange-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-orange-400 hover:border-orange-300 dark:hover:border-orange-400 focus:outline-none focus:text-gray-700 dark:focus:text-orange-500 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
