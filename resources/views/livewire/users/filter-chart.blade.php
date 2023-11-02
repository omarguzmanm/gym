<div class="col-span-2 flex justify-center items-center space-x-3">
    <label for="exercise" class="text-sm font-medium text-gray-900 dark:text-white">Ejercicio:</label>
    <select id="exercise" wire:model.defer="selectedExercise" wire:change="onExerciseChange"
        class="w-full h-9 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Elige una opción</option>
        @foreach ($exercises as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>
</div>
