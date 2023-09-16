@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white']) !!}>
