<div>
    {{-- <button wire:click()><i class="fas fa-edit"></i></button> --}}
    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar precio
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label name="type">Nombre de la membresia</x-label>
                <x-input type="text" wire:model="type" readOnly></x-input>
                <x-input-error for="type"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="plan">Plan</x-label>
                <x-input type="text" wire:model="oldPlan" readOnly></x-input>
                <x-input-error for="plan"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="price">Precio</x-label>
                <x-input type="number" wire:model="price"></x-input>
                <x-input-error for="price"></x-input-error>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open_edit', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
