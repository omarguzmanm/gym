@props(['active'])

@php
    
    if (Auth::check()) {
        $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
    } else {
        $classes = $active ?? false ? 'block py-2 pl-3 pr-4 text-orange-500 rounded md:hover:text-orange-500 md:p-0' : 'block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0';
} @endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
