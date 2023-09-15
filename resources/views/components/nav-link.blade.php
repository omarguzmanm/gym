@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-2 pl-3 pr-4 text-orange-500 rounded md:hover:text-orange-500 md:p-0'
            : 'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>



