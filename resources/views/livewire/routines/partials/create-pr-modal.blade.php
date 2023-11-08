{{-- Crear Pr --}}
<x-dialog-modal wire:model="open_pr">
    <x-slot name="name">
        Agregar Record Personal
    </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <form wire:submit.prevent="save">
                <x-label value="Ejercicio"></x-label>
                <x-input wire:model="exercise" type="text" class="w-full" readOnly required></x-input>
                <x-input-error for="exercise"></x-input-error>
        </div>
        <div class="mb-4">
            <x-label value="Peso maximo (kg)"></x-label>
            <x-input wire:model="pr" type="number" class="w-full" required></x-input>
            <x-input-error for="pr"></x-input-error>
        </div>
        <div class="mb-4">
            <x-label value="Repeticiones"></x-label>
            <x-input wire:model="reps" type="number" class="w-full" required></x-input>
            <x-input-error for="reps"></x-input-error>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-secondary-button class="mr-3" wire:click="$set('open_pr', false)">
            Cancelar
        </x-secondary-button>
        <x-danger-button wire:loading.attr="disabled" class="disabled:opacity-25">
            Agregar
        </x-danger-button>
        </form>
    </x-slot>
</x-dialog-modal>
