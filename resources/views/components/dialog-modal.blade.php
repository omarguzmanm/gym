@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 dark:bg-gray-900">
        <div class="text-lg font-medium text-gray-900 dark:text-white">
            {{ isset($name) ? $name : '' }}
        </div>

        <div class="mt-4 text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right dark:bg-gray-900">
        {{ $footer }}
    </div>
</x-modal>
